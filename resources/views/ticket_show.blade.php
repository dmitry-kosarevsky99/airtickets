@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-title text-center bg-primary">{{ trans('trans.flight') }} : {{ $ticket[0]->source }} - {{ $ticket[0]->destination }} details </div>
                    <div class="row">
                        <div class="col-xs-4 ml-4">
                            <p class="card-text text-secondary"> {{ trans('trans.depart') }}: {{ $ticket[0]->depart_date_time }}</p>
                            <p class="card-text text-secondary">{{ trans('trans.arrive') }}: {{ $ticket[0]->arrival_date_time }}</p>
                            @if(  $ticket[0]->depart_date_time == 1)
                            <p class="card-text text-secondary">{{ trans('trans.classEco') }}</p>
                            @else
                            <p class="card-text text-secondary">{{ trans('trans.classBus') }}</p>
                            @endif
                        </div>
                        <div class="col-xs-4 ml-4">
                            <p class="card-text text-secondary"> {{ trans('trans.price') }}: {{ $ticket[0]->price }}</p>
                            <p class="card-text text-secondary"> {{ trans('trans.plane') }}: {{ $ticket[0]->plane_name }}</p>
                            <p class="card-text text-secondary"> {{ trans('trans.availableSeatAm') }}: {{ $availableSeats }}</p>
                            
                        </div>
                        <div class="col-xs-4 ml-4">
                            <p class="card-text text-secondary"> {{ trans('trans.AirpAdr') }}: {{ $ticket[0]->Airport_Address }}</p>
                            <p class="card-text text-secondary"> {{ trans('trans.AirpNam') }}: {{ $ticket[0]->airport_name }}</p>
                            <p class="card-text text-secondary"> {{ trans('trans.desc') }}: {{ $ticket[0]->description }}</p>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <a class="btn btn-primary" href="{{ action('TicketController@createUserTicket') }}">{{ trans('trans.buy') }}</a>
    </div>
</div>

@endsection