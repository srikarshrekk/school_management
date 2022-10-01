<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;


use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\setup\StudentClassController;
use App\Http\Controllers\backend\setup\StudentYearController;
use App\Http\Controllers\backend\setup\StudentGroupController;
use App\Http\Controllers\backend\setup\StudentShiftController;
use App\Http\Controllers\backend\setup\StudentFeeController;
use App\Http\Controllers\backend\setup\StudentFeeAmountController;


use App\Http\Controllers\backend\setup\ExamTypeController;
use App\Http\Controllers\backend\setup\SubjectTypeController;
use App\Http\Controllers\backend\setup\StudentSubjectAssignController;
use App\Http\Controllers\backend\setup\DesignationController;
use App\Http\Controllers\backend\student\StudentRegistrationController;
use App\Http\Controllers\backend\student\StudentRollController;
use App\Http\Controllers\backend\student\RegistrationFeeController;
use App\Http\Controllers\FeeSidebarController;
use App\Http\Controllers\backend\employee\EmployeeRegistrationController;
use App\Http\Controllers\backend\employee\EmployeeLeaveController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });




Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');

//User Management

route::prefix('users')->group(function(){
    route::get('/view',[UserController::class,'userview'])->name('user.view');
    route::get('/add',[UserController::class,'useradd'])->name('user.add');
    route::post('/store',[UserController::class,'userstore'])->name('user.store');
    route::get('/edit/{id}',[UserController::class,'useredit'])->name('user.edit');
    route::post('/update/{id}',[UserController::class,'userupdate'])->name('user.update');
    route::get('/delete/{id}',[UserController::class,'userdelete'])->name('user.delete');


});

//profile management
route::prefix('profile')->group(function(){
    route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
    route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');
    route::get('/password_view',[ProfileController::class,'ProfilePasswordview'])->name('password.view');
    route::post('/password_update',[ProfileController::class,'ProfilePasswordupdate'])->name('password.update');


});

