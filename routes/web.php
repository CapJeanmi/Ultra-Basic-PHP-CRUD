<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BillsComponent;
use App\Http\Livewire\BillDetailComponent;
use App\Http\Livewire\ProductFormComponent;
use App\Http\Livewire\ProductsComponent;
use App\Http\Livewire\PurchaseComponent;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
->group(function () {

    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    Route::get('/purchase', PurchaseComponent::class)->name('purchase');
    Route::get('/bills', BillsComponent::class)->name('bills');
    Route::get('/bills/{id}', BillDetailComponent::class)->name('bill_id');
    Route::get('/products', ProductsComponent::class)->name('products');
    Route::get('/products/{id?}', ProductFormComponent::class)->name('product_form');

});
