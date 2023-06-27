<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function store(Request $request)
    {
        $this->authorize('edit_settings');

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'unique:designations,name'],
        ]);
        Designation::create($request->all());
        Toastr::success('Designation Created!!', 'Success');
        return redirect()->route('settings.show');
    }

    public function update(Request $request, $id)
    {

        $this->authorize('edit_settings');
        $request->validate([
            'name' => ['required', 'string', 'min:5'],
        ]);
        $id = decrypt($id);
        $designation = Designation::where('id', $id)->firstOrFail();
        $designation->update($request->all());
        Toastr::success('Designation Updated Successfully!!', 'Success');
        return redirect()->route('settings.show');
    }

    public function delete(Designation $designation)
    {
        $this->authorize('edit_settings');
        // dd($branch);
        $designation->delete();
        Toastr::success('Designation Deleted Successfully!!', 'Success');
        return redirect()->route('settings.show');
    }
}
