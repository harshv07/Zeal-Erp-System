<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class YearController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function store(Request $request)
    {
        $this->authorize('edit_settings');
        $request->validate([
            'value' => ['required', 'integer', 'unique:years,value'],
        ]);
        Year::create($request->all());
        Toastr::success('Year Created!!', 'Success');
        return redirect()->route('settings.show');
    }


    public function update(Request $request, $id)
    {
        $this->authorize('edit_settings');

        $request->validate([
            'value' => ['required', 'interger'],
        ]);
        $id = decrypt($id);
        $year = Year::where('id', $id)->firstOrFail();
        $year->update($request->all());
        Toastr::success('Year Updated Successfully!!', 'Success');
        return redirect()->route('settings.show');
    }




    public function delete(Year $year)
    {
        $this->authorize('edit_settings');
        $year->delete();
        Toastr::success('Year Deleted Successfully!!', 'Success');
        return redirect()->route('settings.show');
    }
}
