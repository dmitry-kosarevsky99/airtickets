@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8 rounded ">
            <p class="text-light bg-info text-center">Here you can leave a review about us</p>
                <div class="form-group">
                    
                    {!! Form::open(array('url'=>route('reviews.update',['id' => $review[0]->review_id]), 'method' => 'PUT' )) !!}
                    <div class="row">
                    {!! Form::label('review_text','Review') !!}
                    </div>
                    {!! Form::textarea('review_text',old('review_text') ? old('review_text'): (!empty($review[0]->review_id) ? $review[0]->review_text : null),['class'=>'form-control'.($errors->has('review_text')? 'is-invalid':'')]) !!}
                    @if ($errors->has('review_text'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('review_text') }}</strong>
                        </span>
                    @endif
                    <div class="row">
                    {!! Form::submit('Apply changes', ['class'=>'btn btn-primary mt-2'])!!}
                    </div>
                    {!! Form::close() !!}
                </div>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection