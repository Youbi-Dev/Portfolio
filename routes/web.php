<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Auth::routes(['register' => false, 'confirm' => false]);

Route::get('/developer', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/developer', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('developer')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
     // Add Skills routes with the 'admin.' prefix in the route names
     Route::get('/skills', [AdminSkillController::class, 'index'])->name('admin.skills.index');
     Route::get('/skills/create', [AdminSkillController::class, 'create'])->name('admin.skills.create');
     Route::post('/skills', [AdminSkillController::class, 'store'])->name('admin.skills.store');
     Route::get('/skills/{skill}', [AdminSkillController::class, 'show'])->name('admin.skills.show');
     Route::get('/skills/{skill}/edit', [AdminSkillController::class, 'edit'])->name('admin.skills.edit');
     Route::put('/skills/{skill}', [AdminSkillController::class, 'update'])->name('admin.skills.update');
     Route::delete('/skills/{skill}', [AdminSkillController::class, 'destroy'])->name('admin.skills.destroy');
    //project
     Route::get('/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
     Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
     Route::post('/projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
     Route::get('/projects/{project}', [AdminProjectController::class, 'show'])->name('admin.projects.show');
     Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
     Route::put('/projects/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
     Route::delete('/projects/{project}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');
         // Messages routes
    Route::get('/messages', [AdminContactMessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/messages/{contactMessage}', [AdminContactMessageController::class, 'show'])->name('admin.messages.show');
    Route::post('/messages/{contactMessage}/read', [AdminContactMessageController::class, 'markAsRead'])->name('admin.messages.markAsRead');
    Route::post('/messages/{contactMessage}/unread', [AdminContactMessageController::class, 'markAsUnread'])->name('admin.messages.markAsUnread');
    Route::delete('/messages/{contactMessage}', [AdminContactMessageController::class, 'destroy'])->name('admin.messages.destroy');
    Route::post('/messages/{contactMessage}/reply', [AdminContactMessageController::class, 'reply'])->name('admin.messages.reply');
     
});