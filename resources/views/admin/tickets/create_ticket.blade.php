@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Support Ticket</div>

                <div class="card-body"> 
                    <form method="POST" action="{{ route('create_ticket') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ticket_number" class="col-md-4 col-form-label text-md-right">Ticket Number</label>
                            <div class="col-md-6">
                            <input id="ticket_number" value="{{ $ticket_number }}" type="text" class="form-control @error('ticket_number') is-invalid @enderror" required name="ticket_number" value="{{ old('ticket_number') }}" disabled>

                                @error('ticket_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Ticket Type</label>
                            <div class="col-md-6">
                                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" required name="category_id">
                                    <option value="" selected>--- select type ---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                    @endforeach
                                    </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="complainant_fullname" class="col-md-4 col-form-label text-md-right">Complainant Full Name</label>

                            <div class="col-md-6">
                                <input id="complainant_fullname" type="text" class="form-control @error('complainant_fullname') is-invalid @enderror" name="complainant_fullname" required>

                                @error('complainant_fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="complainant_email" class="col-md-4 col-form-label text-md-right">Complainant Email</label>

                            <div class="col-md-6">
                                <input id="complainant_email" type="text" class="form-control @error('complainant_email') is-invalid @enderror" name="complainant_email" required>

                                @error('complainant_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="complainant_tel" class="col-md-4 col-form-label text-md-right">Complainant Tel</label>

                            <div class="col-md-6">
                                <input id="complainant_tel" type="text" class="form-control @error('complainant_tel') is-invalid @enderror" name="complainant_tel" required>

                                @error('complainant_tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>

                            <div class="col-md-6">
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" required></textarea>

                                @error('message')
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
