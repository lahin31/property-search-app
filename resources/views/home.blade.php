@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="panel panel-info">
    <div class="panel-heading">
        {{ Session::get('success') }}
    </div>
    </div>
    @endif
    @if(Session::has('message'))
    <div class="panel panel-success">
    <div class="panel-heading">
        {{ Session::get('message') }}
    </div>
    </div>
    @endif
    @if(Session::has('message2'))
    <div class="panel panel-danger">
    <div class="panel-heading">
        {{ Session::get('message2') }}
    </div>
    </div>
    @endif

    <h2 style="font-family: Helvetica; text-align: center;"><b>Find your next home to buy or rent in the Sylhet</b></h2>
    @include('add-house-form')
    <hr>
    <div class="row">
        @foreach($houses as $house)
            <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="panel panel-default" id="intention">
                            <div class="panel-body" id="int-body">
                                <p>Latest</p>
                                <h4>Property for {{ $house->houseFor }}</h4>
                            </div>
                        </div>
                        <img src="/uploads/images/{{$house->houseImage}}" width="280px" height="150px" class="responsive"  alt="">
                        <div class="caption">
                            <h4>
                            {{ $house->houseName }}
                                <small class="pull-right">{{ $house->created_at->diffForHumans() }}</small> 
                            </h4>
                            <h3>
                                <i class="glyphicon glyphicon-tag"></i>
                                {{ $house->housePrice }}
                            </h3>
                            <h4>
                                <i class="glyphicon glyphicon-tag"></i>
                                {{ $house->houseAddress }}
                            </h4>
                            <hr>
                            <a href="/{{ $house->id }}"><button class="btn btn-sm btn-success">
                                    Details
                            </button></a>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>  
<hr>
</div>
@endsection
