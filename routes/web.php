<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActivityLogsController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EndorsementLetterController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MoaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SchoolyearController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\YearLevelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentHeadController;
use App\Http\Controllers\WeeklyReportController;
use App\Http\Controllers\DocumentController;
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

// Evaluation routes
Route::get('/admin/interns-evaluation/create', function () {
    return view('admin.interns.create');
});

Route::get('/admin/interns-evaluation', function () {
    return view('admin.interns-evaluation.index');
});

Route::get('/supervisor/interns/create', function () {
    return view('supervisor.interns.create');
});
// End of Evaluation routes
// STUDENT routes
Route::get('/student/dasboard', function () {
    return view('student.dashboard');
});

Route::get('/student/experience_record', function () {
    return view('student.experience_record.index');
});

Route::get('/student/download', function () {
    return view('student.download_&_upload.download');
});

Route::get('/student/upload', function () {
    return view('student.download_&_upload.upload');
});

Route::get('/student/printables/guardian-consent-form', function () {
    return view('student.printables.guardian-consent-form');
});
Route::get('/student/notification', function () {
    return view('student.notifications.index');
});

Route::get('/admin/interns-log', function () {
    return view('admin.interns-log.index');
});
Route::get('/admin/interns-log/show', function () {
    return view('admin.interns-log.show');
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
    Route::get('/admin/archive', [ArchiveController::class, 'index'])->name('admin.archive.index');
    Route::get('/admin/questionnaire', [QuestionnaireController::class, 'index'])->name('admin.questionnaire.index');
    Route::post('/admin/questionnaire/store', [QuestionnaireController::class, 'store'])->name('admin.questionnaire.store');
    Route::get('/admin/evaluation',[EvaluationController::class, 'index'])->name('admin.evaluation.index');
    Route::post('/admin/evaluation/store', [EvaluationController::class, 'store'])->name('admin.evaluation.store');
    Route::post('/admin/agency/store', [AgencyController::class, 'store'])->name('admin.agency.store');
    //MOA
    Route::get('/admin/moa/index',[MoaController::class, 'index'])->name('admin.moa.index');

    Route::post('/admin/store', [MoaController::class, 'store'])->name('admin.moa.store');

    //Course
    Route::get('/admin/course/index', [CourseController::class, 'index'])->name('admin.course.index');
    Route::post('/admin/course/store', [CourseController::class, 'store'])->name('admin.course.store');

    //Endorsement
    Route::get('/admin/endorsement/index', [EndorsementLetterController::class,'index'])->name('admin.endorsement.index');
    Route::post('/admin/endorsement/store', [EndorsementLetterController::class, 'store'])->name('admin.endorsement.store');
    Route::put('/admin/student/updateStudentStatus', [StudentController::class, 'updateStudentStatus'])->name('admin.student.updateStudentStatus');


    //Add department
    Route::get('/admin/department/index', [DepartmentController::class, 'index'])->name('admin.department.index');
    Route::post('/admin/department/store', [DepartmentController::class, 'store'])->name('admin.department.store');

    
    Route::put('admin/questionnaire/{evaluation}', [EvaluationController::class, 'update'])->name('admin.questionnaire.update');

    Route::put('/student/{id}/approve', [StudentController::class, 'approve'])->name('student.approve');



    Route::put('/update-status/{id}', [QuestionnaireController::class, 'updateStatus'])->name('update.status');


    Route::get('/students/{id}', [ArchiveController::class, 'showStudent'])->name('student.show');
   
// Route for displaying the form (GET request)
Route::get('/admin/school_year/create', [SchoolYearController::class, 'create'])->name('admin.school_year.create');

// Route for handling the form submission (POST request)
Route::post('/admin/school_year/store', [SchoolYearController::class, 'store'])->name('admin.school_year.store');

Route::get('/admin/year_level/index', [YearLevelController::class , 'index'])->name('admin.year_level.index');
Route::post('/admin/year_level/store', [YearLevelController::class,  'store'])->name('admin.year_level.store');


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

    // Route::get('/department_head/gallery', [DepartmentHeadController::class, 'indexDepartmentHead'])->name('department_head.gallery.index');

    Route::post('/filter-students', [DepartmentHeadController::class, 'filterStudentsDept'])->name('department_head.filter.students');

    Route::get('/show/{id}', [DepartmentHeadController::class, 'show'])->name('show');

    Route::get('/department_head/weekly_reports',  [DepartmentHeadController::class, 'weekly_reports'])->name('department_head.weekly_reports');

    // Add a route for filtering students
    Route::get('/department_head/dashboard/filter', [DepartmentHeadController::class, 'filterStudents'])->name('department_head.filterStudents');

    Route::get('department-head/create', [DepartmentHeadController::class, 'create'])->name('department_head.departmentHead.create');

    Route::post('/department-heads', [DepartmentHeadController::class, 'store'])->name('department_heads.store');

    Route::get('/department-head/school_year/create', [SchoolYearController::class, 'create'])->name('department_head.school_year.create');

    Route::post('/department-head/school_year', [SchoolYearController::class, 'store'])->name('department_head.school_year.store');

    Route::put('/department_head/students/updateStudentStatus/{id}', [StudentController::class, 'updateStudentStatus'])->name('department_head.students.updateStudentStatus');

    Route::get('/department_head/gallery/index', [GalleryController::class, 'index'])->name('department_head.gallery.index');

    Route::get('/gallery/view/{id}', [GalleryController::class, 'show'])->name('gallery.view');

    Route::get('/students/{id}/gallery/{weekNumber}', [GalleryController::class, 'show']);

    Route::get('/department_head/weekly_reports/reports', [WeeklyReportController::class, 'reports'])->name('department_head.weekly_reports.reports');

    Route::get('/weekly_reports/view/{id}', [WeeklyReportController::class, 'showReports'])->name('weekly_reports.view');

    Route::get('/department_head/weekly_reports/{id}/{week_number}/{day}', [DepartmentHeadController::class, 'view'])->name('department_head.weekly_reports.view');

    // routes/web.php

Route::get('/department-head/weekly-report/{student_id}/{week_number}', [WeeklyReportController::class, 'summary'])
->name('department_head.weekly_reports.summary');



    Route::get('/department_head/weekly_reports/reports', [WeeklyReportController::class, 'reports'])->name('department_head.weekly_reports.reports');

    // Route::get('department-head/index',[MoaController::class, 'index'])->name('department_head.moa.index');

    // Route::post('/department_head/store', [MoaController::class, 'store'])->name('department_head.moa.store');


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

    // Route in web.php
    Route::get('/student/weekly-report/{student_id}/{day_no}/{day}/{week_number}', [StudentController::class, 'summary'])->name('student.weeklyReport.summary');


    // Route::get('/weekly-report/show/{id}', [WeeklyReportController::class, 'show'])->name('weeklyReport.show');
    // routes/web.php

// Route::get('/weekly_report/{id}', [WeeklyReportController::class, 'show'])->name('weeklyReport.show');
Route::get('/weekly-report/{weekNumber}', [WeeklyReportController::class, 'show'])->name('weeklyReport.show');


    Route::get('/documents/index', [DocumentController::class, 'index'])->name('documents.index');

    Route::post('/documents/store', [DocumentController::class, 'store'])->name('documents.store');


    // Logout
    Route::post('/student-logout', [StudentController::class, 'logout'])->name('student.logout');
});






