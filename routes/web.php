<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });

// Route::get('/', function () {
//     return view('site.index');
// });

// // Admin Site
// Route::get('/admin/interns',function () {
//         return view('admin.interns.index');
//     }
// );
// Route::get('/admin/bookmarks',function () {
//         return view('admin.bookmarks.index');
//     }
// );
// Route::get('/admin/interns-log',function () {
//         return view('admin.interns-log.index');
//     }
// );
// Route::get('/admin/interns-evaluation',function () {
//         return view('admin.interns-evaluation.index');
//     }
// );
// Route::get('/admin/moa',function () {
//         return view('admin.moa.index');
//     }
// );
// Route::get('/admin/notifications',function () {
//         return view('admin.notifications.index');
//     }
// );

// Route::get('/', function () {
//     return view('site.index');
// });

// //adminlogin
// // Route::middleware(['auth:admin'])->group(function () {

// //     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// //     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// // });

// // Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');




// // Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
// // Route::post('/admin/login', [AdminController::class, 'login']);

// //admin login
// Route::get('/', function () {
//     return view('site.index');
// });

// // Admin Routes
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

// Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AdminController::class, 'login']);





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::get('/site/index', function () {
    return view('site.index');
});
Route::get('/', function () {
    return view('site.index');
});

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



//admin access
// Admin login form (GET request)
Route::get('/admin-login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Admin login (POST request)
Route::post('/admin-login', [AdminController::class, 'login'])->name('admin.login.submit');

// Admin protected routes (requires authentication)
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Add other admin routes here
});


