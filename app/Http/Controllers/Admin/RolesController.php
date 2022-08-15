<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.show',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255','unique:roles']
            ]);


            $role = Role::create([
                'name' => $request['name']
            ]);

            $permissions = $request['permissions'];

            $role->syncPermissions($permissions);
            $role->save();

            return redirect()->route('list-roles')->with('success', 'Role created succesifully');
        }
            catch(Error $error){
                return redirect()->route('list-roles')->with('fail', $error);
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
        $role = Role::find($id);
        $permissions = Permission::all();


        return view('admin.roles.edit',compact('role','permissions'));
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

        try{
            // $validated = $request->validate([
            //     'name' => ['required', 'string', 'max:255']
            // ]);


            $role = Role::find($id);
            $role->name = $request['name'];
            $permissions = $request['permissions'];

            $role->syncPermissions($permissions);
            $role->save();

            return redirect()->route('list-roles')->with('success', 'Role updated succesifully');
        }
            catch(Error $error){
                return redirect()->route('list-roles')->with('fail', $error);
            }

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
