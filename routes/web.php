<?php

use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\NotificationController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',[ControllerAdmin::class,'index']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/tickets', [TicketController::class, 'store']);

// GET request for viewing notifications
Route::get('/notification', [NotificationController::class, 'index']);

// POST request for sending a notification
Route::post('/notifications', [NotificationController::class, 'send'])->name('notifications');



Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');


use App\Http\Controllers\CommentController;

// Display the comment page with a specific ticket's comments
Route::get('/ticket/{id}/comments', [CommentController::class, 'show'])->name('comments');

// Handle the submission of a new comment
Route::post('/ticket/{id}/comments', [CommentController::class, 'store'])->name('ticket.comments.store');




//Route::view('/index', 'users.index');

Route::resource('users',CourseController::class);




