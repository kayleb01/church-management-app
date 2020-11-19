@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-dashboard"></i> Create User</h1>
      
<section class="content">
    <div class="box">
        <div class="box-body padding">
			<form method="POST" class="form-horizontal" action="{{url('admin/store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="_method" value="PUT" type="hidden">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="fname">First name</label>
                    <div class="">
                        <input name="fname" id="fname" placeholder="First name" class="form-control rounded-pill mb-3" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="lname">Last name</label>
                    <div class="">
                        <input name="lname" id="lname" placeholder="Last name" class="form-control rounded-pill mb-3" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="mname">Middle name</label>
                    <div class="">
                        <input name="mname" id="fname" placeholder="Middle name" class="form-control rounded-pill mb-3" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Email</label>
                    <div class="">
                        <input  name="email" id="email" placeholder="Enter email address" class="form-control rounded-pill" type="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="note_on_user">Date of Birth</label>
                    <div class="">
                        <input type="date" name="dob" class="form-control rounded-pill" placeholder="Year/Month/Day" required>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">Address Line</label>
                    <div class="">
                        <input name="address" id="address" placeholder="Your Location" class="form-control rounded-pill mb-2" type="text" required>
                    </div>
                <label class="col-sm-2 control-label" for="state">State </label>
                    <div class="">
                        <select name="state" id="state" class="form-control mb-2">
                            <option value="">select</option>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label" for="city">City</label>
                    <div class="">
                        <input name="city" id="city" placeholder="City" class="form-control rounded-pill mb-2" type="text" required>
                    </div>
                    <label class="col-sm-2 control-label" for="zipcode">Zip Code</label>
                    <div class="">
                        <input type="number" name="zipcode" id="zipcode" class="form-control rounded-pill" placeholder="Zip Code">
                    </div>
                </div>
                <hr>
                <div class="form-check form-group">
                    <label class="m-3"> Gender</label>
                    <input type="radio" name="gender" id="sex" value="1">
                    <label class="col-sm-2 control-label" for="sex">Male</label>
                    <input type="radio" name="gender" id="sex1" value="2">
                    <label class="col-sm-2 control-label" for="sex1">Female</label>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="phonenum">Mobile Phone</label>
                    <div class="">
                        <input name="phonenum" type="text" class="form-control rounded-pill" maxlength="15" placeholder="080 234 5678" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="facebook">Facebook</label>
                    <div class="">
                        <input name="facebook" type="text" class="form-control rounded-pill"  placeholder="Facebook Profile" required>
                    </div>
                </div>
                 <hr>
                 <div class="form-group">
                    <label for="group">Groups</label>
                    <div class="">
                        <select name="groups[]" id="group" class="form-control" multiple>
                            <option value="">Special Cases</option>
                            <option value="">Sunday School</option>
                            <option value="">Youth Group</option>
                        </select>
                    </div>
                 </div>
                 <hr>
                 <div class="form-group mb-3">
                    <label class="col-sm-2 control-label" for="jt">Job Title</label>
                    <div class="">
                        <input type="text" name="jt" class="form-control rounded-pill" placeholder="Job Title" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="col-sm-2 control-label" for="employer">Employer</label>
                    <div class="">
                        <input type="text" name="employer" class="form-control rounded-pill" placeholder="Employer" required>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label class="col-sm-10 control-label" for="pass">Talents and Hobbies</label>
                    <div class="">
                        <input type="text" name="th" class="form-control rounded-pill " placeholder="Talent and Hobbies" required>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="school">School</label>
                    <input type="text" name="school" id="school" class="form-control rounded-pill" placeholder="School">
                </div>
                <div class="form-group">
                    <label for="school">Grade</label>
                    <select name="grade" id="grade" class="form-control">
                        <option value="1">Pre-Kindergaten</option>
                        <option value="2">Kindergaten</option>
                        <option value="3">1st</option>
                        <option value="4">2nd</option>
                        <option value="5">3rd</option>
                        <option value="6">4th</option>
                        <option value="7">5th</option>
                        <option value="8">6th</option>
                        <option value="9">7th</option>
                        <option value="10">8th</option>
                        <option value="11">9th</option>
                        <option value="12">10th</option>
                        <option value="13">11th</option>
                        <option value="14">12th</option>
                        <option value="15">Graduated</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-sm-10 control-label" for="Mstatus">Marital Status</label>
                    <div class="">
                        <select name="Mstatus" id="Mstatus" class="form-control">
                            <option value="">Unknown</option>
                            <option value="1">Single</option>
                            <option value="2">Married</option>
                            <option value="3">Widowed</option>
                            <option value="4">Engaged</option>
                            <option value="5">Divorced</option>
                        </select>
                    </div>  
                </div>
                <hr>
                <div class="form-group">
                    <label for="Bdate">Baptism Date</label>
                    <input type="date" name="Bdate" id="Bdate" class="form-control rounded-pill">
                </div>
                <div class="form-group">
                    <label for="Blocation">Baptism Location</label>
                    <input type="text" name="blocation" id="Blocation" class="form-control rounded-pill">
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-sm-10 control-label" for="joindate">Join Date</label>
                    <input type="date" name="joindate" class="form-control rounded-pill" required>
                </div>                   
                <div class="clearfix"></div>
                <div class="form-group" style="padding: 10px;">
                    <button type="submit" class="btn btn-secondary rounded-pill btn-block">Add</button>
                </div>
            </div>
			</form>
            </div>
				
 			</div>
		</section>
	</div>
</div>
</div>
@endsection