@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-12 col-sm-12">
		<section class="content-header">
    		<Addgroup :users="{{$users}}"></Addgroup>
  		</section>

	</div>
</div>
@endsection