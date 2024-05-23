<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolyearController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentHeadController;
use App\Http\Controllers\WeeklyReportController;
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


Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/', function () {
    return view('site.index');
});

Route::get('/student/dasboard', function () {
    return view('student.dashboard');
});

Route::get('/student/bio-data', function () {
    return view('student.bio-data');
});

Route::get('/student/letter-of-intent', function () {
    return view('student.letter-of-intent');
});

Route::get('/student/good-moral', function () {
    return view('student.good-moral');
});

Route::get('/site/index', function () {
    return view('site.index');
})->name('site.index');

// Route::get('/student/register', function () {
//     return view('student.register');
// })->name('student.register');

Route::get('/student/register', [StudentController::class, 'create'])->name('student.register.create');

Route::get('/admin-login', function () {
    return view('auth.login');
})->name('admin-login');

Route::get('/department-login', function () {
    return view('auth.department_login');
})->name('department-login');

Route::get('/supervisor-login', function () {
    return view('auth.supervisor');
})->name('supervisor-login');

Route::get('/student-login', function () {
    return view('auth.login_student');
})->name('student-login');

Route::post('/register', [StudentController::class, 'store'])->name('students.store');

//admin access
// Admin login form (GET request)
Route::get('/admin-login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Admin login (POST request)
Route::post('/admin-login', [AdminController::class, 'login'])->name('admin.login.submit');

// Admin protected routes (requires authentication)
// Route::middleware('auth:admin')->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('/admin/interns', [AdminController::class, 'interns'])->name('admin.interns.index');
//     // Other admin routes here

//     // Route::post('/approve-student/{student}', [AdminController::class, 'approveStudent'])->name('admin.approveStudent');
//     // Route::get('/admin/students/{status}', [AdminController::class, 'index'])->name('admin.dashboard');
//     // Route::get('/admin/filter-students/{status}', [AdminController::class, 'filterStudents'])->name('admin.filterStudents');
//     Route::post('/approve-student/{student}', [AdminController::class, 'approveStudent'])->name('admin.approveStudent');


//     Route::get('/admin/agencies', [AdminController::class, 'agencies'])->name('admin.agencies');

//     Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');

//     Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('admin.categories.store');

//     Route::get('/admin/accounts/department_head', [AccountController::class, 'index'])->name('admin.departmentHead.department_head');

//     Route::post('/department-heads', [DepartmentHeadController::class, 'store'])->name('department_heads.store');

//     Route::get('/admin/accounts', [SupervisorController::class, 'index'])->name('admin.supervisor.supervisor');

//     Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
//     Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('admin.categories.store');
//     Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
//     Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');

    
// });
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/interns', [AdminController::class, 'interns'])->name('admin.interns.index');
    Route::post('/approve-student/{student}', [AdminController::class, 'approveStudent'])->name('admin.approveStudent');
    Route::get('/admin/agencies', [AdminController::class, 'agencies'])->name('admin.agencies');
    Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/accounts/department_head', [AccountController::class, 'index'])->name('admin.departmentHead.department_head');
    Route::post('/department-heads', [DepartmentHeadController::class, 'store'])->name('department_heads.store');
    Route::get('/admin/accounts', [SupervisorController::class, 'index'])->name('admin.supervisor.supervisor');
    Route::post('/supervisor/store', [SupervisorController::class, 'store'])->name('supervisor.store');
    Route::get('/admin/interns-log', [ArchiveController::class, 'index'])->name('admin.archive.index');
   
// Route for displaying the form (GET request)
Route::get('/admin/school_year/create', [SchoolYearController::class, 'create'])->name('admin.school_year.create');

// Route for handling the form submission (POST request)
Route::post('/admin/school_year/store', [SchoolYearController::class, 'store'])->name('admin.school_year.store');




Route::get('/admin/archives', [ArchiveController::class, 'index'])->name('admin.archives.index');
Route::get('/filter-students', [ArchiveController::class, 'filterStudents'])->name('filter.students');



    Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');
});



//department head login
Route::get('/department_head/login', [DepartmentHeadController::class, 'showLoginForm'])->name('department_head.login');
Route::post('/department_head/login', [DepartmentHeadController::class, 'login'])->name('department_head.login.post');

Route::middleware('auth:department_head')->group(function () {
    Route::get('/department_head/dashboard', [DepartmentHeadController::class, 'index'])->name('department_head.dashboard');
    

 

    Route::get('/department_head/profile', [DepartmentHeadController::class, 'profile'])->name('department_head.profile');

    // Add more department head routes here

    Route::post('/department_head-logout', [DepartmentHeadController::class, 'logout'])->name('department_head.logout');

    Route::post('/approve-student/{student}', [DepartmentHeadController::class, 'approveStudent'])->name('department_head.approveStudent');

    Route::get('/department_head/archives', [DepartmentHeadController::class, 'indexDepartmentHead'])->name('department_head.archives.index');
    Route::post('/filter-students', [DepartmentHeadController::class, 'filterStudentsDept'])->name('filter.students');


    // Add a route for filtering students
    Route::get('/department_head/dashboard/filter', [DepartmentHeadController::class, 'filterStudents'])->name('department_head.filterStudents');
});





//student login

Route::get('/student/login', [StudentController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/login', [StudentController::class, 'login'])->name('student.login.post');

Route::middleware('auth:student')->group(function () {
    // Dashboard and Profile
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');

    // Weekly Report
    Route::get('/weekly-report/index', [StudentController::class, 'weeklyReportIndex'])->name('student.weeklyReportIndex');
    Route::post('/weekly-report/upload-images', [WeeklyReportController::class, 'store'])->name('weeklyReport.uploadImgs');

    Route::get('/weekly-report/{weekNumber}', 'WeeklyReportController@show')->name('weeklyReport.show');

    // Route::get('/weekly-report/show/{id}', [WeeklyReportController::class, 'show'])->name('weeklyReport.show');
    // routes/web.php

// Route::get('/weekly_report/{id}', [WeeklyReportController::class, 'show'])->name('weeklyReport.show');
Route::get('/weekly-report/{weekNumber}', [WeeklyReportController::class, 'show'])->name('weeklyReport.show');




    // Logout
    Route::post('/student-logout', [StudentController::class, 'logout'])->name('student.logout');
});



// Route::get('/student/login', [StudentController::class, 'showLoginForm'])->name('student.login');
// Route::post('/student/login', [StudentController::class, 'login'])->name('student.login.post');

// Route::middleware('auth:student')->group(function () {
//     Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');

    
//     // Add more student routes here

//     Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');

//     Route::get('/weekly-report/index', [StudentController::class, 'weeklyReportIndex'])->name('student.weeklyReportIndex'); // New route for weekly report index


//     Route::post('/weekly-report/uploadImgs', [WeeklyReportController::class, 'uploadImgs'])->name('weeklyReport.uploadImgs');

//     // Route::get('/weekly-report/show/{id}', [WeeklyReportController::class, 'show'])->name('weekly-report.show');
//     Route::get('/weekly-report/show/{id}', [WeeklyReportController::class, 'show'])->name('weeklyReport.show');







//     Route::post('/student-logout', [StudentController::class, 'logout'])->name('student.logout');


// });



