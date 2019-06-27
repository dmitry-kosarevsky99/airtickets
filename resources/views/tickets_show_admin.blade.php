@extends('layouts.app')
@section('content')

<div class="container">
<div class="text-center  bg-primary card-title " style="max-width: 45.5rem;margin-left:12rem;">{{ trans('trans.tickets') }}</div> 
    <div class="row">
    @if(session()->has('message'))
    <div class="alert alert-info">
        {{ session()->get('message') }}
    </div>
    @endif
    @foreach( $tickets as $ticket)
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            
            
            <div class="card border-success mb-3" style="max-width: 50rem;">
            <div class="card-header"><span class="font-weight-bold">ID: </span> {{ $ticket['ticket_id']}} </div>
            <div class="card-body text-success">
                <h5 class="card-title">{{ $ticket['price'] }} EUR</h5>
                @if($ticket['ticket_class'] == 1)
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.class') }} :</span>{{ trans('trans.classEco') }}</p>
                @else
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.class') }} :</span>{{ trans('trans.classBus') }}</p>
                @endif
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.price') }} :</span>{{ $ticket['price'] }}</p>
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.desc') }} </span>{{ $ticket['description'] }}</p>
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.flightID') }} </span>{{ $ticket['flight_id'] }}</p>
            </div>
            </div>
            
        </div>
        <div class="col-lg-2">
        <a class="btn btn-outline-primary" href="{{ action('TicketController@edit',['id'=> $ticket['ticket_id']]) }}">{{ trans('trans.edit') }}</a>
        <a class="btn btn-outline-danger" href="{{ action('TicketController@destroy',['id' => $ticket['ticket_id']]) }}">{{ trans('trans.delete') }}</a>
        </div>
        @endforeach
    </div>

</div>

@endsection