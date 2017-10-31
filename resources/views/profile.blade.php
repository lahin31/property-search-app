@extends('layouts.app')

@section('title')
{{ $user -> name }} 
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img src="/uploads/avatars/{{ $user -> userProPic }}" class="user-img" style="width: 170px; height: 150px; float: left; margin-right: 10px;">
            <h2>{{ $user -> name }}</h2>
            <button class="btn btn-danger" style="margin-left:820px; margin-top: 37px;" data-toggle="modal" data-target="#editProfile">Edit Profile</button>
        </div>
    </div><hr />
    <div style="margin-top: 30px;">
        <h3>Basic Information</h3>
        <p><b>Email</b>: {{ $user->email }}</p>
        <p><b>Address</b>: {{ $user->address }}</p>
        <p><b>Phone</b>: {{ $user->phone }}</p>
    </div>
    <hr>
    {{--  <div>
        <h1 style="text-align: center;">Your Content</h1>
        <p style="text-align: right;">Total: 0</p>
    </div>  --}}
    <!-- Modal for showing Animal -->
    <div class="modal fade" id="editProfile">
        <div class="modal-dialog" id="modal">
            <div class="modal-header">
                <button  type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 style="text-align: center;">Edit your profile</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" placeholder="Name" name="name" class="form-control" value="{{ $user->name }}" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" placeholder="Email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" placeholder="Address" name="address" class="form-control" value="{{$user->address}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Mobile:</label>
                            <input type="text" placeholder="Mobile" name="phone" class="form-control" value="{{$user->phone}}">
                        </div>
                        <div class="form-group" style="position:relative;">
                            <a class='btn btn-info' href='javascript:;'>
                                Choose File for your profile picture...
                                <input type="file" name="profile_pic" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="houseImage" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                            </a>
                            &nbsp;
                            <span class='label label-danger' id="upload-file-info"></span>
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
    </div>
</div>
@endsection
