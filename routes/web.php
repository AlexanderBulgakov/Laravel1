<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Route::resource('posts', PostController::class);
/*
Route::get('/welcome', function () {
    return 'Welcome to our website!';
});
*/
/*
Route::get('/welcome/{name?}', function (string $name = 'guest') {
    return "Welcome, {$name}!";
});
*/
Route::get('/welcome/{name}/{age}', function (string $name, string $age) {
    return "Welcome, {$name}. You are {$age} years old.";
})->whereAlpha('name')->whereNumber('age');

Route::get('/year/{year}', function (string $year) {
    if($year == date('Y')){
        $res = 'Yes, this is the current year';
    } else {
        $res = 'No, this is not the current year';
    }

    return $res;
})->where(['year' => '^\d{4}$']);

Route::get('/age/{age}', function (string $age) {
    return "You are {$age} years old.";
})->whereNumber('age');

Route::get('/find', function () {
    $q = request()->query('q');

    if($q){
        $res = "You are searching for {$q}";
    } else {
        $res = 'Please enter a search query';
    }
    
    return $res;
});

Route::get('/page', function () {
    $res = '<h1>This is a page</h1>';

    return response($res, 200);
});

Route::get('/missing', function () {
    $res = '<h1>This page is not found</h1>';

    return response($res, 404);
});

Route::get('/public', function () {
    $res = '<h1>Public Page</h1>';

    return response($res)
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate');
});
