<?php

namespace App\Http\Controllers;

use App\Models\branch;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BranchController extends Controller
{


    public function store(Request $request)
    {
        $this->middleware(['auth', 'verified']);
        $this->authorize('edit_settings');

        $request->validate([
            'name' => ['required', 'string', 'min:5', 'unique:branches,name'],
        ]);
        branch::create($request->all());
        Toastr::success('Branch Created!!', 'Success');
        return redirect()->route('settings.show');
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_settings');
        $request->validate([
            'name' => ['required', 'string', 'min:5'],
        ]);
        $id = decrypt($id);
        $branch = branch::where('id', $id)->firstOrFail();
        $branch->update($request->all());
        Toastr::success('Branch Updated Successfully!!', 'Success');
        return redirect()->route('settings.show');
    }

    public function delete(branch $branch)
    {
        $this->authorize('edit_settings');
        // dd($branch);
        $branch->delete();
        Toastr::success('Branch Deleted Successfully!!', 'Success');
        return redirect()->route('settings.show');
    }
}
