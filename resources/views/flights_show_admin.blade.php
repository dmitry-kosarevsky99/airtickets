@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center  bg-primary card-title " style="max-width: 45.5rem;margin-left:12rem;">{{ trans('trans.flights') }}</div> 
        <div class="row">
        @if(session()->has('message'))
        <div class="alert alert-info">
            {{ session()->get('message') }}
        </div>
        @endif
        @foreach( $flights as $flight )
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                
                
                <div class="card border-success mb-3" style="max-width: 50rem;">
                <div class="card-header"><span class="font-weight-bold">{{ trans('trans.flight') }}: </span> {{$flight->source}} - {{$flight->destination}}</div>
                <div class="card-body text-success">
                    
                    <p class="card-text"><span class="font-weight-bold">{{ trans('trans.depart') }}: </span>{{ $flight->depart_date_time }}</p>
                    <p class="card-text"><span class="font-weight-bold">{{ trans('trans.arrive') }}: </span>{{ $flight->arrival_date_time }}</p>
                    <p class="card-text"><span class="font-weight-bold">{{ trans('trans.plane') }}: </span>{{ $flight->plane_name }}</p>
                
                </div>
                </div>
                
            </div>
            <div class="col-lg-2">
            <a class="btn btn-outline-primary" href="{{ action('FlightController@edit',['id'=> $flight->flight_id]) }}">{{ trans('trans.edit') }}</a>
            <a class="btn btn-outline-danger" href="{{ action('FlightController@destroy',['id'=> $flight->flight_id]) }}">{{ trans('trans.delete') }}</a>
            </div>
            @endforeach
        </div>

</div>
@endsection