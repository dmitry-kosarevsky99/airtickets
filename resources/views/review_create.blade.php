@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8 rounded ">
            <p class="text-light bg-info text-center">Here you can leave a review about us</p>
                <div class="form-group">
                    
                    {!! Form::open(['action'=> 'ReviewController@store']) !!}
                    <div class="row">
                    {!! Form::label('review_text','Review') !!}
                    </div>
                    {!! Form::textarea('review_text','',['class'=>'form-control']) !!}
                    @if( $errors->get('review_text') )
                    <div class="alert alert danger">
                         <ol>
                         @foreach($errors->get('review_text') as $message)
                            <li>{{ $message }} </li>
                         @endforeach
                         </ol>
                    </div>
                @endif
                    <div class="row">
                    {!! Form::submit('Publish', ['class'=>'btn btn-primary mt-2'])!!}
                    </div>
                    {!! Form::close() !!}
                </div>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection