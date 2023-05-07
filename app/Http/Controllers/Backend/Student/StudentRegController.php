<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssStudent;
use App\Models\DisStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class StudentRegController extends Controller
{
    public function StudentRegView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        //Returns the first ID
        $data['year_id'] = StudentYear::orderBy('id', 'DESC')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'DESC')->first()->id;

        $data['allData'] = AssStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();

        return view('backend.student.student_reg.student_view', $data);
    }

    public function StudentRegViewAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_reg.student_add', $data);
    }

    public function StudentRegViewStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            }

            $final_id_no = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->code = $code;
            $user->usertype = "Student";
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;

            $user->dob = date('Y-m-d', strtotime($request->dob));
            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $fileName);
                $user['image'] = $fileName;
            } else {
                $user['image'] = "no_image.jpg";
            }
            $user->save();

            $assign_student = new AssStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DisStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_Category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    public function StudentClassYearWise(Request $request)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['allData'] = AssStudent::where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return view('backend.student.student_reg.student_view', $data);
    }

    public function StudentRegEdit($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssStudent::with(['student_name', 'discount'])->where('student_id', $student_id)->first();
        return view('backend.student.student_reg.student_edit', $data);
    }

    public function StudentRegUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {

            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if ($request->file('image')) {
                $file = $request->file('image');
                if ($request->img_name != 'no_image.jpg')
                    @unlink(public_path('upload/student_images/' . $user->image));
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $fileName);
                $user['image'] = $fileName;
            } else {
                if ($request->img_name != 'no_image.jpg')
                    @unlink(public_path('upload/student_images/' . $user->image));
                $user['image'] = "no_image.jpg";
            }
            $user->save();

            $assign_student = AssStudent::where('id', $request->id)->where('student_id', $student_id)->first();
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = DisStudent::where('assign_student_id', $request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    public function StudentRegPromotion($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssStudent::with(['student_name', 'discount'])->where('student_id', $student_id)->first();
        return view('backend.student.student_reg.student_promotion', $data);
    }

    public function StudentRegPromotionUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {

            $assign_student = new AssStudent();
            $assign_student->student_id = $student_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DisStudent;
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_Category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student Promotion Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    public function StudentRegPromotionDetails($student_id)
    {
        $data['details'] = AssStudent::with(['student_name', 'discount'])->where('student_id', $student_id)->first();
        $pdf = PDF::class::loadView('backend.student.student_reg.student_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
