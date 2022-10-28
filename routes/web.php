<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendedorController;
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

// Admin Routes

Route::controller(AdminController::class)->prefix('admin')->group(function(){
    Route::get('/login','index')->name('admin.login_form');
    Route::post('/login','store')->name('admin.login');
    Route::get('/logout','destroy')->name('admin.logout');
    Route::get('/dashboard','dashboard')->name('admin.dashboard')->middleware('admin');
    Route::get('/vendedor/create','vendedorCreate')->name('vendedor.create')->middleware('admin');
    Route::post('/vendedor/register','vendedorRegister')->name('vendedor.register')->middleware('admin');
});

// End Admin Routes



// Vendedor Routes

Route::controller(VendedorController::class)->prefix('vendedor')->group(function(){
    Route::get('/login','index')->name('vendedor.login_form');
    Route::post('/login','store')->name('vendedor.login');
    // Route::get('/logout','destroy')->name('admin.logout');
    Route::get('/dashboard','dashboard')->name('vendedor.dashboard')->middleware('vendedor');
});

// End Vendedor Routes


// Fornecedores Route

Route::controller(FornecedorController::class)->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/fornecedores','index')->name('fornecedores.show');
    Route::post('/fornecedor','store')->name('fornecedor.store');
    Route::get('/fornecedor/{id}','edit')->name('fornecedor.edit');
    Route::post('/fornecedor/{id}','update')->name('fornecedor.update');
});

// Produtos Route

Route::controller(ProdutoController::class)->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/produto/create','create')->name('produto.create');
    Route::get('/produtos','index')->name('produtos.index');
    Route::get('/produto/{id}','edit')->name('produto.edit');
    Route::get('/produto/delete/{id}','destroy')->name('produto.destroy');
    Route::post('/produto/{id}','update')->name('produto.update');
    Route::post('/produto','store')->name('produto.store');
});


// Clientes Route

Route::controller(ClienteController::class)->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/cliente/create','create')->name('cliente.create');
    Route::get('/clientes','index')->name('clientes.show');
    Route::get('/cliente/{id}','edit')->name('cliente.edit');
    Route::get('/cliente/delete/{id}','destroy')->name('cliente.destroy');
    Route::post('/cliente/{id}','update')->name('cliente.update');
    Route::post('/cliente','store')->name('cliente.store');
});


// Items Route

Route::controller(ItemController::class)->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/itens/create','create')->name('item.create');
    // Route::get('/clientes','index')->name('clientes.show');
    // Route::get('/cliente/{id}','edit')->name('cliente.edit');
    // Route::get('/cliente/delete/{id}','destroy')->name('cliente.destroy');
    // Route::post('/cliente/{id}','update')->name('cliente.update');
    // Route::post('/cliente','store')->name('cliente.store');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
