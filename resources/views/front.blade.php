@extends('layouts.app')

@section('content')
    <div class="container">

        <section>
            <div>
                <b-jumbotron header="BootstrapVue" lead="Bootstrap v4 Components for Vue.js 2">
                  <p>For more information visit website</p>
                <b-button variant="primary" href="{{ route('ticket_status_form') }}">Check Ticket Status</b-button>
                </b-jumbotron>
              </div>
        </section>

    </div>
@endsection