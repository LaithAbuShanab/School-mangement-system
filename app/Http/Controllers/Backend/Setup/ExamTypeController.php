<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function viewExamType()
    {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function viewExamTypeAdd()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function viewExamTypeStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:exam_types,name'
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function viewExamTypeEdit($id)
    {
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('editData'));
    }

    public function viewExamTypeUpdate(Request $request, $id)
    {
        $data = ExamType::find($id);

        $request->validate([
            'name' => 'required|unique:exam_types,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function viewExamTypeDelete($id)
    {
        $user = ExamType::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Exam Type Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
