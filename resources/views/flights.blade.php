@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
        <div class="col-8">
            {!! Form::open(array('url'=>route('search'), 'method' => 'PUT','class'=>'form-inline justify-content-center mb-3' )) !!}
            {!! Form::text('from','',['class'=> 'form-control','placeholder'=>'From']) !!}
            
            {!! Form::text('to','',['class'=> 'form-control','placeholder'=>'To']) !!}
            
            {!! Form::submit('Search', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col">
        </div>
    </div> 
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-7">
            <div class="list-group">
                <div class="list-group-item list-group-item-primary"><h4>{{ trans('trans.flights') }}</h4></div>

                <div class="list-group-item">
                    @foreach ( $flights as $flight )
                    <div class="card">
                        <div class="row">                    
                            <div class="card-body">
                                <div class="col-sm-6">
                                    
                                        <p class="card-title">{{$flight->source}}</p>
                                        <p>{{$flight->destination}}</p>
                                        <p>{{ trans('trans.depart') }}:  {{$flight->depart_date_time}}</p>
                                        <p>{{ trans('trans.arrive') }} {{$flight->arrival_date_time}}</p>
                                        <p>{{ trans('trans.price') }} {{$flight->price}} EUR</p>
                                    
                                </div>    
                                <div class="col-sm-4 float-right">
                                    <a class="btn btn-primary" href="{{ action('TicketController@show', ['id'=>$flight->ticket_id]) }}">{{ trans('trans.more') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection