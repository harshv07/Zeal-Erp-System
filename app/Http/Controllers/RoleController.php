<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Rules\PermissionValidationRule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function store(Request $request)
    {
        $this->authorize('edit_role');
        $roles = Role::all()->pluck('name')->toArray();


        $request->validate([
            'name' => ['required', Rule::notIn($roles)],
            'permissions' => new PermissionValidationRule,
        ]);


        Role::create([
            'name' => $request->name
        ]);
        $newRole =   Role::findByName($request->name);
        if ($request->has('permissions')) {
            $newRole->givePermissionTo($request->permissions);
        }
        Toastr::success('Role Created !!', 'Success');

        return redirect()->route('settings.show');
    }

    public function update(Request $request, $role)
    {
        $this->authorize('edit_role');

        if (Qs::isPrimaryRole($role)) {
            abort(403);
        }
        $roles = Role::all()->pluck('name')->toArray();
        $request->validate([
            'name' => ['required', Rule::notIn($roles)],
        ]);
        $role = Role::findByName($role);
        $role->update([
            'name' => $request->name,
        ]);
        Toastr::success('Role Updated !!', 'Success');
        return redirect()->route('settings.show');
    }

    public function delete($role)
    {
        $this->authorize('edit_role');

        if (Qs::isPrimaryRole($role)) {
            abort(403);
        }
        $role = Role::findByName($role);
        $role->delete();
        Toastr::success('Role Deleted !!', 'Success');
        return redirect()->route('settings.show');
    }
}
