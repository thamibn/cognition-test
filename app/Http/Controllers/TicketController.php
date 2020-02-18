<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicket;
use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\TicketService;

class TicketController extends Controller
{
    
    private $ticketService;
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = $this->ticketService->all($request);
       //dd($tickets->toArray());
        return view('admin.tickets.tickets', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $ticket_number = strtoupper(Str::random(1)).time();
        return view('admin.tickets.create_ticket', ['ticket_number'=> $ticket_number, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTicket $request)
    {
        
        $ticket = $this->ticketService->create($request);
        $tickets = $this->ticketService->all();
        return view('admin.tickets.tickets', ['tickets' => $tickets]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $t = $this->ticketService->update($request, $id);
        $tickets = $this->ticketService->all();
        return $tickets;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function ticketStatusForm(){
        return view('admin.tickets.ticket_status_form');
    }

    public function status($ticket_number){
        $ticket = Ticket::with(['user','category'])->where('ticket_number', $ticket_number)->first();

        return view('admin.tickets.ticket_details', ['ticket' => $ticket]);
    }
    public function postGetStatus(Request $request){
        $ticket = Ticket::with(['user','category'])->where('ticket_number', $request->ticket_number)->first();
        
        return view('admin.tickets.ticket_details', ['ticket' => $ticket]);
    }
}
