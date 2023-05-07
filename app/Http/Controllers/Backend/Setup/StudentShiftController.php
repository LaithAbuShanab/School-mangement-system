<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function viewShift()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function viewShiftAdd()
    {
        return view('backend.setup.shift.add_student_shift');
    }

    public function viewShiftStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }

    public function viewShiftEdit($id)
    {
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function viewShiftUpdate(Request $request, $id)
    {
        $data = StudentShift::find($id);

        $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }

    public function viewShiftDelete($id)
    {
        $user = StudentShift::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
