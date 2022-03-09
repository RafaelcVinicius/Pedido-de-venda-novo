<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DomPedfController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('home')->group(function () {

    Route::resource('/produtos', ProdutoController::class);    
    Route::resource('/clientes', ClienteController::class);

    route::prefix('pedido')->group(function (){

        route::get('/', [PedidoController::class, 'index'])->name('pedido.index');

        route::get('/cadastro', [PedidoController::class, 'cadastro'])->name('pedido.cadastro');

        route::get('/cadastro/{id}', [PedidoController::class, 'editarpedido'])->name('pedido.editarpedido');

        route::post('/consultacliente', [PedidoController::class, 'consultacliente'])->name('pedido.consultacliente');

        route::post('/consultaproduto', [PedidoController::class, 'consultaproduto'])->name('pedido.consultaproduto');

        route::post('/gravar', [PedidoController::class, 'gravar'])->name('pedido.gravar');

        route::post('/gravarproduto', [PedidoController::class, 'gravarpedidoproduto'])->name('pedido.gravarproduto');

        route::post('/editarproduto', [PedidoController::class, 'editarproduto'])->name('pedido.editarproduto');

        route::post('/deleteproduto', [PedidoController::class, 'deleteproduto'])->name('pedido.deleteproduto');
        
        route::post('/gravarcliente', [PedidoController::class, 'gravarpedidocliente'])->name('pedido.gravarcliente');

        route::post('/gravarclientealterar', [PedidoController::class, 'gravarpedidoclientealterar'])->name('pedido.gravarclientealterar');

        route::get('pdf/{id}', [DomPedfController::class, 'imprimirpdf'])->name('imprimirpdf');

    });
    route::get('pdf', [DomPedfController::class, 'pdfteste'])->name('pdf');
});