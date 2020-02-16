<?php 

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TicketResource;
use Stevebauman\Location\Facades\Location;

class TicketService{
    public function all(){
        return Ticket::with(['user','category'])->orderBy('created_at', 'desc')->get();
    }
    
    public function create(Request $request){
        $user = Auth::user();
        $ip_address = $request->getClientIp();
        $position = Location::get('41.144.88.99');
        
        $ticket = new Ticket();
        $ticket->ticket_number = $request->ticket_number;
        $ticket->complainant_fullname = $request->complainant_fullname;
        $ticket->complainant_email = $request->complainant_email;
        $ticket->complainant_tel = $request->complainant_tel;
        $ticket->message = $request->message;
        $ticket->user_id = $user->id;
        $ticket->category_id = $request->category_id;
        $ticket->captured_location = $position;
        $ticket->status = "lodged";
        $ticket->save();
        
       return $ticket;
    }
    public function update(Request $request, Ticket $ticket){
        $ticket = new Ticket();
        $ticket->status = $request->status;
        $ticket->save();
        return $ticket;
    }
    public function getTicket(Ticket $ticket){
        $ticket->destroy();
        return Null;
    }
}