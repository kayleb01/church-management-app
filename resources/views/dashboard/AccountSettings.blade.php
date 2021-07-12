@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<account :user="{{$user}}"></account>		
</div>
@endsection