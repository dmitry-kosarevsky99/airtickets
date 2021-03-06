@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        {!! Form::open(array( 'url' => route('storeBan', ['id' => $user[0]->id ]),'method' =>'PUT'  )) !!}
        {!! csrf_field() !!}
        <div class = "ml-4 mt-4">
        {!! Form::label('banned_until', trans('trans.attributes.banUNTIL')) !!}
          {!! Form::text('banned_until',null, [
            'class' => 'form-control ',
            'placeholder'    => 'yyyy-mm-dd hh:mm:ss '
          ]) !!}
          @if( $errors->get('banned_until') )
                <div class="alert alert danger">
                        <ol>
                        @foreach($errors->get('banned_until') as $message)
                        <li>{{ $message }} </li>
                        @endforeach
                        </ol>
                </div>
            @endif
        </div>
        {!! Form::submit( 'Ban',['class'=>'btn btn-primary mt-4']) !!}
        {!! Form::close() !!}
        </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection