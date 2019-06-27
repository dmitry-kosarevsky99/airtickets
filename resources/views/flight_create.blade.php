@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        {!! Form::open(array( 'action' => 'FlightController@store')) !!}
        {!! csrf_field() !!}
        <div class = "ml-4 mt-4">
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
        <div class = "ml-4 mt-4">
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
        <div class = "ml-4 mt-4">
        {!! Form::label('plane_name','Select flight plane') !!}
        {!! Form::select('plane_name',[null => 'Plane'] + $plane, ['class' => 'form-control ml-6']) !!}
            @if( $errors->get('plane_name') )
                <div class="alert alert danger">
                        <ol>
                        @foreach($errors->get('plane_name') as $message)
                        <li>{{ $message }} </li>
                        @endforeach
                        </ol>
                </div>
            @endif
        </div>
        <div class = "ml-4 mt-4">
        {!! Form::label('depart_date_time','Depart date and time') !!}
          {!! Form::text('depart_date_time',null, [
            'class' => 'form-control ',
            'placeholder'    => 'yyyy-mm-dd hh:mm:ss '
          ]) !!}
          @if( $errors->get('depart_date_time') )
                <div class="alert alert danger">
                        <ol>
                        @foreach($errors->get('depart_date_time') as $message)
                        <li>{{ $message }} </li>
                        @endforeach
                        </ol>
                </div>
            @endif
        </div>
        <div class = "ml-4 mt-4">
        {!! Form::label('arrival_date_time','Arrival date and time') !!}
          {!! Form::text('arrival_date_time',null, [
            'class' => 'form-control ',
            'placeholder'    => 'yyyy-mm-dd hh:mm:ss '
          ]) !!}
          @if( $errors->get('arrival_date_time') )
                <div class="alert alert danger">
                        <ol>
                        @foreach($errors->get('arrival_date_time') as $message)
                        <li>{{ $message }} </li>
                        @endforeach
                        </ol>
                </div>
            @endif
        </div>  
        {!! Form::submit('Apply changes',['class'=>'btn btn-primary mt-4']) !!}
        {!! Form::close() !!}
        </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection