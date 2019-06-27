@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center  bg-primary card-title " style="max-width: 45.5rem;margin-left:12rem;">Flights</div> 
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
                <div class="card-header"><span class="font-weight-bold">Flight: </span> {{$flight->source}} - {{$flight->destination}}</div>
                <div class="card-body text-success">
                    
                    <p class="card-text"><span class="font-weight-bold">Depart at: </span>{{ $flight->depart_date_time }}</p>
                    <p class="card-text"><span class="font-weight-bold">Arives at: </span>{{ $flight->arrival_date_time }}</p>
                    <p class="card-text"><span class="font-weight-bold">Plane: </span>{{ $flight->plane_name }}</p>
                
                </div>
                </div>
                
            </div>
            <div class="col-lg-2">
            <a class="btn btn-outline-primary" href="{{ action('FlightController@edit',['id'=> $flight->flight_id]) }}">Edit</a>
            <a class="btn btn-outline-danger" href="{{ action('FlightController@destroy',['id'=> $flight->flight_id]) }}">Delete</a>
            </div>
            @endforeach
        </div>

</div>
@endsection