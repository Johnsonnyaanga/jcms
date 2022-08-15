<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SLA;
use Error;
use Illuminate\Http\Request;

class TicketSlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketSla = SLA::all();
        return view('admin.slas.show',compact('ticketSla'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slas.create');
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
                'name' => ['required', 'string', 'max:255','unique:slas'],
                'grace_period' => ['required', 'string', 'max:255'],
                'valid_id' => ['required', 'integer'],
                'admin_note' => ['max:255', 'nullable']
            ]);


            $sla = SLA::create([
                'name' => $request['name'],
                'grace_period' => $request['grace_period'],
                'valid_id' => $request['valid_id'],
                'admin_note' => $request['admin_note']
            ]);




            $sla->save();

            return redirect()->route('list-sla')->with('success', 'SLA created succesifully');
        }
            catch(Error $error){
                return redirect()->route('list-sla')->with('fail', $error);
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
        $sla = SLA::find($id);
        return view('admin.slas.edit',compact('sla'));
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
                'grace_period' => ['required', 'string', 'max:255'],
                'valid_id' => ['required', 'integer'],
                'admin_note' => ['max:255', 'nullable']
            ]);


            $sla = SLA::find($id);

            $sla->name = $request['name'];
            $sla->grace_period = $request['grace_period'];
            $sla->valid_id = $request['valid_id'];
            $sla->admin_note = $request['admin_note'];




            $sla->save();

            return redirect()->route('list-sla')->with('success', 'SLA updated succesifully');
        }
            catch(Error $error){
                return redirect()->route('list-sla')->with('fail', $error);
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
