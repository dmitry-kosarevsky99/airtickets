@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="text-center mb-6 bg-primary card-title">{{ trans('trans.purchHis') }}</div> 
            @foreach( $info as $ticket)
            <div class="card border-success mb-3" style="max-width: 50rem;">
            <div class="card-header">{{ trans('trans.flight') }}: {{ $ticket->source }} - {{ $ticket->destination }}</div>
            <div class="card-body text-success">
                <h5 class="card-title">{{ $ticket->price }} EUR</h5>
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.depart') }} :</span>{{ $ticket->depart_date_time }}</p>
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.arrive') }} :</span>{{ $ticket->arrival_date_time }}</p>
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.plane') }}: </span>{{ $ticket->plane_name }}</p>
                <p class="card-text"><span class="font-weight-bold">Your cell: </span>{{ $ticket->ticket_cell }}</p>
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.AirpNam') }}: </span>{{ $ticket->airport_name }}</p>
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.AirAdr') }}: </span>{{ $ticket->Airport_Address }}</p>
                <p class="card-text"><span class="font-weight-bold">{{ trans('trans.desc') }} : </span>{{ $ticket->description }}</p>
            </div>
            </div>
            @endforeach
        </div>
        <div class="col-lg-2"></div>
    </div>

</div>
@endsection