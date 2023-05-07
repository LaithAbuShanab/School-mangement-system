<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    public function StudentRollView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student.student_roll.roll_generate_view', $data);
    }

    public function GetStudent(Request $request)
    {
        $allData = AssStudent::with(['student_name', 'discount'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return response()->json($allData);
    }

    public function RollGenerateStore(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        if ($request->student_id != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                AssStudent::where('year_id', $year_id)->where('class_id', $class_id)->where('student_id', $request->student_id[$i])
                    ->update(['roll' => $request->roll[$i]]);
            }
        }
        $notification = array(
            'message' => 'Roll Student Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.roll.generate')->with($notification);
    }
}
