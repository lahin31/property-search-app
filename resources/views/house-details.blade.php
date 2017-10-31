@extends('layouts.app')

@section('title')
{{$house->houseName}}
@endsection

@section('content')
<div class="container">
<div class="row">
	<div class="col-md-10">
		<img src="/uploads/images/{{$house->houseImage}}" style="width: 270px; height: 200px; float: left; margin-right: 10px; margin-top: 30px;">
		<img src="/uploads/avatars/{{ $house->owner->userProPic }}" style="width: 200px; margin-right: 15px; margin-top: 35px; float: right;">
		</div>
        <div style="margin-top: 30px; margin-left: 20px; float: left;">
            <h2>{{$house->houseName}}<small> (for {{$house->houseFor}}) - posted {{ $house->created_at->diffForHumans() }}</small></h2>
            <p><strong>Price</strong>: {{$house->housePrice}}/-</p>
			<p><strong>Bedrooms</strong>: {{$house->houseBedrooms}}</p>
			<p><strong>Bathrooms</strong>: {{$house->houseBathrooms}}</p>
			<p><strong>Area</strong>: {{$house->houseArea}} sqft</p>
			<p><strong>Description</strong>: {{$house->houseDescription}}</p>
            <div>
				<p><strong>Address</strong>: {{$house->houseAddress}}</p>
			</div>
		</div>
        <div style="margin-top: 30px; margin-right: 240px; float: right;">
        	<h2>Owner</h2>
			<p><b>Name</b>: {{ $house->owner->name }}</p>
			<p><b>Mobile</b>: {{ $house->owner->phone }}</p>
			<p><b>Email</b>: {{ $house->owner->email }}</p>
			<p><b>Address</b>: {{ $house->owner->address }}</p>
		</div><br />
</div>
<a href="/home" style="margin-left: 480px;"><button class="btn btn-primary">Back to Home</button></a>
</div>	
</div>
@endsection