//supervisor
// Supervisor Authentication Routes
Route::get('/supervisor/login', [SupervisorController::class, 'showLoginForm'])->name('supervisor.login');
Route::post('/supervisor/login', [SupervisorController::class, 'login'])->name('supervisor.login.post');

Route::middleware('auth:supervisor')->group(function () {
    // Dashboard and Profile
    Route::get('/supervisor/dashboard', [SupervisorController::class, 'Supervisor_index'])->name('supervisor.dashboard');
    Route::get('/supervisor/profile', [SupervisorController::class, 'profile'])->name('supervisor.profile');

    // Weekly Report
    Route::get('/supervisor/weekly-report/index', [SupervisorController::class, 'weeklyReportIndex'])->name('supervisor.weeklyReportIndex');
    Route::post('/supervisor/weekly-report/upload-images', [WeeklyReportController::class, 'store'])->name('supervisor.weeklyReport.uploadImgs');

    Route::get('/supervisor/weekly-report/{weekNumber}', [WeeklyReportController::class, 'show'])->name('supervisor.weeklyReport.show');
  
    // Route::get('/supervisor/interns', [SupervisorController::class, 'internsLIst'])->name('supervisor.interns.index');

    Route::get('/supervisor/evaluation/{id}', [EvaluationController::class, 'evaluate'])->name('supervisor.evaluation.evaluate');

    Route::get('/supervisor/interns/index', [ActivityLogsController::class, 'index'])->name('supervisor.interns.index');
    Route::get('/supervisor/show/{id}', [ActivityLogsController::class, 'show'])->name('supervisor.interns.show');

    Route::post('/supervisor/interns/{id}/approve', [ActivityLogsController::class, 'approve'])->name('supervisor.interns.approve');

    Route::get('/supervisor/weekly_report/{student_id}/{day_no}/{day}', [SupervisorController::class, 'studentActivities'])->name('supervisor.weekly_reports.summary');

    Route::get('/supervisor/interns/{student_id}/{day_no}/{day}/{week_number}', [ActivityLogsController::class, 'supervisorSummary'])
    ->name('supervisor.interns.summary');


    Route::get('/supervisor/interns/{id}/{week_number}/{day}', [ActivityLogsController::class, 'view'])->name('supervisor.interns.view');

    Route::get('/supervisor/list/index', [SupervisorController::class, 'internList'])->name('supervisor.list.index');

    // Logout
    Route::post('/supervisor-logout', [SupervisorController::class, 'logout'])->name('supervisor.logout');
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



