<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Queue;
use Error;
use Illuminate\Http\Request;

class QueuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queues = Queue::all();
        return view('admin.queues.show',compact('queues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.queues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
       $queue = Queue::find($id);
       $groups = Group::all();
       return view('admin.queues.edit',compact('queue','groups'));
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
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'group' => ['required'],
                'valid_id' => ['required']
            ]);


            $queue = Queue::find($id);

            $queue->name = $request['name'];
            $queue->groups_id = $request['group'];
            $queue->valid_id = $request['valid_id'];





            $queue->save();

            return redirect()->route('list-queues')->with('success', 'Queue updated succesifully');
        }
            catch(Error $error){
                return redirect()->route('list-queues')->with('fail', $error);
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
