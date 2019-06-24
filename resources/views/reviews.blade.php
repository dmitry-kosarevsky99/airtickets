@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8 rounded ">
            <a href="{{ url('reviews/create') }}">Leave Your review</a>
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