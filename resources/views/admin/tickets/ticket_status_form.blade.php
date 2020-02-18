@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Check Ticket Status</div>

                <div class="card-body"> 
                    <form method="POST" action="{{ route('post_ticket_status') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="ticket_number" class="col-md-4 col-form-label text-md-right">Ticket Number</label>
                            <div class="col-md-6">
                            <input id="ticket_number" value="{{ old('ticket_number') }}" type="text" class="form-control @error('ticket_number') is-invalid @enderror" required name="ticket_number" >

                                @error('ticket_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
