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
})->where(['res' => '^\d{4}$']);

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
