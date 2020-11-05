@extends('layouts.app')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-12 col-sm-12 mb-5">
		<section class="content-header">
    		<h3>User Details</h3>
  		</section>
  	</div>
	<section class="content">
		<div class="container">
            <div class="row no-gutter">
                <div class="col-md-6">
					<div class="d-flex justify-content-center">
						<img src="{{url('/storage/face-1.jpg')}}" alt="User Image" class="image-user">
					</div>
					<div class="d-flex justify-content-center mt-2">
						<button class="btn btn-default rounded-circle m-1" id="btn-bell"><i class="fa fa-bell"></i></button>
						<button class="btn btn-default rounded-circle m-1" id="btn-bell"><i class="fa fa-qrcode"></i></button>
					</div>
					<div class="card p-0">
						<div class="card-body p-2">
							<table class="table table-borderless text-center">
								<tr>
									<td><b>Birthday</b><br>
										<span>29 May </span>
									</td>
									<td><b>Gender</b> <br>
									<span>Male</span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="card p-0 mt-4">
					<div class="card-body ">
						<table class="table table-borderless  text-center">
							<tr>
								<td><b>School</b><br>
									<span>___ </span>
								</td>
								<td><b>Grade</b> <br>
								<span>___</span></td>
							</tr>
						</table>
					</div>
					</div>
					<div class="card p-0 mt-4">
						<div class="card-body p-2">
							<table class="table table-borderless text-center">
								<tr>
									<td><b>Baptism Date</b><br>
										<span>___</span>
									</td>
									<td><b>Baptism Location</b> <br>
									<span>___</span></td>
								</tr>
							</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-8">
						<div class="card p-0 mt-4">
						<div class="card-body p-2">
							<table class="table table-borderless">
								<tr>
									<td>
										<b>Mobile Phone</b><br>
										<span>____</span>
									</td>
									<td>
										<b>Home Phone</b> 
										<br>
										<span>____</span>
									</td>
									
								</tr>
								<tr>
									<td>
										<b>Email</b> <br>
										<span>Mail@mailme.com</span>	
									</td>
									<td>
										<b>Facebook</b> <br>
										<span>___</span>	
									</td>
								</tr>
							</table>
						</div>
					</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless">
									<tr>	
										<td>
											<b>Groups</b><br><br>
											<span style="background-color:#ccc" class="rounded-pill px-2 py-1 mt-3">Youth Group</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless">
									<tr>	
										<td>
											<b>Job Title</b><br>
											<spa>___</span>
										</td>
										<td>
											<b>Employer</b><br>
											<span>___</span>
										</td>
										<td>
											<b>Talents and Hobbies</b><br>
											<span>___</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless text-center">
									<tr>	
										<td>
											<b>Marital Status</b><br>
											<spa>Unknown</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card mt-2">
							<div class="card-body">
								<table class="table table-borderless text-center">
									<tr>	
										<td>
											<b>Join Date</b><br>
											<spa>01/10/1960</span>
										</td>
									</tr>
								</table>
							</div>
						</div>
				</div>
            </div>
        </div>
    </section>
</div>
@endsection