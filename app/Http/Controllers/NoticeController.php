<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeRequest;
use App\Models\branch;
use App\Models\Designation;
use App\Models\Notice;
use App\Models\Year;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{

    public $branches, $years, $designations;



    public function __construct(branch $branches, Year $years, Designation $designations)
    {
        $this->middleware(['auth', 'verified']);
        $this->branches = $branches;
        $this->years = $years;
        $this->designations = $designations;
    }


    public function index()
    {
        $notices = Notice::with('user')
            ->with('media')
            ->with('year')
            ->with('branch')
            ->get();
        // dd($notices);
        $years = $this->years->all();
        $branches = $this->branches->all();
        // dd($branches);
        return view('notice.index', compact('notices', 'branches', 'years'));
    }

    public function store(NoticeRequest $request)
    {
        $this->authorize('edit_notice');
        if (!$request->hasFile('notice')) {
            abort(404);
        }

        $notice = Notice::create([
            'caption' => $request->caption,
            'user_id' => Auth::user()->id,
            'year_id' => $request->year_id,
            'branch_id' => $request->branch_id,
        ]);

        $notice->addMedia($request->notice)
            ->toMediaCollection('notice');

        Toastr::success('Notice Created!!', 'Success');
        return redirect()->route('notice.index');
    }


    public function update(NoticeRequest $request, Notice $notice)
    {
        $this->authorize('edit_notice');

        $request->validate([
            'caption' => ['required', 'max:300'],

        ]);
        $notice->user_id = Auth::user()->id;
        $notice->update($request->all());
        Toastr::success('Notice Updated!!', 'Success');
        return redirect()->route('notice.index');
    }

    public function search(Request $request)
    {

        // dd('se');

        // dd($request);
        $notices = Notice::query()
            ->with('year')
            ->with('branch')
            ->with('media')
            ->with('user');

        if ($request->branch == 0) {

            $notices = $notices->where('branch_id', 0);
        } else if (!empty($request->branch)) {

            $notices = $notices->where('branch_id', $request->branch);
        }

        if ($request->branch == 0) {

            $notices = $notices->where('year_id', 0);
        } else if (!empty($request->year)) {
            $notices = $notices->where('year_id', $request->year);
        }

        $notices = $notices->get();

        $years = $this->years->all();
        $branches = $this->branches->all();

        // dd($notices);

        return view('notice.index', compact('notices', 'branches', 'years'));
    }

    public function delete($id)
    {

        $this->authorize('delete_notice');
        // dd($id);
        $id = decrypt($id);
        $notice = Notice::where('id', $id)->firstOrFail();
        $notice->delete();
        Toastr::success('Notice Deleted!!', 'Success');

        return redirect()->route('notice.index');
    }
}
