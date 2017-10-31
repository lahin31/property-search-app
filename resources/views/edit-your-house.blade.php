 @extends('layouts.app')

@section('title')
    Edit your house
@endsection

@section('content')
<div class="container">
	<h3 style="text-align: center;">Edit your house - {{ $house-> houseName }}</h3>
	<div>
		@include('edit-house-form')
	</div>
</div>
@endsection