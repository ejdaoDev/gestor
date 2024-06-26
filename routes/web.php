<?php

use Illuminate\Support\Facades\Route;

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

Route::get('RegistrarUsuario',[App\Http\Controllers\Seguridad\RegistrarUsuarioController::class, 'getView']);
Route::get('AgregarPresentacion',[App\Http\Controllers\Seguridad\RegistrarUsuarioController::class, 'getViewAP']);
Route::post('RegistrarUsuario',[App\Http\Controllers\Seguridad\RegistrarUsuarioController::class, 'register']);
Route::post('AgregarPresentacion',[App\Http\Controllers\Seguridad\RegistrarUsuarioController::class, 'addPres']);
Route::get('ModificarUsuario',[App\Http\Controllers\Seguridad\ModificarUsuarioController::class, 'getView']);
Route::get('ModificarUsuario!={id}',[App\Http\Controllers\Seguridad\ModificarUsuarioController::class, 'getViewMU']);
Route::post('ModificarUsuario!={id}',[App\Http\Controllers\Seguridad\ModificarUsuarioController::class, 'ModifyUser']);

Route::get('activateUser/{id}',[App\Http\Controllers\Seguridad\ModificarUsuarioController::class, 'activateUser']);
Route::get('inactivateUser/{id}',[App\Http\Controllers\Seguridad\ModificarUsuarioController::class, 'inactivateUser']);
Route::get('resetPassword/{id}',[App\Http\Controllers\Seguridad\ModificarUsuarioController::class, 'resetPassword']);

Route::get('RegistrarInsumo',[App\Http\Controllers\Insumos\RegistrarInsumoController::class, 'getView']);
Route::post('RegistrarInsumo',[App\Http\Controllers\Insumos\RegistrarInsumoController::class, 'register']);
Route::get('ModificarInsumo',[App\Http\Controllers\Insumos\ModificarInsumoController::class, 'getView']);
Route::post('ModificarInsumo',[App\Http\Controllers\Insumos\ModificarInsumoController::class, 'modify']);
Route::get('AgregarInsumo',[App\Http\Controllers\Insumos\AgregarInsumoController::class, 'getView']);
Route::get('AgregarInsumos',[App\Http\Controllers\Insumos\AgregarInsumosController::class, 'getView']);
Route::get('DeleteInsumo/{id}',[App\Http\Controllers\Insumos\AgregarInsumosController::class, 'deleteOne']);
Route::post('ModifyInsumo/{id}',[App\Http\Controllers\Insumos\AgregarInsumosController::class, 'ModifyOne']);
Route::get('DeleteInsumos',[App\Http\Controllers\Insumos\AgregarInsumosController::class, 'deleteAll']);
Route::post('AgregarInsumos',[App\Http\Controllers\Insumos\AgregarInsumosController::class, 'addAll']);
Route::post('AgregarInsumo',[App\Http\Controllers\Insumos\AgregarInsumoController::class, 'addOne']);

Route::get('RegistrarProducto',[App\Http\Controllers\Productos\RegistrarProductoController::class, 'getView']);
Route::post('RegistrarProducto',[App\Http\Controllers\Productos\RegistrarProductoController::class, 'register']);
Route::get('ModificarProducto',[App\Http\Controllers\Productos\ModificarProductoController::class, 'getView']);
Route::post('ModificarProducto',[App\Http\Controllers\Productos\ModificarProductoController::class, 'modify']);
Route::get('ConsumirInsumo',[App\Http\Controllers\Insumos\ConsumirInsumoController::class, 'getView']);
Route::post('ConsumirInsumo',[App\Http\Controllers\Insumos\ConsumirInsumoController::class, 'consume']);
Route::get('AgregarProducto',[App\Http\Controllers\Productos\AgregarProductoController::class, 'getView']);
Route::get('AgregarProductos',[App\Http\Controllers\Productos\AgregarProductosController::class, 'getView']);
Route::post('AgregarProducto',[App\Http\Controllers\Productos\AgregarProductoController::class, 'addOne']);

Route::get('DeleteProducto2/{id}',[App\Http\Controllers\Productos\AgregarProductosController::class, 'deleteOne']);
Route::post('ModifyProducto2/{id}',[App\Http\Controllers\Productos\AgregarProductosController::class, 'ModifyOne']);
Route::get('DeleteProductos2',[App\Http\Controllers\Productos\AgregarProductosController::class, 'deleteAll']);
Route::post('AgregarProductos',[App\Http\Controllers\Productos\AgregarProductosController::class, 'addAll']);
    

Route::get('VenderProducto',[App\Http\Controllers\Ventas\VenderProductoController::class, 'getView']);
Route::get('VenderProductos',[App\Http\Controllers\Ventas\VenderProductosController::class, 'getView']);
Route::post('VenderProducto',[App\Http\Controllers\Ventas\VenderProductoController::class, 'addToList']);
Route::post('VenderProductos',[App\Http\Controllers\Ventas\VenderProductoController::class, 'SellProducts']);
Route::post('ModifyProducto/{id}',[App\Http\Controllers\Ventas\VenderProductosController::class, 'modifyOne']);
Route::get('DeleteProducto/{id}',[App\Http\Controllers\Ventas\VenderProductosController::class, 'deleteOne']);
Route::get('DeleteProductos',[App\Http\Controllers\Ventas\VenderProductosController::class, 'deleteAll']);

Route::get('RestablecerPassword',[App\Http\Controllers\Seguridad\RecuperarPasswordController::class, 'getView']);
Route::post('RestablecerPassword',[App\Http\Controllers\Seguridad\RecuperarPasswordController::class, 'resetPass']);

Route::get('ListaIngresosInsumos',[App\Http\Controllers\Contabilidad\InsumosController::class, 'showListaIngresosInsumos']);
Route::get('ListaIngresosInsumos!={id}',[App\Http\Controllers\Contabilidad\InsumosController::class, 'showListaIngresosInsumosDetails']);
Route::get('ListaConsumoInsumos',[App\Http\Controllers\Contabilidad\InsumosController::class, 'showListaConsumoInsumos']);

Route::get('ListaIngresoProductos',[App\Http\Controllers\Contabilidad\ProductosController::class, 'showListaIngresoProductos']);
Route::get('ListaVentaProductos',[App\Http\Controllers\Contabilidad\ProductosController::class, 'showListaVentaProductos']);
Route::get('ListaVentaProductos!={id}',[App\Http\Controllers\Contabilidad\ProductosController::class, 'showListaVentaProductosDetails']);

Route::get('login',[App\Http\Controllers\Autentication\LoginController::class, 'getView']);
Route::post('login',[App\Http\Controllers\Autentication\LoginController::class, 'login']);
Route::post('logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);

//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {return redirect('login');});
