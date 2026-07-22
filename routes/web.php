<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Teacher\AuthController as TeacherAuthController;
use App\Http\Controllers\Student\AuthController as StudentAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\MarkController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PayPalController;
use App\Http\Controllers\Admin\MonnifyController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\TeacherAssignmentController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\AttendanceController as AdminAttendanceController;
use App\Http\Controllers\Admin\StripePaymentController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboardController;
use App\Http\Controllers\Teacher\Auth\LoginController;
use App\Http\Controllers\Teacher\MyClassController;
use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\ProfileController as TeacherProfileController;
use App\Http\Controllers\Teacher\SubjectController as TeacherSubjectController;
use App\Http\Controllers\Teacher\MarkController as TeacherMarkController;
use App\Http\Controllers\Teacher\StudentController as TeacherStudentController;
use App\Http\Controllers\Student\StudentSubjectController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\Student\StudentResultController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Student\StudentAttendanceController ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::middleware(['auth'])->group(function () {

    
// Route::get('/', function () {
//     return redirect('/login');
// });

// Route::get('/login',[AuthenticatedSessionController::class,'create'])
//     ->name('login');

// Route::post('/login',[AuthenticatedSessionController::class,'store']);
// });

Route::post('/logout', [AuthenticatedSessionController::class,'destroy'])
    ->name('logout');
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
 
Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
Route::get('/global-search',
        [SearchController::class,'search']
    )->name('global.search');

    Route::get('/attendance',
[AdminAttendanceController::class,'index'])
->name('attendance.index');


Route::get('/marks',
    [MarkController::class,'index'])
    ->name('marks.index');



    Route::get('/marks/{mark}/edit',
    [MarkController::class,'edit'])
    ->name('marks.edit');



    Route::put('/marks/{mark}',
    [MarkController::class,'update'])
    ->name('marks.update');



    Route::delete('/marks/{mark}',
    [MarkController::class,'destroy'])
    ->name('marks.destroy');



    Route::get('/marks/result/{student}',
    [MarkController::class,'result'])
    ->name('marks.result');


Route::get('/reports',
    [ReportController::class,'index']
)
->name('reports.index');



Route::get('/reports/students',
    [ReportController::class,'students']
)
->name('reports.students');



Route::get('/reports/attendance',
    [ReportController::class,'attendance']
)
->name('reports.attendance');



Route::get('/reports/marks',
    [ReportController::class,'marks']
)
->name('reports.marks');

Route::get(
'/settings',
[SettingController::class,'index']
)
->name('settings.index');



Route::post(
'/settings',
[SettingController::class,'update']
)
->name('settings.update');


Route::get('/get-sections/{class}', [StudentController::class,'getSections']);
        Route::resource('students', StudentController::class);
        Route::resource('classes', SchoolClassController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('subjects', SubjectController::class);
  Route::get('/notifications/read/{id}',
            [NotificationController::class,'read'])
            ->name('notifications.read');

        Route::get('/notifications/read-all',
            [NotificationController::class,'readAll'])
            ->name('notifications.readAll');

        Route::delete('/notifications/delete/{id}',
            [NotificationController::class,'destroy'])
            ->name('notifications.destroy');

        Route::delete('/notifications/delete-all',
            [NotificationController::class,'destroyAll'])
            ->name('notifications.destroyAll');

            // Route::get('/profile', [AdminProfileController::class,'index'])->name('profile');

            Route::get('/profile', [AdminProfileController::class,'index'])
    ->name('profile');

Route::get('/profile/edit', [AdminProfileController::class,'edit'])
    ->name('profile.edit');

Route::put('/profile/update', [AdminProfileController::class,'update'])
    ->name('profile.update');

Route::get('/profile/password', [AdminProfileController::class,'password'])
    ->name('profile.password');

Route::put('/profile/password', [AdminProfileController::class,'updatePassword'])
    ->name('profile.password.update');

Route::get(
'/teacher-assignment',
[TeacherAssignmentController::class,'index']
)
->name('teacher.assignment.index');



Route::get(
'/teacher-assignment/create',
[TeacherAssignmentController::class,'create']
)
->name('teacher.assignment.create');



Route::post(
'/teacher-assignment',
[TeacherAssignmentController::class,'store']
)
->name('teacher.assignment.store');



Route::delete(
'/teacher-assignment/{id}',
[TeacherAssignmentController::class,'destroy']
)
->name('teacher.assignment.destroy');

Route::resource('fees', FeeController::class);
Route::resource('payments', App\Http\Controllers\Admin\PaymentController::class);

// Invoice Module
// ==========================
Route::resource('invoices', InvoiceController::class);

// ==========================
// Transaction Module
// ==========================
Route::resource('transactions', TransactionController::class);
Route::get('payments',[PaymentController::class,'index'])
        ->name('payments.index');

Route::post('payments/pay/{fee}',
        [PaymentController::class,'pay'])
        ->name('payments.pay');

Route::get('payments/invoice/{payment}',
        [PaymentController::class,'invoice'])
        ->name('payments.invoice');


Route::get(
    'stripe/{payment}',
    [StripePaymentController::class,'checkout']
)->name('stripe.checkout');

Route::post(
    'stripe/{payment}',
    [StripePaymentController::class,'process']
)->name('stripe.process');

Route::get(
    'stripe/success/{payment}',
    [StripePaymentController::class,'success']
)->name('stripe.success');

Route::get(
    'stripe/cancel',
    [StripePaymentController::class,'cancel']
)->name('stripe.cancel');
// PayPal
Route::get('/paypal/{payment}',
    [PayPalController::class,'checkout'])
    ->name('paypal.checkout');

Route::get('/paypal/success/{payment}',
    [PayPalController::class,'success'])
    ->name('paypal.success');

Route::get('/paypal/cancel/{payment}',
    [PayPalController::class,'cancel'])
    ->name('paypal.cancel');
// Monnify
Route::get('/monnify/{payment}',
    [MonnifyController::class,'checkout'])
    ->name('monnify.checkout');

Route::get('/monnify/success/{payment}',
    [MonnifyController::class,'success'])
    ->name('monnify.success');


    /*
|--------------------------------------------------------------------------
| Payment Gateway
|--------------------------------------------------------------------------
*/

Route::get('/payment-gateways',
    [PaymentGatewayController::class,'index'])
    ->name('payment-gateways.index');

Route::get('/payment-gateways/stripe',
    [PaymentGatewayController::class,'stripe'])
    ->name('payment-gateways.stripe');

Route::post('/payment-gateways/stripe',
    [PaymentGatewayController::class,'storeStripe'])
    ->name('payment-gateways.stripe.store');


Route::get('/payment-gateways/paypal',
    [PaymentGatewayController::class,'paypal'])
    ->name('payment-gateways.paypal');

Route::post('/payment-gateways/paypal',
    [PaymentGatewayController::class,'storePaypal'])
    ->name('payment-gateways.paypal.store');


Route::get('/payment-gateways/monnify',
    [PaymentGatewayController::class,'monnify'])
    ->name('payment-gateways.monnify');

Route::post('/payment-gateways/monnify',
    [PaymentGatewayController::class,'storeMonnify'])
    ->name('payment-gateways.monnify.store');
    Route::get(
    'payment-gateways/{paymentGateway}',
    [PaymentGatewayController::class,'show']
)->name('payment-gateways.show');
// Route::get('/profile/edit', [AdminProfileController::class,'edit'])->name('profile.edit');
// Route::get('/profile/password', [AdminProfileController::class,'password'])->name('profile.password');
//  Route::put('/profile/password', [AdminProfileController::class, 'updatePassword'])
//     ->name('profile.password.update');
    });

// Teacher Login Routes (Outside Middleware)
// Route::get('/login', [LoginController::class, 'showLogin'])->name('teacher.login');
// Route::post('/login', [LoginController::class, 'login'])->name('teacher.login.submit');
// Route::post('/logout', [LoginController::class, 'logout'])->name('teacher.logout');
Route::get('/teacher/login',[TeacherAuthController::class,'login'])
    ->name('teacher.login');

Route::post('/teacher/login',[TeacherAuthController::class,'authenticate'])
    ->name('teacher.login.submit');

Route::post('/teacher/logout',[TeacherAuthController::class,'logout'])
    ->name('teacher.logout');
// Teacher Protected Routes
Route::middleware(['auth', 'teacher'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {
        Route::get(
    '/my-classes',
    [MyClassController::class, 'index']
)->name('my.classes');
Route::get('/students', [TeacherStudentController::class,'index'])
    ->name('students');
Route::get('/attendance', [AttendanceController::class,'index'])
    ->name('attendance');
Route::get('/attendance/view', [AttendanceController::class, 'view'])
    ->name('attendance.view');
Route::post('/attendance', [AttendanceController::class,'store'])
    ->name('attendance.store');

Route::get('/marks',[TeacherMarkController::class,'index'])
        ->name('marks.index');

    Route::post('/marks',[TeacherMarkController::class,'store'])
        ->name('marks.store');

    Route::get('/marks/view',[TeacherMarkController::class,'view'])
        ->name('marks.view');

    Route::get('/marks/{mark}/edit',[TeacherMarkController::class,'edit'])
        ->name('marks.edit');

    Route::put('/marks/{mark}',[TeacherMarkController::class,'update'])
        ->name('marks.update');

    Route::delete('/marks/{mark}',[TeacherMarkController::class,'destroy'])
        ->name('marks.destroy');


        Route::get(
    '/subjects',
    [TeacherSubjectController::class, 'index']
)->name('subjects.index');

Route::get(
    '/subjects/{id}',
    [TeacherSubjectController::class, 'show']
)->name('subjects.show');
Route::get('/profile', [TeacherProfileController::class,'index'])
    ->name('profile');

Route::post('/profile/update', [TeacherProfileController::class,'update'])
    ->name('profile.update');

Route::post('/profile/password', [TeacherProfileController::class,'password'])
    ->name('profile.password');

    Route::get(
    '/profile/show',
    [TeacherProfileController::class, 'show']
)->name('profile.show');
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])
            ->name('dashboard');
    });
        // Route::get('/dashboard', [TeacherDashboardController::class, 'index'])
        //     ->name('dashboard');

    Route::get('/student/login',[StudentAuthController::class,'login'])
    ->name('student.login');
Route::post('/logout', function(){

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/login');

})->name('logout');
// Route::post('/student/login',[StudentAuthController::class,'authenticate'])
//     ->name('student.login.submit');

// Route::post('/student/logout',[StudentAuthController::class,'logout'])
//     ->name('student.logout');
Route::middleware(['auth','role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        Route::get('/dashboard',
            [StudentDashboardController::class,'index'])
            ->name('dashboard');
Route::get(
'/attendance',
[StudentAttendanceController::class,'index']
)
->name('attendance');

Route::get('/subjects', [StudentSubjectController::class, 'index'])
    ->name('subjects');

    Route::get('/results', [StudentResultController::class, 'index'])
    ->name('results');
    Route::get('/profile', [StudentProfileController::class, 'index'])
    ->name('profile');

Route::put('/profile', [StudentProfileController::class, 'update'])
    ->name('profile.update');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
