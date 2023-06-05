<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/person', function () {
    return response()->json(
        [
            'name' => 'test name',
            'age' => '100',
            'city' => 'City123'
        ]
    );
});

Route::get('/person/{name}', function (string $name) {
    $example_names = [
        'Test1',
        'John'
    ];

    $key = array_search($name, $example_names);
    if($key !== false){
        $res = [
            'name' => $example_names[ $key ]
        ];
    } else {
        $res = [
            'error' => 'Name not found'
        ];
    }

    return response()->json($res);
});
