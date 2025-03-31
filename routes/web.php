<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios');
Route::post('/usuario/agregar', [App\Http\Controllers\UserController::class, 'store'])->name('agregar.usuario');
Route::post('/usuario/actualizar', [App\Http\Controllers\UserController::class, 'update'])->name('actualizar.usuario');
Route::post('/usuario/borrar', [App\Http\Controllers\UserController::class, 'destroy'])->name('borrar.usuario');

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
Route::post('/role/agregar', [App\Http\Controllers\RoleController::class, 'store'])->name('agregar.role');
Route::post('/role/actualizar', [App\Http\Controllers\RoleController::class, 'update'])->name('actualizar.role');
Route::post('/role/borrar', [App\Http\Controllers\RoleController::class, 'destroy'])->name('borrar.role');
Route::post('/role/permisos', [App\Http\Controllers\RoleController::class, 'permisos'])->name('permisos.role');

Route::get('/permisos', [App\Http\Controllers\PermissionController::class, 'index'])->name('permisos');
Route::post('/permiso/agregar', [App\Http\Controllers\PermissionController::class, 'store'])->name('agregar.permiso');
Route::post('/permiso/actualizar', [App\Http\Controllers\PermissionController::class, 'update'])->name('actualizar.permiso');
Route::post('/permiso/borrar', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('borrar.permiso');

Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos');
Route::post('/producto/agregar', [App\Http\Controllers\ProductoController::class, 'store'])->name('agregar.producto');
Route::post('/producto/actualizar', [App\Http\Controllers\ProductoController::class, 'update'])->name('actualizar.producto');
Route::post('/producto/borrar', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('borrar.producto');
Route::post('/producto/activar', [App\Http\Controllers\ProductoController::class, 'create'])->name('activar.producto');

Route::post('/producto/comprar', [App\Http\Controllers\CompraController::class, 'store'])->name('comprar.producto');
Route::get('/compras', [App\Http\Controllers\CompraController::class, 'index'])->name('compras');

Route::get('/ventas', [App\Http\Controllers\VentaController::class, 'index'])->name('ventas');

Route::post('/producto/vender', [App\Http\Controllers\VentaController::class, 'store'])->name('vender.producto');