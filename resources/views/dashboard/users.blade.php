@extends('layouts.app')
@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-11 col-sm-12">
		<section class="content-header">
    		<Adduser></Adduser>
  		</section>
		<section class="content">
			<div class="dropdown pull-right btn btn-primary py-2 px-3 mb-2" >
				<a class="dropdown-toggle btn btn-default p-0" data-toggle="dropdown" href="#" aria-expanded="true">
				Bulk Actions</a>
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
			<div class="col-md-12 col-sm-12 bg-light">
				<div class="d-inline-flex justify-content-start">
					<div class="panel text-center">
						<div class="panel-head bg-grey p-2"><h5>Username</h5> </div>
						<div class="panel-body bd-highlight ">
							<input type="checkbox" name="mark" id="mark">
							<a href="/user">  <img src="{{url('/storage/face-1.jpg')}}" alt="" class="image-circle"> Caleb Bala</a>
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-center">
					<div class="panel p-2">
						<div class="panel-head p-2"><h5>Email</h5> </div>
						<div class="panel-body bd-highlights p-3">
							mail@mail.com
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-between">
					<div class="panel p-2">
						<div class="panel-head p-2"><h5>Mobile Number</h5> </div>
						<div class="panel-body p-2">
							0901 234 5678
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-between">
					<div class="panel p-2">
						<div class="panel-head p-2"><h5>Role</h5> </div>
						<div class="panel-body p-3">
							Admin
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-end">
					<div class="panel p-2">
						<div class="panel-head p-2"><h5>Last Accre...</h5> </div>
						<div class="panel-body p-3">
							10/12/2020
						</div>
					</div>
				</div>
		
<!-- 			<div class="col-md-12 col-sm-12 bg-light">
 -->			<div class="d-inline-flex justify-content-start">
					<div class="panel text-center">
						<!-- <div class="panel-head bg-grey p-2"><h5>Username</h5> </div> -->
						<div class="panel-body bd-highlight ">
							<input type="checkbox" name="mark" id="mark">
							<a href="/user">  <img src="{{url('/storage/face-1.jpg')}}" alt="" class="image-circle"> Caleb Bala</a>
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-center">
					<div class="panel p-2">
						<!-- <div class="panel-head p-2"><h5>Email</h5> </div> -->
						<div class="panel-body bd-highlights p-3">
							mail@mail.com
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-between">
					<div class="panel p-2">
						<!-- <div class="panel-head p-2"><h5>Mobile Number</h5> </div> -->
						<div class="panel-body p-2">
							0901 234 5678
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-between">
					<div class="panel p-2">
						<!-- <div class="panel-head p-2"><h5>Role</h5> </div> -->
						<div class="panel-body p-3">
							Admin
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-end">
					<div class="panel p-2">
						<!-- <div class="panel-head p-2"><h5>Last Accre...</h5> </div> -->
						<div class="panel-body p-3">
							10/12/2020
						</div>
					</div>
				</div><br>
				<div class="d-inline-flex justify-content-start">
					<div class="panel text-center">
						<!-- <div class="panel-head bg-grey p-2"><h5>Username</h5> </div> -->
						<div class="panel-body bd-highlight ">
							<input type="checkbox" name="mark" id="mark">
							<a href="/user">  <img src="{{url('/storage/face-1.jpg')}}" alt="" class="image-circle"> Caleb Bala</a>
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-center">
					<div class="panel p-2">
						<!-- <div class="panel-head p-2"><h5>Email</h5> </div> -->
						<div class="panel-body bd-highlights p-3">
							mail@mail.com
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-between">
					<div class="panel p-2">
						<!-- <div class="panel-head p-2"><h5>Mobile Number</h5> </div> -->
						<div class="panel-body p-2">
							0901 234 5678
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-between">
					<div class="panel p-2">
						<!-- <div class="panel-head p-2"><h5>Role</h5> </div> -->
						<div class="panel-body p-3">
							Admin
						</div>
					</div>
				</div>
				<div class="d-inline-flex justify-content-end">
					<div class="panel p-2">
						<!-- <div class="panel-head p-2"><h5>Last Accre...</h5> </div> -->
						<div class="panel-body p-3">
							10/12/2020
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection