<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/', function () {
    return view('site.index');
});

// Admin Site
Route::get('/admin/interns',function () {
        return view('admin.interns.index');
    }
);
Route::get('/admin/bookmarks',function () {
        return view('admin.bookmarks.index');
    }
);
Route::get('/admin/interns-log',function () {
        return view('admin.interns-log.index');
    }
);
Route::get('/admin/interns-evaluation',function () {
        return view('admin.interns-evaluation.index');
    }
);
Route::get('/admin/moa',function () {
        return view('admin.moa.index');
    }
);
Route::get('/admin/notifications',function () {
        return view('admin.notifications.index');
    }
);

Route::get('/', function () {
    return view('site.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
