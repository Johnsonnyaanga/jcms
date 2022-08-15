<?php

use App\Http\Controllers\Admin\AgentsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\QueuesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\TicketPriorityController;
use App\Http\Controllers\Admin\TicketServicesController;
use App\Http\Controllers\Admin\TicketSlaController;
use App\Http\Controllers\Admin\TicketStatusController;
use App\Http\Controllers\Admin\TicketTypesController;
use App\Http\Controllers\Agent\DashboardController as AgentDashboardController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use Faker\Guesser\Name;
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

Route::group(['middleware' => ['auth']], function(){






    //admin routes
    Route::group(['middleware' => ['role:admin']], function () {

        //create save a new  agent
        Route::post('/admin/agents', [AgentsController::class, 'store'])->name('register-agent');
        //list all agents pages
        Route::get('/admin/agents', [AgentsController::class, 'agents'])->name('list-agents');
        //navigate to the create-agent page
        Route::get('/admin/agents/create', [AgentsController::class, 'create'])->name('create-agent');
        //navigate to edit-agent page
        Route::get('/admin/agents/edit/{id}', [AgentsController::class, 'edit'])->name('edit-agent');
        //update agent details
        Route::post('/admin/agents/{id}', [AgentsController::class, 'update'])->name('update-agent');




        //roles routes
        Route::get('/admin/roles', [RolesController::class, 'index'])->name('list-roles');
        Route::post('/admin/roles', [RolesController::class, 'store'])->name('store-role');
        Route::get('/admin/roles/create', [RolesController::class, 'create'])->name('create-role');
        Route::get('/admin/roles/edit/{id}', [RolesController::class, 'edit'])->name('edit-role');
        Route::post('/admin/roles/{id}', [RolesController::class, 'update'])->name('update-role');


        //queues routes
        Route::get('/admin/queues', [QueuesController::class, 'index'])->name('list-queues');
        Route::get('/admin/queues/create', [QueuesController::class, 'create'])->name('create-queue');
        Route::get('/admin/queues/edit/{id}', [QueuesController::class, 'edit'])->name('edit-queue');
        Route::post('/admin/queues/{id}', [QueuesController::class, 'update'])->name('update-queue');



        //groups routes
        Route::get('/admin/groups', [GroupsController::class, 'index'])->name('list-groups');
        Route::get('/admin/groups/edit/{id}', [GroupsController::class, 'edit'])->name('edit-group');



         //services routes
        Route::get('/admin/services', [TicketServicesController::class, 'index'])->name('list-services');

            //ticket-types routes
        Route::get('/admin/ticket-types', [TicketTypesController::class, 'index'])->name('list-ticket-types');


           //ticket-sla routes
        Route::get('/admin/sla', [TicketSlaController::class, 'index'])->name('list-sla');
        Route::post('/admin/sla', [TicketSlaController::class, 'store'])->name('store-sla');
        Route::get('/admin/sla/create', [TicketSlaController::class, 'create'])->name('create-sla');
        Route::get('/admin/sla/edit/{id}', [TicketSlaController::class, 'edit'])->name('edit-sla');
        Route::post('/admin/sla/{id}', [TicketSlaController::class, 'update'])->name('update-sla');


        //ticket-priorities routes
        Route::get('/admin/priorities', [TicketPriorityController::class, 'index'])->name('list-priorities');


        //ticket-priorities routes
        Route::get('/admin/tickets-status', [TicketStatusController::class, 'index'])->name('list-statuses');


















        Route::get('/admin_dashboard', [DashboardController::class, 'index']);
        //
        Route::get('/admin/dashboard',function(){
            // $role = Auth::user()->hasRole(1);
            // dd($role);
           return view('admin.dashboard');
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

        // Route::get('/services/show', function () {
        //     return view('admin.ticket-services.show');
        // });

        Route::get('/status/show', function () {
            return view('admin.ticket-status.show');
        });



    });



//agent routes
    Route::group(['middleware' => ['role:agent']], function () {

        Route::get('/agent_dashboard', [AgentDashboardController::class, 'index']);

    });

//client routes
Route::group(['middleware' => ['role:client']], function () {

    Route::get('/client_dashboard', [ClientDashboardController::class, 'index']);

});










});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::get('/', function () {
    return view('welcome');
});

