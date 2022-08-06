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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/show', function () {
    return view('admin.users.show');
});

Route::get('/users/edit', function () {
    return view('admin.users.edit');
});

Route::get('/users/create', function () {
    return view('admin.users.create');
});

Route::get('/roles/create', function () {
    return view('admin.roles.create');
});

Route::get('/roles/edit', function () {
    return view('admin.roles.create');
});

Route::get('/roles/show', function () {
    return view('admin.roles.show');
});

Route::get('/sla/show', function () {
    return view('admin.slas.show');
});

Route::get('/sla/create', function () {
    return view('admin.slas.create');
});
Route::get('/sla/edit', function () {
    return view('admin.slas.edit');
});

Route::get('/priority/edit', function () {
    return view('admin.priorities.edit');
});

Route::get('/priority/show', function () {
    return view('admin.priorities.show');
});

Route::get('/services/create', function () {
    return view('admin.ticket-services.create');
});

Route::get('/services/edit', function () {
    return view('admin.ticket-services.edit');
});

Route::get('/services/show', function () {
    return view('admin.ticket-services.show');
});

Route::get('/status/show', function () {
    return view('admin.ticket-status.show');
});

Route::get('/types/show', function () {
    return view('admin.ticket-types.show');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
