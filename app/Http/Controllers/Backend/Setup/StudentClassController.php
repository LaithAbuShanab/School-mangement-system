<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function viewStudent()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function studentClassAdd()
    {
        return view('backend.setup.student_class.add_student_class');
    }

    public function studentClassStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_classes,name'
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    public function studentClassEdit($id)
    {
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function studentClassUpdate(Request $request, $id)
    {
        $data = StudentClass::find($id);

        $request->validate([
            'name' => 'required|unique:student_classes,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    public function studentClassDelete($id)
    {
        $user = StudentClass::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
