<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function viewSchoolSubject()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    public function viewSchoolSubjectAdd()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }

    public function viewSchoolSubjectStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:school_subjects,name'
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }

    public function viewSchoolSubjectEdit($id)
    {
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
    }

    public function viewSchoolSubjectUpdate(Request $request, $id)
    {
        $data = SchoolSubject::find($id);

        $request->validate([
            'name' => 'required|unique:school_subjects,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }

    public function viewSchoolSubjectDelete($id)
    {
        $user = SchoolSubject::find($id);
        $user->delete();
        $notification = array(
            'message' => 'School Subject Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
