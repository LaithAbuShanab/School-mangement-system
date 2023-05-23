<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\AssStudent;
use App\Models\Designation;
use App\Models\DisStudent;
use App\Models\EmployeeSallaryLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeRegController extends Controller
{
    public function EmployeeRegView()
    {
        $data['allData'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_reg.employee_reg_view', $data);
    }

    public function EmployeeRegViewAdd()
    {
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_reg.employee_reg_add', $data);
    }

    public function EmployeeRegViewStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $checkYear =  date('Ym', strtotime($request->join_date));
            $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first();

            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            } else {
                $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            }

            $final_id_no = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->code = $code;
            $user->usertype = "Employee";
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->join_data = date('Y-m-d', strtotime($request->join_date));

            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $fileName);
                $user['image'] = $fileName;
            } else {
                $user['image'] = "no_image.jpg";
            }
            $user->save();

            $employee_salary = new EmployeeSallaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
            $employee_salary->save();
        });

        $notification = array(
            'message' => 'Employee Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.registration.view')->with($notification);
    }

    public function EmployeeRegViewEdit($employee_id)
    {
        $data['editData'] = User::find($employee_id);
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_reg.employee_reg_edit', $data);
    }

    public function EmployeeRegViewUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->designation_id = $request->designation_id;
        $user->dob = date('Y-m-d', strtotime($request->dob));

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/employee_images/' . $user->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'), $fileName);
            $user['image'] = $fileName;
        }
        $user->save();

        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.registration.view')->with($notification);
    }

    public function EmployeeRegViewDetails($id)
    {
        $data['details'] = User::find($id);
        $pdf = PDF::class::loadView('backend.employee.employee_reg.employee_reg_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
