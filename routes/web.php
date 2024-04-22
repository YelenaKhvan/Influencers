<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InnerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


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

Route::group([
    'prefix' => '/',
    'as' => 'page.',
], function () {
    Route::get('/', [IndexController::class, 'home'])->name('home');
    Route::get('/login', [IndexController::class, 'login'])->name('login');  
    Route::get('/register', [IndexController::class, 'register'])->name('register');   
});

// Route::group([
//     'prefix' => '/auth',
//     'as' => 'auth.',
// ], function () {
//     Route::post('/create', [AuthController::class, 'createUser'])->name('createUser');  
//     Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser'); 
//     Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logoutUser');  

// });

Route::get('/posts', [PostController::class, 'posts'])->name('posts.posts');  
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');  
 

Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');
Route::post('/posts/{id}/comment', [CommentController::class, 'store'])->name('posts.comment');
Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])
    ->name('posts.comments.store')
    ->middleware('auth.comment'); // Применение middleware к маршруту


// Route::view('/', 'home');
Route::name('page.')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::view('/inner', 'pages.inner')->name('inner');
    });

    Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser'); 
    Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logoutUser'); 

    Route::get('register', function(){
        if(Auth::check()){
            return redirect(route('page.inner'));
        }
        return view('pages.auth.register');
    })->name('register');

    Route::post('/register',[AuthController::class, 'createUser'])->name('createUser');
});

Route::get('/dashboard', [DashboardController::class, 'inDash'])
    ->middleware('auth:admin')
    ->name('dashboard');

Route::get('/inner', [InnerController::class, 'inner'])
    ->middleware('can:viewInnerPage,App\Models\User')
    ->name('page.inner');




// Route::get('/private', function () {
//     Gate::authorize('view-protected-part');
//     return view('private');
// })->middleware(['auth'])->name('private');



// Route::get('/dashboard', function (){
//     Gate::authorize('view-protected-part');
//         return view('dash.dashboard');
//     })->middleware(['auth'])->name('dashboard');