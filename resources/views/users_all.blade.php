@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center  bg-primary card-title " style="max-width: 45.5rem;margin-left:12rem;">Users </div> 
        <div class="row">
        @if(session()->has('message'))
        <div class="alert alert-info">
            {{ session()->get('message') }}
        </div>
        @endif
        @foreach( $users as $user )
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                
                
                <div class="card border-success mb-3" style="max-width: 50rem;">
                <div class="card-header"><span class="font-weight-bold">Flight: </span> {{$user->first_name }} {{ $user->last_name  }} </div>
                <div class="card-body text-success">
                    
                    <p class="card-text"><span class="font-weight-bold">Email {{ $user->email  }} </span></p>
                    @if( $user->banned_until == null  && $user->banned_until < \Carbon\Carbon::now() )
                    <p class="card-text"><span class="font-weight-bold">Active </span></p>
                    @else
                    <p class="card-text"><span class="font-weight-bold">Banned until:</span>{{ $user->banned_until }}</p>
                    @endif
                </div>
                </div>
                
            </div>
            <div class="col-lg-2">
            @if($user->banned_until == null && $user->banned_until < \Carbon\Carbon::now() )
            <a class="btn btn-outline-primary" href="{{ action('AdminController@ban',['id' => $user->id]) }}">Ban</a>
            @else
            {!! Form::open( array('url'=>route('unban',['id' => $user->id]), 'method' => 'PUT'  )) !!}
            {!! csrf_field() !!}
            {{ Form::hidden('user_id', $user->id) }}
            {!! Form::submit('Unban', ['class'=>'btn btn-primary'])!!}
            {!! Form::close() !!}
            @endif
            </div>
            @endforeach
        </div>

</div>
@endsection