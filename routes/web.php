<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

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
route::get('/mostrarProducto',[ProductoController::class,'index'])->name('producto.index');
route::post('/productostore',[ProductoController::class,'store'])->name('producto.store');
route::delete('/productodelete/{producto}',[ProductoController::class,'destroy'])->name('producto.delete');
route::get('/ventaProductos/{producto}',[ProductoController::class,'venta'])->name('producto.venta');
Route::post('/productos/{producto}/venta', [ProductoController::class,'realizarVenta'])->name('productos.realizarVenta');
Route::middleware(['web'])->group(function () {
    // tus rutas aquí
    route::get('/ventaProductos/{producto}',[ProductoController::class,'venta'])->name('producto.venta');
Route::post('/productos/{producto}/venta', [ProductoController::class,'realizarVenta'])->name('productos.realizarVenta');
});
Route::get('/total-ventas-por-fecha', [ProductoController::class,'VentasPorFecha'])->name('final');

