<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\User;
use App\Notifications\AgentCreatedNotification;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role as ModelsRole;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $queues = Queue::all();
        $roles = ModelsRole::all();
        return view('admin.users.create',['queues'=>$queues, 'roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function agents(){
        // $agents = User::whereHas("roles", function($q){
        //      $q->where("name", ["agent"]);
        //      })->get();


        $agentsAndAdmins = ModelsRole::findByName('agent');
        $agents = $agentsAndAdmins->users;
        // ->where('is_active', '=', 0)
        // ->where('firstname', '=', "Johnson");




        return view('admin.users.show', ['agents' => $agents]);
    }

    public function store(Request $request)
    {

try{
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonenumber' => ['required', 'numeric','digits:10', 'unique:users'],
        ]);


        $user = User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'username' => $request['username'],
            'email' => $request['email'],
            'phonenumber' => $request['phonenumber'],
            'is_active' => $request['is_active'],
            'password' => Hash::make('password')
            // 'password' => Hash::make($request['password']),

        ]);

        $user->queues_id = $request['queue'];
        $user->syncRoles($request->input('role'));
        $user->save();


        Notification::send($user, new AgentCreatedNotification());

        return redirect()->route('list-agents')->with('success', 'Agent created succesifully');
    }
        catch(Error $error){
            return redirect()->route('list-agents')->with('fail', $error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
