<?php 

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TicketLodgedNotification;

class TicketService{
    public function all($request){
        //the below code was supposed to be used for filtering data failed because of time constraints
        $searchParams = $request->all();
        $userQuery = Ticket::query();
        $limit = Arr::get($searchParams, 'limit', 10);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $userQuery->where('ticket_number', 'LIKE', '%' . $keyword . '%');
            $userQuery->where('message', 'LIKE', '%' . $keyword . '%');
            $userQuery->where('complainant_fullname', 'LIKE', '%' . $keyword . '%');
            $userQuery->where('complainant_email', 'LIKE', '%' . $keyword . '%');
            $userQuery->where('complainant_tel', 'LIKE', '%' . $keyword . '%');
            $userQuery->where('complainant_tel', 'LIKE', '%' . $keyword . '%');
        }

        return Ticket::with(['user','category'])->orderBy('created_at', 'desc')->get();
        // return $userQuery->with(['user', 'category'])->orderBy("created_at", "desc")->paginate($limit);
    }
    
    // create ticket 
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
        $ticket->status = "Newly logged";
        $ticket->save();

        Notification::route('mail', $ticket->complainant_email)->notify(new TicketLodgedNotification($ticket));
       return $ticket;
    }
    // update status
    public function update(Request $request, $id){
       Ticket::where('id', $id)->update($request->all());
        return Ticket::findOrFail($id);
    }
    // destroy ticket if needed as functionality
    public function getTicket(Ticket $ticket){
        $ticket->destroy();
        return Null;
    }
}