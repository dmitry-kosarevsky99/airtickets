@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <form class="form-inline justify-content-center mb-3">
                <div class="form-group">
                    <label for="from"></label>
                    <input type="search" class="form-control" id="from" placeholder="From">
                </div>
                <div class="form-group">
                    <label for="To"></label>
                    <input type="search" class="form-control" id="To" placeholder="To">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
        <div class="col">
            <div class="form-inline justify-content-center">
                <div class="form-group">
                    <label for="sortBy" class="mr-1">Sort by</label>
                    <select class="form-control" id="sortBy">
                    <option>Price ascending</option>
                    <option>Price descending</option>
                    <option>Date</option>
                    </select>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-2">
            <form role="form">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="checkbox">
                            <input id="checkbox1" class="styled" type="checkbox">
                            <label for="checkbox1">
                                Economy
                            </label>
                        </div>
                        <div class="checkbox">
                            <input id="checkbox1" class="styled" type="checkbox">
                            <label for="checkbox1">
                            Business
                            </label>
                        </div>
                        <div class="checkbox">
                            <input id="checkbox1" class="styled" type="checkbox">
                            <label for="checkbox1">
                            No transfer
                            </label>
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-7">
            <div class="list-group">
                <div class="list-group-item list-group-item-primary"><h4>Flights</h4></div>

                <div class="list-group-item">
                    @foreach ( $flights as $flight )
                    <div class="card">
                        <div class="card-body">
                        <p class="card-text">
                            <p class="card-title">{{$flight->source}}</p>
                            <p>{{$flight->destination}}</p>
                            <p>{{$flight->depart_date_time}}</p>
                            <p>{{$flight->arrival_date_time}}</p>
                            <p>{{$flight->price}} EUR</p>
                        </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection