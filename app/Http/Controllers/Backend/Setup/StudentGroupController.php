<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function viewGroup()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }

    public function viewGroupAdd()
    {
        return view('backend.setup.group.add_student_group');
    }

    public function viewGroupStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name'
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }

    public function viewGroupEdit($id)
    {
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }

    public function viewGroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::find($id);

        $request->validate([
            'name' => 'required|unique:student_groups,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }

    public function viewGroupDelete($id)
    {
        $user = StudentGroup::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
