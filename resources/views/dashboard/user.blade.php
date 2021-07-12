@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">


	<userprofile :user="{{$user}}" :people="{{$people}}" :follow="{{$follow}}" :users="{{$users}}"></userprofile>		
</div>
@endsection