@extends('layouts.app')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-11 col-sm-12">
		<section class="content-header">
    		<Addpeople></Addpeople>
  		</section>
<section class="content">
	      	<!--<ul class="list-group">
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
				</div> -->
				<table class="table table-borderless bg-light">
					<tr>
						<td>
						<div class="dropdown pull-right">
							<a class="dropdown-toggle btn btn-default p-0" data-toggle="dropdown" href="#" aria-expanded="true">
								<!-- <i class="fa fa-bars"></i> -->
							</a>
							<ul class="dropdown-menu p-2">
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
							<img src="{{url('/storage/face-1.jpg')}}" alt="" class="image-circle">
							<div class="people">
								<a href="#" class="link">Covenant Adeniyi</a> <br>0701 346 7998
							</div>	
						</td>
					</tr>
					<tr>
						<td>
							<div class="dropdown pull-right">
								<a class="dropdown-toggle btn btn-default p-0" data-toggle="dropdown" href="#" aria-expanded="true">
									<!-- <i class="fa fa-bars"></i> -->
								</a>
								<ul class="dropdown-menu p-2">
									<li role="presentation">
										<a role="menuitem" tabindex="-1" href="{{url('person/edit')}}">Edit</a>
									</li>
								
									<li role="presentation" class="divider"></li>
									<li role="presentation">
										<a href="#" onclick="event.preventDefault(); document.getElementById('delete_form').submit()" class="text-danger">Delete</a>
										<form id="delete_form" method="POST" action="" style="display: none;"><input type="hidden" name="_method" value="delete">
											
										{{csrf_field()}}</form>
									</li>
								</ul>
							</div>
							<img src="{{url('/storage/face-1.jpg')}}" alt="" class="image-circle">
							<div class="people">
								<a href="#">Sunday Emmanuel</a><br>
	      							090 875 6733
							</div>	
						</td>
					</tr>
				</table>
		</section>
	</div>
</div>
@endsection