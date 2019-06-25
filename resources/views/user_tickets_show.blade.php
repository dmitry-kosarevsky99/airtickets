@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="text-center mb-6 bg-primary card-title">Your purchase history</div> 
            @foreach( $info as $ticket)
            <div class="card border-success mb-3" style="max-width: 50rem;">
            <div class="card-header">Flight: {{ $ticket->source }} - {{ $ticket->destination }}</div>
            <div class="card-body text-success">
                <h5 class="card-title">{{ $ticket->price }} EUR</h5>
                <p class="card-text"><span class="font-weight-bold">Depated at :</span>{{ $ticket->depart_date_time }}</p>
                <p class="card-text"><span class="font-weight-bold">Arrived at :</span>{{ $ticket->arrival_date_time }}</p>
                <p class="card-text"><span class="font-weight-bold">Plane name: </span>{{ $ticket->plane_name }}</p>
                <p class="card-text"><span class="font-weight-bold">Your cell: </span>{{ $ticket->ticket_cell }}</p>
                <p class="card-text"><span class="font-weight-bold">Airport Name: </span>{{ $ticket->airport_name }}</p>
                <p class="card-text"><span class="font-weight-bold">Airport address: </span>{{ $ticket->Airport_Address }}</p>
                <p class="card-text"><span class="font-weight-bold">Description : </span>{{ $ticket->description }}</p>
            </div>
            </div>
            @endforeach
        </div>
        <div class="col-lg-2"></div>
    </div>

</div>
@endsection