@extends('layouts.app')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-10 col-md-12 mb-2">
		<section class="content-header">
    	<Addfollowup></Addfollowup>
    	</section>
	</div>
  
	<section class="content mt-2">
		<div class="box box-primary row">
            <div class="box-header with-border col-md-11">
               <ul class="list-group">
	      	<li class="list-group-item">
	      		<div class="dropdown pull-right">
					<a class="dropdown-toggle btn btn-default p-0" data-toggle="dropdown" href="#" aria-expanded="true">
					</a>
					<ul class="dropdown-menu p-2">
						<li role="presentation">
						    <a role="menuitem" tabindex="-1" target="_blank" href="{{url('new/user/')}}">Done</a>
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
	      		<a href="#" class="link">Olajide Jespon</a> <br>
	      		<b>Date:</b>05/10/2020
	      		
	      	</li>
	      	<li class="list-group-item">
	      		<div class="dropdown pull-right">
					<a class="dropdown-toggle btn btn-default p-0" data-toggle="dropdown" href="#" aria-expanded="true">
						<!-- <i class="fa fa-bars"></i> -->
					</a>
					<ul class="dropdown-menu p-2">
						<li role="presentation">
						    <a role="menuitem" tabindex="-1" target="_blank" href="{{url('new/user/')}}">Done</a>
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
	      			Sunday Seun</a><br>
	      		<b>Date:</b> 20/12/2020
	      	</li>
	      	
	      </ul>
            </div>
            <div class="box-body">
                <p>
            
                </p>
            </div>
        </div>
	</section>
</div>
@endsection