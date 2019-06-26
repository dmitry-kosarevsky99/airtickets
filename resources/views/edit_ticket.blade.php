@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    {!! Form::open(array('url'=>route('updateTicket',['id' => $ticket[0]->ticket_id]), 'method' => 'PUT' ))!!}
    <div class = "ml-4">
    {!! Form::label('source_airport','Select source airport') !!}
    {!! Form::select('source_airport',[null => 'Source airport'] + $airport, ['class' => 'form-control ml-6']) !!}
        @if( $errors->get('source_airport') )
            <div class="alert alert danger">
                    <ol>
                    @foreach($errors->get('source_airport') as $message)
                    <li>{{ $message }} </li>
                    @endforeach
                    </ol>
            </div>
        @endif
    </div>
    <div class = "ml-4">
    {!! Form::label('destination_airport','Select destination airport') !!}
    {!! Form::select('destination_airport',[null => ' Destination airport'] + $airport, ['class' => 'form-control ml-6']) !!}
        @if( $errors->get('destination_airport') )
            <div class="alert alert danger">
                    <ol>
                    @foreach($errors->get('destination_airport') as $message)
                    <li>{{ $message }} </li>
                    @endforeach
                    </ol>
            </div>
        @endif
    </div>
    <div class = "ml-4">
    {!! Form::label('ticket_class','Ticket class') !!}
    {!! Form::text('ticket_class','', ['class' => 'form-control ml-6 '] ) !!}
        @if( $errors->get('ticket_class') )
            <div class="alert alert danger">
                    <ol>
                    @foreach($errors->get('ticket_class') as $message)
                    <li>{{ $message }} </li>
                    @endforeach
                    </ol>
            </div>
        @endif
    </div>
    <div class = "ml-4">
    {!! Form::label('price','Ticket price') !!}
    {!! Form::text('price','', ['class' => 'form-control ml-6 '] ) !!}
        @if( $errors->get('price') )
            <div class="alert alert danger">
                    <ol>
                    @foreach($errors->get('price') as $message)
                    <li>{{ $message }} </li>
                    @endforeach
                    </ol>
            </div>
        @endif
    </div>
    <div class = "ml-4">
    {!! Form::label('desc','Ticket description') !!}
    {!! Form::text('desc','', ['class' => 'form-control ml-6 '] ) !!}
        @if( $errors->get('desc') )
            <div class="alert alert danger">
                    <ol>
                    @foreach($errors->get('desc') as $message)
                    <li>{{ $message }} </li>
                    @endforeach
                    </ol>
            </div>
        @endif
    </div>
   
    {!! Form::submit('Apply changes',['class'=>'btn btn-primary mt-4']) !!}
    {!! Form::close() !!}
    </div>
    <div class="col-md-4"></div>
</div>
</div>
@endsection