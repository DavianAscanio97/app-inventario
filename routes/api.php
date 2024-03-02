<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;

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

// USUARIOS


// CRUD -> CREAR - LEER - ACTUALIZAR - ELIMINAR


Route::group(['middleware' => ['jwt.verify']], function ($router) {
    Route::get('/user', [UserController::class, 'index']); //GET: OBTENER
    Route::get('/product', [ProductsController::class, 'index']); //GET: OBTENER
});

Route::get('/user/{id}', [UserController::class, 'show']); //GET: OBTENER
Route::put('/user/{id}', [UserController::class, 'update']); //PUT: ACTUALIZAR
Route::delete('/user/{id}',[UserController::class, 'delete']); //DELETE: ELIMINAR
Route::post('/user', [UserController::class, 'store']); //POST: CREAR


// PRODUCTOS
// CRUD -> CREAR - LEER - ACTUALIZAR - ELIMINAR

Route::post('/product', [ProductsController::class, 'store']); //POST: CREAR
Route::delete('/product/{id}',[ProductsController::class, 'deleted']); //DELETE: ELIMINAR
Route::get('/product/{id}', [ProductsController::class, 'show']);  //GET: OBTENER
Route::put('/product/{id}', [ProductsController::class, 'update']); //PUT: ACTUALIZAR

// LOGIN
Route::post('/login', [UserController::class, 'authenticate']);

/* LARAVEL
    -> RELACIONES - LIBRERIAS EXTERNAS (HASH OK, JWTOKEN OK Y VALIDATION REQUEST)
*/

// GITHUB Y GIT (GIT FLOW)

/* ANGULAR
    -> MODULOS (standlone y comun)
    -> CONTROLADORES (ngInit, ngAfterViewInit, ngAfterViewChecked)
    -> SERVICIOS (APIS) -> RUTAS (lazyload)
    -> CSS Y SCSS BOOSTRAP
    -> LIBRERIAS EXTERNAS (JWToken, Crypto, Storage, FormModule, Guards, Interceptors)
*/
