<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketType;
use Error;
use Illuminate\Http\Request;

class TicketTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketTypes = TicketType::all();
        return view('admin.ticket-types.show',compact('ticketTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $ticketType = TicketType::find($id);
        return view('admin.ticket-types.edit', compact('ticketType'));
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
                'valid_id' => ['required', 'integer']
            ]);


            $ticketType = TicketType::find($id);
            $ticketType->name = $request['name'];
            $ticketType->valid_id = $request['valid_id'];





            $ticketType->save();

            return redirect()->route('list-ticket-types')->with('success', 'Ticket Type updated succesifully');
        }
            catch(Error $error){
                return redirect()->route('list-ticket-types')->with('fail', $error);
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
