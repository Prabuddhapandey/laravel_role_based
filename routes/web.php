<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PradeshController;
use App\Http\Controllers\PalikaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
    Route::middleware(['auth','role:admin'])->group(function()
   {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/data', [AdminController::class, 'AdminData'])->name('admin.data');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/create', [AdminController::class, 'AdminCreate'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'AdminStore'])->name('admin.store');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'AdminDelete'])->name('admin.delete');
    Route::get('/admin/edit/{id}', [AdminController::class, 'AdminEdit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'AdminUpdate'])->name('admin.update');
    Route::put('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    });
   Route::middleware(['auth','role:Pradesh'])->group(function()
  {
    Route::get('/pradesh/dashboard', [PradeshController::class, 'PradeshDashboard'])->name('pradesh.dashboard');
    Route::get('/pradesh/logout', [PradeshController::class, 'PradeshLogout'])->name('pradesh.logout');
    Route::get('/pradesh/data', [PradeshController::class, 'PradeshData'])->name('pradesh.data');
    Route::get('/pradesh/profile', [PradeshController::class, 'PradeshProfile'])->name('pradesh.profile');
    Route::get('/pradesh/create', [PradeshController::class, 'PradeshCreate'])->name('pradesh.create');
    Route::post('/pradesh/store', [PradeshController::class, 'PradeshStore'])->name('pradesh.store');
    Route::delete('/pradesh/delete/{id}',[PradeshController::class, 'PradeshDelete'])->name('pradesh.delete');
    Route::get('/pradesh/edit/{id}', [PradeshController::class, 'PradeshEdit'])->name('pradesh.edit');
    Route::put('/pradesh/update/{id}', [PradeshController::class, 'PradeshUpdate'])->name('pradesh.update');
    Route::put('/pradesh/profile/update', [PradeshController::class, 'PradeshProfileUpdate'])->name('pradesh.profile.update');

    });
    Route::middleware(['auth','role:Palika'])->group(function()
    {
    Route::get('/palika/dashboard', [PalikaController::class, 'PalikaDashboard'])->name('palika.dashboard');
    Route::get('/palika/logout', [PalikaController::class, 'PalikaLogout'])->name('palika.logout');
    Route::get('/palika/data', [PalikaController::class, 'PalikaData'])->name('palika.data');
    Route::get('/palika/profile', [PalikaController::class, 'PalikaProfile'])->name('palika.profile');
    Route::get('/palika/create', [PalikaController::class, 'PalikaCreate'])->name('palika.create');
    Route::post('/palika/store', [PalikaController::class, 'PalikaStore'])->name('palika.store');
    Route::delete('/palika/delete/{id}',[PalikaController::class, 'PalikaDelete'])->name('palika.delete');
    Route::get('/palika/edit/{id}', [PalikaController::class, 'PalikaEdit'])->name('palika.edit');
    Route::put('/palika/update/{id}', [PalikaController::class, 'PalikaUpdate'])->name('palika.update');
    Route::post('/palika/profile/update', [PalikaController::class, 'PalikaProfileUpdate'])->name('palika.profile.update');
    
    });
    Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // Route::post('login', function (){
    //     return 'hello';
    // })->name('login');
