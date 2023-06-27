<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\Designation;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show()
    {
        $this->authorize('show_settings');

        $branches = branch::all();
        $loops = $branches->count();
        $branches = $branches->toArray();
        $total = User::count();
        for ($i = 0; $i < $loops; $i++) {
            $curr_id = branch::where('name', $branches[$i]['name'])->first('id');
            $cnt = User::where('branch_id', $curr_id->id)->count();
            $branches[$i]['cnt'] = $cnt;
        }
        $years = Year::all();
        $loops = $years->count();
        $years = $years->toArray();
        for ($i = 0; $i < $loops; $i++) {
            $curr_id = Year::where('value', $years[$i]['value'])->first('id');
            $cnt = User::where('year_id', $curr_id->id)->count();
            $years[$i]['cnt'] = $cnt;
        }
        // dd($years);

        $designations = Designation::all();
        $loops = $designations->count();
        $designations = $designations->toArray();
        for ($i = 0; $i < $loops; $i++) {
            $curr_id = Designation::where('name', $designations[$i]['name'])->first('id');
            $cnt = User::where('year_id', $curr_id->id)->count();
            $designations[$i]['cnt'] = $cnt;
        }


        $roles = Role::all()->pluck('name')->toArray();

        $permissions = NULL;
        if (Auth::user()->hasRole('SuperAdmin')) {

            $permissions = Permission::all()->pluck('name')->toArray();
        } else {

            $permissions = Auth::user()->getAllPermissions()->pluck('name')->toArray();
        }
        // dd($permissions);
        return view('settings.show', compact('branches', 'total', 'years', 'designations', 'permissions', 'roles'));
    }
}
