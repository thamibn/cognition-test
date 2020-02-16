<?php 

namespace App\Services;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketService{
    public function all(){
        return TicketResource::collection(Ticket::all());
    }
    public function create(Request $request){
        $ticket = Ticket::create($request);
        return new TicketResource($ticket);
    }
    public function update(Request $request, Ticket $ticket){
        $ticket = new Ticket();
        $ticket->status = $request->status;
        $ticket->save();
        return new TicketResource($ticket);
    }
    public function getTicket(Ticket $ticket){
        $ticket->destroy();
        return Null;
    }
}