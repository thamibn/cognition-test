@extends('layouts.app')

@section('content')
    <div class="container">

        <section>
            <div>
            <b-jumbotron lead="Ticket: {{ $ticket->ticket_number }}">
            <p>Current Status: <b>{{ ucwords($ticket->status) }}</b></p>
            <p>Support Staff: <b>{{ $ticket->user->name }} {{ $ticket->user->surname}}</b></p>
            <p>Created Date: {{ $ticket->created_at }}</p>
            <p>Update Date: {{ $ticket->updated_at }}</p>
            </b-jumbotron>
            </div>
        </section>

    </div>
@endsection