<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'logout')->name('admin.logout');
});

// User Management All Route
Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class, 'userView'])->name('user.view');
    Route::get('/add', [UserController::class, 'userAdd'])->name('user.add');
    Route::post('/register', [UserController::class, 'userRegister'])->name('user.register');
    Route::get('/edit/{id}', [UserController::class, 'userEdit'])->name('edit.user');
    Route::post('/update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'userDelete'])->name('delete.user');
});

// User Profile And Password Management All Route
Route::prefix('profile')->group(function () {
    Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'profileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('change.password');
});

Route::prefix('setups')->group(function () {
    // Student Class All Route
    Route::get('/student/class/view', [StudentClassController::class, 'viewStudent'])->name('student.class.view');
    Route::get('/student/class/add', [StudentClassController::class, 'studentClassAdd'])->name('student.class.add');
    Route::post('/student/class/store', [StudentClassController::class, 'studentClassStore'])->name('store.student.class');
    Route::get('/student/class/edit{id}', [StudentClassController::class, 'studentClassEdit'])->name('student.class.edit');
    Route::get('/student/class/delete{id}', [StudentClassController::class, 'studentClassDelete'])->name('student.class.delete');
    Route::post('/student/class/update{id}', [StudentClassController::class, 'studentClassUpdate'])->name('update.student.class');
    // Student Year All Route
    Route::get('/student/year/view', [StudentYearController::class, 'viewYear'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class, 'viewYearAdd'])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class, 'viewYearStore'])->name('store.student.year');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'viewYearEdit'])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class, 'viewYearUpdate'])->name('update.student.year');
    Route::get('/student/year/delete/{id}', [StudentYearController::class, 'viewYearDelete'])->name('student.year.delete');
    // Student Group All Route
    Route::get('/student/group/view', [StudentGroupController::class, 'viewGroup'])->name('student.group.view');
    Route::get('/student/group/add', [StudentGroupController::class, 'viewGroupAdd'])->name('student.group.add');
    Route::post('/student/group/store', [StudentGroupController::class, 'viewGroupStore'])->name('store.student.group');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'viewGroupEdit'])->name('student.group.edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class, 'viewGroupUpdate'])->name('update.student.group');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'viewGroupDelete'])->name('student.group.delete');
    // Student Shift All Route
    Route::get('/student/shift/view', [StudentShiftController::class, 'viewShift'])->name('student.shift.view');
    Route::get('/student/shift/add', [StudentShiftController::class, 'viewShiftAdd'])->name('student.shift.add');
    Route::post('/student/shift/store', [StudentShiftController::class, 'viewShiftStore'])->name('store.student.shift');
    Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'viewShiftEdit'])->name('student.shift.edit');
    Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'viewShiftUpdate'])->name('update.student.shift');
    Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'viewShiftDelete'])->name('student.shift.delete');
    // Fee Category All Route
    Route::get('/fee/category/view', [FeeCategoryController::class, 'viewFeeCategory'])->name('fee.category.view');
    Route::get('/fee/category/add', [FeeCategoryController::class, 'viewFeeCategoryAdd'])->name('fee.category.add');
    Route::post('/fee/category/store', [FeeCategoryController::class, 'viewFeeCategoryStore'])->name('store.fee.category');
    Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'viewFeeCategoryEdit'])->name('fee.category.edit');
    Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'viewFeeCategoryUpdate'])->name('update.fee.category');
    Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'viewFeeCategoryDelete'])->name('fee.category.delete');
    // Fee Category Amount All Route
    Route::get('/fee/amount/view', [FeeAmountController::class, 'viewFeeAmount'])->name('fee.amount.view');
    Route::get('/fee/amount/add', [FeeAmountController::class, 'viewFeeAmountAdd'])->name('fee.amount.add');
    Route::post('/fee/amount/store', [FeeAmountController::class, 'viewFeeAmountStore'])->name('store.fee.amount');
    Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'viewFeeAmountEdit'])->name('fee.amount.edit');
    Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'viewFeeAmountUpdate'])->name('fee.amount.update');
    Route::get('/fee/amount/delete/{fee_category_id}', [FeeAmountController::class, 'viewFeeAmountDelete'])->name('fee.amount.delete');
    Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'viewFeeAmountDetails'])->name('fee.amount.details');
    // Exam Type All Route
    Route::get('/exam/type/view', [ExamTypeController::class, 'viewExamType'])->name('exam.type.view');
    Route::get('/exam/type/add', [ExamTypeController::class, 'viewExamTypeAdd'])->name('exam.type.add');
    Route::post('/exam/type/store', [ExamTypeController::class, 'viewExamTypeStore'])->name('store.exam.type');
    Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'viewExamTypeEdit'])->name('exam.type.edit');
    Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'viewExamTypeUpdate'])->name('update.exam.type');
    Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'viewExamTypeDelete'])->name('exam.type.delete');
    // SchoolSubject All Route
    Route::get('/school/subject/view', [SchoolSubjectController::class, 'viewSchoolSubject'])->name('school.subject.view');
    Route::get('/school/subject/add', [SchoolSubjectController::class, 'viewSchoolSubjectAdd'])->name('school.subject.add');
    Route::post('/school/subject/store', [SchoolSubjectController::class, 'viewSchoolSubjectStore'])->name('store.school.subject');
    Route::get('/school/subject/edit/{id}', [SchoolSubjectController::class, 'viewSchoolSubjectEdit'])->name('school.subject.edit');
    Route::post('/school/subject/update/{id}', [SchoolSubjectController::class, 'viewSchoolSubjectUpdate'])->name('update.school.subject');
    Route::get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'viewSchoolSubjectDelete'])->name('school.subject.delete');
    // SchoolSubject All Route
    Route::get('/assign/subject/view', [AssignSubjectController::class, 'viewAssignSubject'])->name('assign.subject.view');
    Route::get('/assign/subject/add', [AssignSubjectController::class, 'viewAssignSubjectAdd'])->name('assign.subject.add');
    Route::post('/assign/subject/store', [AssignSubjectController::class, 'viewAssignSubjectStore'])->name('store.assign.subject');
    Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'viewAssignSubjectEdit'])->name('assign.subject.edit');
    Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'viewAssignSubjectUpdate'])->name('update.assign.subject');
    Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'viewAssignSubjectDetails'])->name('assign.subject.details');
    Route::get('/assign/subject/delete/{class_id}', [AssignSubjectController::class, 'viewAssignSubjectDelete'])->name('assign.subject.delete');
    // Designation All Route
    Route::get('/designation/view', [DesignationController::class, 'viewDesignation'])->name('designation.view');
    Route::get('/designation/add', [DesignationController::class, 'viewDesignationAdd'])->name('designation.add');
    Route::post('/designation/store', [DesignationController::class, 'viewDesignationStore'])->name('store.designation');
    Route::get('/designation/edit/{id}', [DesignationController::class, 'viewDesignationEdit'])->name('designation.edit');
    Route::post('/designation/update/{id}', [DesignationController::class, 'viewDesignationUpdate'])->name('update.designation');
    Route::get('/designation/delete/{id}', [DesignationController::class, 'viewDesignationDelete'])->name('designation.delete');
});

// Students Registration Management All Route
Route::prefix('students')->group(function () {
    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
    Route::get('/reg/add', [StudentRegController::class, 'StudentRegViewAdd'])->name('student.reg.add');
    Route::post('/reg/store', [StudentRegController::class, 'StudentRegViewStore'])->name('store.student.register');
    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
    Route::get('/student/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.reg.edit');
    Route::post('/student/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.register');
    Route::get('/student/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.reg.promotion');
    Route::post('/student/reg/promotion/update/{student_id}', [StudentRegController::class, 'StudentRegPromotionUpdate'])->name('promotion.student.register');
    Route::get('/student/reg/details/{student_id}', [StudentRegController::class, 'StudentRegPromotionDetails'])->name('student.reg.details');

    // Student Roll Generate Route
    Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('student.roll.generate');
    Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudent'])->name('student.registration.getstudents');
    Route::post('/roll/generate/store', [StudentRollController::class, 'RollGenerateStore'])->name('roll.generate.store');

    // Registration fee  Route
    Route::get('/registration/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');
    Route::get('/registration/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
    Route::get('/registration/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');

    // Monthly fee  Route
    Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
    Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
    Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

    // Exam fee  Route
    Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
    Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
    Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');
});
