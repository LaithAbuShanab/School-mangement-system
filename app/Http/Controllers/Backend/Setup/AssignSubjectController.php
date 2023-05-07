<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function viewAssignSubject()
    {
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    public function viewAssignSubjectAdd()
    {
        $data['subject'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }

    public function viewAssignSubjectStore(Request $request)
    {
        $countSubject = count($request->subject_id);
        if ($countSubject != NULL) {
            for ($i = 0; $i < $countSubject; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }
            $notification = array(
                'message' => 'Data Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('assign.subject.view')->with($notification);
        }
    }

    public function viewAssignSubjectEdit($class_id)
    {
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        $data['subject'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject', $data);
    }

    public function viewAssignSubjectUpdate(Request $request, $class_id)
    {
        if ($request->subject_id == NULL) {
            $notification = array(
                'message' => 'Sorry You Do Not Select Any Subject',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            $countSubject = count($request->subject_id);
            AssignSubject::where('class_id', $class_id)->delete();
            for ($i = 0; $i < $countSubject; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }
            $notification = array(
                'message' => 'Data Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('assign.subject.view')->with($notification);
        }
    }

    public function viewAssignSubjectDetails($class_id)
    {
        $data['detailData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        return view('backend.setup.assign_subject.detail_assign_subject', $data);
    }

    public function viewAssignSubjectDelete($class_id)
    {
        AssignSubject::where('class_id', $class_id)->delete();
        $notification = array(
            'message' => 'Assign Subject Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
