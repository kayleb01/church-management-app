@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
  </section>
<section class="content">
	<div class="box">
        <div class="box-body padding">
			<form method="POST" class="form-horizontal" action="{{url('admin/store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="_method" value="PUT" type="hidden">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="fname">Group Name</label>
                <div class="">
                    <input name="gname" id="gname" placeholder="Group name" class="form-control rounded-pill mb-3" type="text" required>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="leader">Leader</label>
                <div class="">
                    <input name="leader" id="leader" placeholder="Leader" class="form-control rounded-pill mb-3" type="text" required>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="mname">Description</label>
                <div class="">
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="padding: 10px;">
                    <button type="submit" class="btn btn-secondary rounded-pill btn-block">Save</button>
                </div>
				</form>
				</div>
 			</div>
</section>
</div>
@endsection