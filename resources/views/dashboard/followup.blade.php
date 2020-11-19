@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-12	 mb-2">
		<section class="content-header">
    		<Addfollowup :people="{{$people}}" :users="{{$users}}"></Addfollowup>
    	</section>
	</div>
  

</div>
@endsection