	@extends('layouts.app')

	@section('content')
		<div style="min-height: 822px;" class="content-wrapper">
			<div class="col-md-10 col-sm-10">
				<section class="content-header">
		 	   <h1><i class="fa fa-dashboard"></i> Add Event</h1>
			</div>
		  </section>
		<section class="content">
			<form accept="" method="" class="col-md-12 p-2">
				<div class="row bg-light">
					<div class="col-md-3">
						<div class="">
							<label for="title">Title <i class="text-danger">*</i></label>
							<input type="text" name="title" class="form-control rounded-pill" placeholder="Title" required>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-body">
							<label for="date">Date <i class="text-danger">*</i></label>
							<input type="date" name="date" class="form-control rounded-pill" required>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-body">
							<label for="from">From <i class="text-danger">*</i></label>
							<input type="time" name="from" class="form-control rounded-pill" required>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-body">
							<label for="to">To <i class="text-danger">*</i></label>
							<input type="time" name="to" class="form-control rounded-pill" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-body bg-light mt-3">
							<h5>Image & Description</h5><hr>
							<label for="image">Image</label>
							<input type="file" name="image" class="form-control">
						</div>
						<div class="panel panel-body mt-2	">
							<label for="description">Description</label>
							<textarea class="form-control" name="description" rows="5" cols="6"></textarea>
						</div>	
					</div>

					<div class="row col-md-12 m-3">
						<div class="panel">
							<div class="panel-head"><h5> Registration</h5></div><hr>
							<div class="panel-body">
								<div class=" form-group">
									<label for="ticket">Available Ticket Count</label>
									<input type="number" name="ticket"class="form-control rounded-pill" value="100">
								</div>
								<div class="form-group-inline">
									<input class="" type="checkbox" name="perfamily">
									<label for="perfamily">Per Family</label>
								</div>
								<div class="form-group-inline">
									<input class="" type="checkbox" name="Unlimited">
									<label for="unlimited">Unlimited</label>
								</div>
							</div>
							</div>
					</div>
					<div class="row col-md-12">
						<div class="col-md-3">
							<label for="attend">Attendance</label>
							<select name="attend" class="form-control">
								<option value="1">Groups</option>
								<option value="2">Individuals</option>
								<option value="3">no One</option>
							</select>
						</div>
						<div class="col-md-3">
							<label for="visibility">Visibility</label>
							<select name="visibility" class="form-control">
								<option value="1">Users</option>
								<option value="2">Public</option>
								<option value="3">Members</option>
							</select>
						</div>
					</div> <!-- End of rowcol-md-12 -->
					<hr>
					<div class=" col-md-12 m-3">
						<h5>Event Repeat</h5><hr>
							<div class="col-md-3">
								<label for="ticket">Event Repeat</label>
								<select class="form-control" name="eventRepeat">
									<option value="1">Weekly</option>
									<option></option>
									<option></option>
								</select>
							</div>
							<h5>Every <i class="text-danger">*</i></h5>
							<div class="col-md-3">
								<input class="" type="checkbox" name="monday">
								<label for="monday">Monday</label>
							</div>
							<div class="col-md-3">
								<input class="" type="checkbox" name="tuesday">
								<label for="tuesday">Tuesday</label>
							</div>
							<div class="col-md-3">
								<input class="" type="checkbox" name="wednesday">
								<label for="wednesday">Wednesday</label>
							</div>
							<div class="col-md-3">
								<input class="" type="checkbox" name="thursday">
								<label for="thursday">Thursday</label>
							</div>
							<div class="col-md-3">
								<input class="" type="checkbox" name="friday">
								<label for="friday">Friday</label>
							</div>
							<div class="col-md-3">
								<input class="" type="checkbox" name="saturday">
								<label for="saturday">Saturday</label>
							</div>
							<div class="col-md-3">
								<input class="" type="checkbox" name="sunday">
								<label for="sunday">Sunday</label>
							</div>
							<div class="col-md-3 mt-2">
								<input class="" type="checkbox" name="end">
								<label for="end">The end date of the repeat</label>
							</div>
							<div class="col-md-3">
								<input class="form-control" type="date" name="enddate">
							</div>
					</div>
					<sessions></sessions>
				</div> <!-- End of ROW -->
				
				
				
			</form>
		</section>
		</div>
	@endsection

