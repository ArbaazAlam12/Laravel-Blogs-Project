<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Home page route
Route::get('/', [HomeController::class, 'index']);

// Dashboard route for authenticated users
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route to redirect after authentication
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth');

// View category route for admin
Route::get('/view_category', [AdminController::class, 'view_category']);

// Add category route for admin (POST request)
Route::post('/add_category', [AdminController::class, 'add_category']);

// Delete category route for admin
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

// Add post route for authenticated users
Route::get('/add_post', [HomeController::class, 'add_post']);

// Create new post form route (POST request)
Route::post('/posts', [HomeController::class, 'posts']);

// View user's own blog posts
Route::get('/my_blog', [HomeController::class, 'my_blog']);

// Delete user's blog post route
Route::get('/delete_post/{id}', [HomeController::class, 'delete_post']);

// Edit user's blog post route
Route::get('/edit_post/{id}', [HomeController::class, 'edit_post']);

// Update edited blog post route (POST request)
Route::post('/edited_post/{id}', [HomeController::class, 'edited_post']);

// Import Excel data route (POST request)
Route::post('import', [HomeController::class, 'import']);

// Export data to Excel route
Route::get('export', [HomeController::class, 'export']);

// View details of a specific post
Route::any('/post_details/{id}', [HomeController::class, 'post_details']);