//setup management
route::prefix('setup')->group(function(){
    route::get('/student/class/view',[StudentClassController::class,'ViewStudentClass'])->name('student.class.view');
    route::get('/student/class/add',[StudentClassController::class,'AddStudentClass'])->name('student.class.add');
    route::post('/student/class/store',[StudentClassController::class,'StoreStudentClass'])->name('student.class.store');
    route::get('/student/class/edit/{id}',[StudentClassController::class,'EditStudentClass'])->name('student.class.edit');
    route::post('/student/class/update/{id}',[StudentClassController::class,'UpdateStudentClass'])->name('student.class.update');
    route::get('/student/class/delete/{id}',[StudentClassController::class,'DeleteStudentClass'])->name('student.class.delete');
    //student year
    route::get('/student/year/view',[StudentYearController::class,'ViewStudentYear'])->name('student.year.view');
    route::get('/student/year/add',[StudentYearController::class,'AddStudentYear'])->name('student.year.add');
    route::post('/student/year/store',[StudentYearController::class,'StoreStudentYear'])->name('student.year.store');
    route::get('/student/year/edit/{id}',[StudentYearController::class,'EditStudentYear'])->name('student.year.edit');
    route::post('/student/year/update/{id}',[StudentYearController::class,'UpdateStudentYear'])->name('student.year.update');
    route::get('/student/year/delete/{id}',[StudentYearController::class,'DeleteStudentyear'])->name('student.year.delete');
    //student group
    route::get('/student/group/view',[StudentGroupController::class,'ViewStudentGroup'])->name('student.group.view');
    route::get('/student/group/add',[StudentGroupController::class,'AddStudentGroup'])->name('student.group.add');
    route::post('/student/group/store',[StudentGroupController::class,'StoreStudentGroup'])->name('student.group.store');
    route::get('/student/group/edit/{id}',[StudentGroupController::class,'EditStudentGroup'])->name('student.group.edit');
    route::post('/student/group/update/{id}',[StudentGroupController::class,'UpdateStudentGroup'])->name('student.group.update');
    route::get('/student/group/delete/{id}',[StudentGroupController::class,'DeleteStudentGroup'])->name('student.group.delete');
    //student shift
    route::get('/student/shift/view',[StudentShiftController::class,'ViewStudentShift'])->name('student.shift.view');
    route::get('/student/shift/add',[StudentShiftController::class,'AddStudentShift'])->name('student.shift.add');
    route::post('/student/shift/store',[StudentShiftController::class,'StoreStudentShift'])->name('student.shift.store');
    route::get('/student/shift/edit/{id}',[StudentShiftController::class,'EditStudentShift'])->name('student.shift.edit');
    route::post('/student/shift/update/{id}',[StudentShiftController::class,'UpdateStudentShift'])->name('student.shift.update');
    route::get('/student/shift/delete/{id}',[StudentShiftController::class,'DeleteStudentShift'])->name('student.shift.delete'); 
    //student fee
    route::get('/student/fee/view',[StudentFeeController::class,'ViewStudentFee'])->name('student.fee.view');
    route::get('/student/fee/add',[StudentFeeController::class,'AddStudentFee'])->name('student.fee.add');
    route::post('/student/fee/store',[StudentFeeController::class,'StoreStudentFee'])->name('student.fee.store');
    route::get('/student/fee/edit/{id}',[StudentFeeController::class,'EditStudentFee'])->name('student.fee.edit');
    route::post('/student/fee/update/{id}',[StudentFeeController::class,'UpdateStudentFee'])->name('student.fee.update');
    route::get('/student/fee/delete/{id}',[StudentFeeController::class,'DeleteStudentFee'])->name('student.fee.delete');
    //student fee amount
    route::get('/student/fee_amount/view',[StudentFeeAmountController::class,'ViewStudentFee_Amount'])->name('student.fee_amount.view');
    route::get('/student/fee_amount/add',[StudentFeeAmountController::class,'AddStudentFee_Amount'])->name('student.fee_amount.add');
    route::post('/student/fee_amount/add',[StudentFeeAmountController::class,'StoreStudentFee_Amount'])->name('student.fee_amount.store');
    route::get('/student/fee_amount/edit/{student_fee_id}',[StudentFeeAmountController::class,'EditStudentFee_Amount'])->name('student.fee_amount.edit');
    route::post('/student/fee_amount/update/{student_fee_id}',[StudentFeeAmountController::class,'UpdateStudentFee_Amount'])->name('student.fee_amount.update');
    route::get('/student/fee_amount/delete/{student_fee_id}',[StudentFeeAmountController::class,'DeleteStudentFee_Amount'])->name('student.fee_amount.delete');
    route::get('/student/fee_amount/detail/{student_fee_id}',[StudentFeeAmountController::class,'DetailStudentFee_Amount'])->name('student.fee_amount.detail');  
    //exam type
    route::get('/student/exam/view',[ExamTypeController::class,'ViewStudentExam'])->name('student.exam.view');
    route::get('/student/exam/add',[ExamTypeController::class,'AddStudentExam'])->name('student.exam.add');
    route::post('/student/exam/store',[ExamTypeController::class,'StoreStudentExam'])->name('student.exam.store');
    route::get('/student/exam/edit/{id}',[ExamTypeController::class,'EditStudentExam'])->name('student.exam.edit');
    route::post('/student/exam/update/{id}',[ExamTypeController::class,'UpdateStudentExam'])->name('student.exam.update');
    route::get('/student/exam/delete/{id}',[ExamTypeController::class,'DeleteStudentExam'])->name('student.exam.delete');
    //school subject
    route::get('/student/subject/view',[SubjectTypeController::class,'ViewStudentSubject'])->name('student.subject.view');
    route::get('/student/subject/add',[SubjectTypeController::class,'AddStudentSubject'])->name('student.subject.add');
    route::post('/student/subject/store',[SubjectTypeController::class,'StoreStudentSubject'])->name('student.subject.store');
    route::get('/student/subject/edit/{id}',[SubjectTypeController::class,'EditStudentSubject'])->name('student.subject.edit');
    route::post('/student/subject/update/{id}',[SubjectTypeController::class,'UpdateStudentSubject'])->name('student.subject.update');
    route::get('/student/subject/delete/{id}',[SubjectTypeController::class,'DeleteStudentSubject'])->name('student.subject.delete');
    //assign_subject
    route::get('/student/subject_assign/view',[StudentSubjectAssignController::class,'ViewStudentSubjectAssign'])->name('student.subject_assign.view');
    route::get('/student/subject_assign/add',[StudentSubjectAssignController::class,'AddStudentSubjectAssign'])->name('student.subject_assign.add');
    route::post('/student/subject_assign/add',[StudentSubjectAssignController::class,'StoreStudentSubjectAssign'])->name('student.subject_assign.store');
    route::get('/student/subject_assign/edit/{student_class_id}',[StudentSubjectAssignController::class,'EditStudentSubjectAssign'])->name('student.subject_assign.edit');
    route::post('/student/subject_assign/update/{student_class_id}',[StudentSubjectAssignController::class,'UpdateStudentSubjectAssign'])->name('student.subject_assign.update');
    route::get('/student/subject_assign/delete/{student_class_id}',[StudentSubjectAssignController::class,'DeleteStudentSubjectAssign'])->name('student.subject_assign.delete');
    route::get('/student/subject_assign/detail/{student_class_id}',[StudentSubjectAssignController::class,'DetailStudentSubjectAssign'])->name('student.subject_assign.detail');
    //designation
    route::get('/student/designation/view',[DesignationController::class,'ViewStudentDesignation'])->name('student.designation.view');
    route::get('/student/designation/add',[DesignationController::class,'AddStudentDesignation'])->name('student.designation.add');
    route::post('/student/designation/store',[DesignationController::class,'StoreStudentDesignation'])->name('student.designation.store');
    route::get('/student/designation/edit/{id}',[DesignationController::class,'EditStudentDesignation'])->name('student.designation.edit');
    route::post('/student/designation/update/{id}',[DesignationController::class,'UpdateStudentDesignation'])->name('student.designation.update');
    route::get('/student/designation/delete/{id}',[DesignationController::class,'DeleteStudentDesignation'])->name('student.designation.delete');
    



});
//student registration
route::prefix('student')->group(function(){
    route::get('/registration/view',[StudentRegistrationController::class,'ViewStudentRegistration'])->name('student.registration.view');
    route::get('/registration/add',[StudentRegistrationController::class,'AddStudentRegistration'])->name('student.registration.add');
    route::post('/registration/store',[StudentRegistrationController::class,'StoreStudentRegistration'])->name('student.registration.store');
    route::get('/registration/edit/{assign_student_id}',[StudentRegistrationController::class,'EditStudentRegistration'])->name('student.registration.edit');
    route::post('/registration/update/{assign_student_id}',[StudentRegistrationController::class,'UpdateStudentRegistration'])->name('student.registration.update');
    route::get('/registration/delete/{assign_student_id}',[StudentRegistrationController::class,'DeleteStudentRegistration'])->name('student.registration.delete');
    route::get('/registration/search',[StudentRegistrationController::class,'SearchStudentRegistration'])->name('student.year.class.search');
    route::get('/registration/promote/{$assign_student_id}',[StudentRegistrationController::class,'PromoteStudentRegistration'])->name('student.registration.promote');
   
    
    route::post('/registration/promote/update/{assign_student_id}',[StudentRegistrationController::class,'Promote_updateStudentRegistration'])->name('student.promotion_registration.update'); 
    route::get('/registration/promote/{assign_student_id}',[StudentRegistrationController::class,'DetailStudentRegistration'])->name('student.registration.detail');
    //student roll generate routes
    Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');

    Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
    
    Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');
    //registration fee 
    
    //fee sidebar dynamic
    Route::get('/reg/fee/view', [FeeSidebarController::class, 'AllFeeView'])->name('student.fee_assign.view');
    Route::get('/reg/fee/data/{$route}', [FeeSidebarController::class, 'SendFeeView'])->name('fee_sidebar');

  
    route::prefix('employee')->group(function(){
        Route::get('registration/view', [EmployeeRegistrationController::class, 'EmployeeRegistrationView'])->name('employee.registration.view');
        Route::get('registration/add', [EmployeeRegistrationController::class, 'EmployeeRegistrationAdd'])->name('employee.registration.add');
        Route::post('registration/store', [EmployeeRegistrationController::class, 'EmployeeRegistrationStore'])->name('employee.registration.store');
        Route::get('registration/edit/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationEdit'])->name('employee.registration.edit');
        Route::post('registration/update/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationUpdate'])->name('employee.registration.update');
        Route::get('registration/delete/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationDelete'])->name('employee.registration.delete');
        Route::get('registration/detail/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationDetail'])->name('employee.registration.detail');
        //leave management
        Route::get('leave/employee/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
        Route::get('leave/employee/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');
        Route::post('leave/employee/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');
        Route::get('leave/employee/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');
        Route::post('leave/employee/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');
        Route::get('leave/employee/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');
        //employee attendance
        Route::get('attendance/employee/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');
        Route::get('attendance/employee/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');
        Route::post('attendance/employee/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');
        Route::get('attendance/employee/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');
        Route::get('attendance/employee/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');


    });
    
});