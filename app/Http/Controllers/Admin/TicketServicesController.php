<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\TicketType;
use Error;
use Illuminate\Http\Request;

class TicketServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.ticket-services.show',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $service = Service::find($id);
        $ticketTypes = TicketType::all();
        return view('admin.ticket-services.edit',compact('service','ticketTypes'));
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
                'comment'=> ['required', 'string', 'max:255'],
                'valid_id' => ['required', 'integer'],
                'ticket-type' => ['required', 'integer']
            ]);


            $ticketService = Service::find($id);
            $ticketService->name = $request['name'];
            $ticketService->type_id = $request['ticket-type'];
            $ticketService->comments = $request['comment'];
            $ticketService->valid_id = $request['valid_id'];





            $ticketService->save();

            return redirect()->route('list-services')->with('success', 'Ticket Service updated succesifully');
        }
            catch(Error $error){
                return redirect()->route('list-services')->with('fail', $error);
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
