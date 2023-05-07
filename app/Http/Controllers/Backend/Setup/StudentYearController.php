<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function viewYear()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }

    public function viewYearAdd()
    {
        return view('backend.setup.year.add_student_year');
    }

    public function viewYearStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_years,name'
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    public function viewYearEdit($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }

    public function viewYearUpdate(Request $request, $id)
    {
        $data = StudentYear::find($id);

        $request->validate([
            'name' => 'required|unique:student_years,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    public function viewYearDelete($id)
    {
        $user = StudentYear::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
