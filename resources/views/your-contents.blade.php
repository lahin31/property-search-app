@extends('layouts.app')

@section('title')
    Your Cotents
@endsection

@section('content')
<div class="container">
    <h2 style="font-family: Helvetica; text-align: center;"><b>Your all contents</b></h2>
    <hr>
    {{--  <p class="pull-right">You have total {{ $houses->total() }} houses</p>  --}}
    @if(Session::has('delete-message'))
    <div class="panel panel-success">
    <div class="panel-heading">
        {{ Session::get('delete-message') }}
    </div>
    </div>
    @endif
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
                        <img src="/uploads/images/{{$house->houseImage}}" width="250px" height="120px" class="responsive"  alt="">
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
                            <div class="clearfix" style="display:inline-block;">
                                <a href="/{{$house->user_id}}/your-contents/delete/{{$house->id}}"><button class="btn btn-danger pull-right">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </button></a>
                                <a href="/edit-house/{{$house->id}}"><button class="btn btn-primary pull-right" style="margin-right: 10px;">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                </button></a>&nbsp;
                            </div>
                        </div>
                    </div>
            </div>
<!--             {{--  Modal for editing your house  --}}
            <div class="modal fade" id="editMyHouse">
                <div class="modal-dialog" id="modal">
                    <div class="modal-header">
                        <button  type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 style="text-align: center;">Edit your house - {{ $house->houseName }}</h2>
                    </div>
                    <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">House Name:</label>
                            <input type="text" placeholder="Name" name="name" class="form-control" value="{{ $house->houseName }}" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" placeholder="Email" name="email" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" placeholder="Address" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Save</button>
                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
                </div>
            </div> -->
        @endforeach
            
    </div>  
<hr>
</div>
@endsection
