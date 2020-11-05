@extends('layouts.app')
@section('content')
<div style="min-height: 822px;" class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-dashboard"></i> Add Form</h1>
      
<section class="content">
    <div class="box">
        <div class="box-body padding">
			<form method="POST" class="form-horizontal" action="{{url('admin/store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="_method" value="PUT" type="hidden">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="people">Form Name<i class="text-danger">*</i></label>
                <div class="">
                  <input type="text" name="name" class="form-control">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="user">Responsible<i class="text-danger">*</i></label>
                    <div class="">
                        <select name="user" class="form-control">
                          <option value="1">Caleb Bala</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-2 control-label" for="date">Follow up Date<i class="text-danger">*</i></label>
                    <div class="">
                        <input name="date" id="date" class="form-control mb-3" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Type</label>
                <div class="">
                    <select name="people" class="form-control">
                      <option value="1">Visit</option>
                      <option value="2">Phone</option>
                      <option value="3">Message</option>
                  </select>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="from">From <i class="text-danger"></i></label>
                <div class="">
                    <input type="time" name="from" class="form-control" required>
                </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label" for="to">To <i class="text-danger"></i></label>
                <div class="">
                    <input type="time" name="to" class="form-control" required>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="address">Action</label>
                    <div class="col-md-8">
                        <select name="action" id="action" required>
                            <option>Care</option>
                            <option>Teach</option>
                        </select> 
                        <a href="#"><i class="fa fa-cog"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <input name="done" type="checkbox">
                    <label class="control-label" for="done">Done</label>
                </div>
                <div class="form-group">
                   <label class="col-sm-2 control-label" for="zipcode">Notes</label>
                    <div class="">
                        <input type="text" name="zipcode"  class="form-control">
                    </div>
                </div>               
                <div class="clearfix"></div>
                <div class="form-group" style="padding: 10px;">
                    <button type="submit" class="btn btn-secondary rounded-pill btn-block">Add</button>
                </div>
				</form>
				</div>
 			</div>
		</section>
	</div>
</div>
</div>
@endsection
