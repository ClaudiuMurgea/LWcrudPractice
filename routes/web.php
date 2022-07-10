<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Livewire\CrudIndex;

/*f
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

// Controllers
Route::get('/crud',                 [CrudController::class, 'index']);

Route::get('/crud-create',          [CrudController::class, 'create']);
Route::post('/create',              [CrudController::class, 'store']);

Route::get('/crud-edit/{user}',     [CrudController::class, 'edit']);
Route::post('update/{id}',          [CrudController::class, 'update']);

Route::get('crud-delete/{user}',   [CrudController::class, 'delete']);

// Livewire
Route::get('/lw' ,  CrudIndex::class);