@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Tickets</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <b-button variant="primary" href="{{ route('new_ticket') }}">Create Ticket</b-button>
                    <ticket-table :data="{{ $tickets }}"></ticket-table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

