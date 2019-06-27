@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8 rounded ">
            <a class="btn btn-primary mb-2" href="{{ url('reviews/create') }}">{{ trans('trans.leaveRev') }}</a>
            @foreach($reviews as $review)
            <div class="card mb-1">
                <div class="card-body">
                    <div class="card-text">
                        <div class="row">
                            <div class="col-md-2">
                                <span>{{ $review->first_name }} </span>
                                <span>{{ $review->last_name }} </span>
                                <span>{{ $review->created_at }} </span>
                            </div>
                            <div class="col-md-8">
                                <span>{{ $review->review_text }} </span>
                            </div>
                            <div class="col-md-2">
                                @guest
                                @else( Auth::user()->id == $review->user_id || Auth::user()->role == 2)
                                <a class="btn btn-small btn-outline-primary" href="{{ URL::to('/reviews/'.$review->review_id.'/edit') }}">{{ trans('trans.edit') }}</a>
                                <a class="btn btn-small btn-outline-primary" href="{{ URL::to('/reviews/destroy/'.$review->review_id) }}">{{ trans('trans.delete') }}</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection