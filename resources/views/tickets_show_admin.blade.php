@extends('layouts.app')
@section('content')

<div class="container">
<div class="text-center  bg-primary card-title " style="max-width: 45.5rem;margin-left:12rem;">Tickets</div> 
    <div class="row">
    
    @foreach( $tickets as $ticket)
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            
            
            <div class="card border-success mb-3" style="max-width: 50rem;">
            <div class="card-header"><span class="font-weight-bold">ID: </span> {{ $ticket['ticket_id']}} </div>
            <div class="card-body text-success">
                <h5 class="card-title">{{ $ticket['price'] }} EUR</h5>
                @if($ticket['ticket_class'] == 1)
                <p class="card-text"><span class="font-weight-bold">Ticket class :</span>Economy</p>
                @else
                <p class="card-text"><span class="font-weight-bold">Ticket class :</span>Business</p>
                @endif
                <p class="card-text"><span class="font-weight-bold">Price :</span>{{ $ticket['price'] }}</p>
                <p class="card-text"><span class="font-weight-bold">Description </span>{{ $ticket['description'] }}</p>
                <p class="card-text"><span class="font-weight-bold">Flight_id </span>{{ $ticket['flight_id'] }}</p>
            </div>
            </div>
            
        </div>
        <div class="col-lg-2">
        <a class="btn btn-outline-primary" href="{{ action('TicketController@edit',['id'=> $ticket['ticket_id']]) }}">Edit</a>
        <a class="btn btn-outline-danger" href="{{ action('TicketController@destroy',['id' => $ticket['ticket_id']]) }}">Delete</a>
        </div>
        @endforeach
    </div>

</div>

@endsection