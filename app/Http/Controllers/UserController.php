<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Http\Requests\UserUpdateRequest;
// use Illuminate\Http\UserUpdateRequest;
use App\Models\branch;
use App\Models\Designation;
use App\Models\User;
use App\Models\Year;
use Brian2694\Toastr\Facades\Toastr;
use GrahamCampbell\ResultType\Success;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    // STUDENTS SEC 



    public $branches, $years, $designations;

    public function __construct(branch $branches, Year $years, Designation $designations)
    {
        $this->middleware(['auth', 'verified']);
        $this->branches = $branches;
        $this->years = $years;
        $this->designations = $designations;
    }

    public function edituserprofile($id)
    {
        $cc = decrypt($id);
        $user = User::where('id', $cc)
            ->with('designation')
            ->with('branch')
            ->with('year')
            ->with('media')
            ->first();
        $userroles = $user->getRoleNames()->toArray();
        $string = 'edit_' . $userroles[0];
        Auth::user()->can($string);

        $designations = $this->designations->all();
        $years = $this->years->all();
        $branches = $this->branches->all();
        $roles = Role::all()->pluck('name')->toArray();
        return view('profile.admineditable', compact('user', 'designations', 'years', 'branches', 'roles'));
    }

    public function updateuserprofile(Request $request, $id)
    {
        $id = decrypt($id);
        $user = User::where('id', $id)->first();
        $branches = branch::pluck('id')->toArray();
        $years = Year::pluck('id')->toArray();
        $designations = Designation::pluck('id')->toArray();
        $roles = Role::all()->pluck('name')->toArray();
        // dd($roles);
        // dd($branches);
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'profile_picture' => ['mimes:jpeg,jpg,png,gif', 'max:10000'],
            'branch_id' => ['required', Rule::In($branches)],
            'year_id' => [$user->hasRole('Student') ? 'required' : '', Rule::In($years)],
            'designation_id' => [(!$user->hasRole('Student')) ? 'required' : '' . Rule::In($designations)],
            'role' => [Rule::in($roles)],
        ]);
        $name = $request->first_name . ' ' . $request->last_name;
        $request->request->set('name', $name);
        // dd($request);
        $user->update($request->except(['profile_picture', 'role']));

        $user->roles()->detach();
        $user->assignRole($request->role);

        if ($request->hasFile('profile_picture')) {

            $user->addMedia($request->profile_picture)
                ->toMediaCollection('profile_picture');
        }

        Toastr::success('User Updated Successfully!!', 'Success');

        return redirect()->route('user.showstudents');
    }


    public function showprofile()
    {

        // dd($profile);

        return view('profile.viewprofile');
    }

    public function updateprofile(UserUpdateRequest $request)
    {
        $user = Auth::user();
        if ($request->hasFile('profile_picture')) {

            $user->addMedia($request->profile_picture)
                ->toMediaCollection('profile_picture');
        }
        $name = $request->first_name . ' ' . $request->last_name;
        $request->request->set('name', $name);
        // dd($request);
        $user->update($request->except(['profile_picture', 'role']));

        Toastr::success('Profile Updated Successfully!!', 'Success');

        return redirect()->route('show.pofile');
    }


    public function editprofile()
    {
        $designations = $this->designations->all();
        $years = $this->years->all();
        $branches = $this->branches->all();

        return view('profile.edit', compact('years', 'branches', 'designations'));
    }

    public function showstudents()
    {

        $this->authorize('show_Student');

        $students = User::role('Student')
            ->with('year')
            ->with('branch')
            ->with('media')
            ->get();
        $years = $this->years->all();
        $branches = $this->branches->all();
        // dd($students);
        // dd($students->year);
        return view('users.students', compact('students', 'years', 'branches'));
    }

    public function searchstudents(Request $request)
    {
        $this->authorize('show_Student');
        $students = User::query();

        $students = User::role('Student')
            ->with('year')
            ->with('media')
            ->with('branch');

        if (!empty($request->branch)) {
            $students = $students->where('branch_id', $request->branch);
        }
        if (!empty($request->year)) {
            $students = $students->where('year_id', $request->year);
        }
        $students = $students->get();
        $years = $this->years->all();
        $branches = $this->branches->all();
        // dd($students);
        return view('users.students', compact('students', 'years', 'branches'));
    }



    // TEACHERS SEC 

    public function showteachers()
    {

        $this->authorize('show_Teacher');

        $teachers = User::role('Teacher')
            ->with('branch')
            ->with('designation')
            ->with('media')
            ->get();

        $branches = $this->branches->all();
        $designations = $this->designations->all();

        return view('users.teachers', compact('teachers', 'branches', 'designations'));
    }


    public function searchteacher(Request $request)
    {
        $this->authorize('show_Teacher');
        $teachers = User::query();

        $teachers = User::role('Teacher')
            ->with('branch')
            ->with('media')
            ->with('designation');

        if (!empty($request->branch)) {
            $teachers = $teachers->where('branch_id', $request->branch);
        }
        if (!empty($request->designation)) {
            $teachers = $teachers->where('designation_id', $request->designation);
        }
        $teachers = $teachers->get();
        $designations = $this->designations->all();
        $branches = $this->branches->all();
        return view('users.teachers', compact('teachers', 'branches', 'designations'));
    }


    // ADMIN SEC 

    public function showadmins()
    {
        $this->authorize('show_Admin');

        $admins = User::role('Admin')
            ->with('branch')
            ->with('designation')
            ->with('media')
            ->get();

        $branches = $this->branches->all();
        $designations = $this->designations->all();

        return view('users.admins', compact('admins', 'branches', 'designations'));
    }



    public function searchadmins(Request $request)
    {
        $this->authorize('show_Admin');
        $admins = User::query();

        $admins = User::role('Admin')
            ->with('branch')
            ->with('media')
            ->with('designation');

        if (!empty($request->branch)) {
            $admins = $admins->where('branch_id', $request->branch);
        }
        if (!empty($request->designation)) {
            $admins = $admins->where('designation_id', $request->designation);
        }
        $admins = $admins->get();
        $branches = $this->branches->all();
        $designations = $this->designations->all();
        return view('users.admins', compact('admins', 'branches', 'designations'));
    }


    // SUPERADMIN SEC 


    public function showsuperadmins()
    {
        $this->authorize('show_Superadmin');

        $superadmins = User::role('SuperAdmin')
            ->with('branch')
            ->with('designation')
            ->with('media')
            ->get();
        $branches = $this->branches->all();
        $designations = $this->designations->all();

        return view('users.superadmins', compact('superadmins', 'branches', 'designations'));
    }



    public function searchsuperadmins(Request $request)
    {
        $this->authorize('show_Superadmin');

        $superadmins = User::query();

        $superadmins = User::role('SuperAdmin')
            ->with('branch')
            ->with('media')
            ->with('designation');

        if (!empty($request->branch)) {
            $superadmins = $superadmins->where('branch_id', $request->branch);
        }
        if (!empty($request->designation)) {
            $superadmins = $superadmins->where('designation_id', $request->designation);
        }
        $superadmins = $superadmins->get();
        $branches = $this->branches->all();
        $designations = $this->designations->all();
        return view('users.superadmins', compact('superadmins', 'branches', 'designations'));
    }






    //DELETE USERS

    public function delete(User $user)
    {
        $this->authorize('delete_Student');
        $user->delete();
        // Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
        Toastr::success('User Deleted Successfully!!', 'Success');
        return redirect()->back();
    }
}
