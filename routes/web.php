<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/services', [PublicController::class, 'services'])->name('services');
Route::get('/doctors', [PublicController::class, 'doctors'])->name('doctors');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
    Route::get('/dashboard/doctors', [DashboardController::class, 'userDoctors'])->name('dashboard.doctors');
    Route::get('/dashboard/appointments/new', [DashboardController::class, 'createAppointment'])->name('dashboard.appointments.create');
    Route::post('/dashboard/appointments/new', [DashboardController::class, 'storeAppointment']);
    Route::get('/dashboard/appointments/history', [DashboardController::class, 'appointmentHistory'])->name('dashboard.appointments.history');
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::post('/dashboard/profile', [DashboardController::class, 'updateProfile']);
    Route::get('/dashboard/password', [DashboardController::class, 'passwordForm'])->name('dashboard.password');
    Route::post('/dashboard/password', [DashboardController::class, 'updatePassword']);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/doctors', [AdminController::class, 'doctors'])->name('admin.doctors');
    Route::get('/doctors/create', [AdminController::class, 'createDoctor'])->name('admin.doctors.create');
    Route::post('/doctors', [AdminController::class, 'storeDoctor']);
    Route::get('/doctors/{doctor}/edit', [AdminController::class, 'editDoctor'])->name('admin.doctors.edit');
    Route::put('/doctors/{doctor}', [AdminController::class, 'updateDoctor'])->name('admin.doctors.update');
    Route::delete('/doctors/{doctor}', [AdminController::class, 'destroyDoctor'])->name('admin.doctors.destroy');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('admin.users.show');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::post('/users/{user}/role', [AdminController::class, 'updateRole'])->name('admin.users.role');
    Route::get('/appointments', [AdminController::class, 'appointments'])->name('admin.appointments');
    Route::post('/appointments/{appointment}/status', [AdminController::class, 'updateAppointmentStatus'])->name('admin.appointments.status');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'updateProfile']);
    Route::get('/password', [AdminController::class, 'passwordForm'])->name('admin.password');
    Route::post('/password', [AdminController::class, 'updatePassword']);
});
