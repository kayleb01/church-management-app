@extends('layouts.app')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-10 col-sm-10">
		<section class="content-header">
    		<Addgroup></Addgroup>
  		</section>
<section class="content">
	      <ul class="list-group">
	      	<li class="list-group-item">
	      		<div class="dropdown pull-right">
					<a class="dropdown-toggle btn btn-default p-0" data-toggle="dropdown" href="#" aria-expanded="true">
					</a>
					<ul class="dropdown-menu p-2">
						<li role="presentation">
						    <a role="menuitem" tabindex="-1" target="_blank" href="{{url('new/user/')}}">Add Person</a>
						</li>
						<li role="presentation">
						    <a role="menuitem" tabindex="-1" href="{{url('group/edit')}}">Edit</a>
						</li>
					
						<li role="presentation" class="divider"></li>
						<li role="presentation" class="text-danger">
						    <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form').submit()" class="text-danger">Delete</a>
						    <form id="delete_form" method="POST" action="" style="display: none;"><input type="hidden" name="_method" value="delete">
						    	
							{{csrf_field()}}</form>
						</li>
					</ul>
				</div>
	      		<a href="#" class="link">Special Cases</a> <br>
	      		People:
	      		
	      	</li>
	      	<li class="list-group-item">
	      		<div class="dropdown pull-right">
					<a class="dropdown-toggle btn btn-default p-0" data-toggle="dropdown" href="#" aria-expanded="true">
						<!-- <i class="fa fa-bars"></i> -->
					</a>
					<ul class="dropdown-menu p-2">
						<li role="presentation">
						    <a role="menuitem" tabindex="-1" target="_blank" href="{{url('new/user/')}}">Add Person</a>
						</li>
						<li role="presentation">
						    <a role="menuitem" tabindex="-1" href="{{url('group/edit')}}">Edit</a>
						</li>
					
						<li role="presentation" class="divider"></li>
						<li role="presentation">
						    <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form').submit()" class="text-danger">Delete</a>
						    <form id="delete_form" method="POST" action="" style="display: none;"><input type="hidden" name="_method" value="delete">
						    	
							{{csrf_field()}}</form>
						</li>
					</ul>
				</div>
	      		<a href="#" class="link">
	      			Sunday School</a><br>
	      			People:
	      	</li>
	      	<li class="list-group-item">
	      		<div class="dropdown pull-right">
					<a class="dropdown-toggle btn btn-default p-0" data-toggle="dropdown" href="#" aria-expanded="true">
						<!-- <i class="fa fa-bars"></i> -->
					</a>
					<ul class="dropdown-menu p-2">
						<li role="presentation">
						    <a role="menuitem" tabindex="-1" target="_blank" href="{{url('new/user')}}">Add Person</a>
						</li>
						<li role="presentation">
						    <a role="menuitem" tabindex="-1" href="{{url('group/edit')}}">Edit </a>
						</li>
					
						<li role="presentation" class="divider"></li>
						<li role="presentation">
						    <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form').submit()"  class="text-danger link">Delete user</a>
						    <form id="delete_form" method="POST" action="" style="display: none;"><input type="hidden" name="_method" value="delete">
						    	
							{{csrf_field()}}</form>
						</li>
					</ul>
				</div>
	      		<a href="#">Youth Group</a><br>
	      		People:
	      	</li>
	      </ul>
		</section>
	</div>
</div>
@endsection