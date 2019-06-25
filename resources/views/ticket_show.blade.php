@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-title text-center bg-primary">Flight : {{ $ticket[0]->source }} - {{ $ticket[0]->destination }} details </div>
                    <div class="row">
                        <div class="col-xs-4 ml-4">
                            <p class="card-text text-secondary"> Depart at: {{ $ticket[0]->depart_date_time }}</p>
                            <p class="card-text text-secondary">Arrives at: {{ $ticket[0]->arrival_date_time }}</p>
                            @if(  $ticket[0]->depart_date_time == 1)
                            <p class="card-text text-secondary">Class: Economy</p>
                            @else
                            <p class="card-text text-secondary">Class: Business</p>
                            @endif
                        </div>
                        <div class="col-xs-4 ml-4">
                            <p class="card-text text-secondary"> Price: {{ $ticket[0]->price }}</p>
                            <p class="card-text text-secondary"> Plane name: {{ $ticket[0]->plane_name }}</p>
                            <p class="card-text text-secondary"> Available seat amount: {{ $availableSeats }}</p>
                            
                        </div>
                        <div class="col-xs-4 ml-4">
                            <p class="card-text text-secondary"> Airport address: {{ $ticket[0]->Airport_Address }}</p>
                            <p class="card-text text-secondary"> Airport name: {{ $ticket[0]->airport_name }}</p>
                            <p class="card-text text-secondary"> Description: {{ $ticket[0]->description }}</p>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <a class="btn btn-primary" href="{{ action('TicketController@createUserTicket') }}">Buy</a>
    </div>
</div>

@endsection