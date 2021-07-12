@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-dashboard"></i> Add Follow Up</h1>
      
<section class="content">
    <div class="box">
        <div class="box-body padding">
			<form method="POST" class="form-horizontal" action="{{url('admin/store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="_method" value="PUT" type="hidden">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="people">From Name<i class="text-danger">*</i></label>
                <div class="">
                  <input type="text" name="name" class="form-control">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="user">Max Response<i class="text-danger">*</i></label>
                    <div class="">
                        <input type="number" name="response" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="img-thumbnail d-flex justify-content-center p-5">
                       <div class="m-2"><a href="#" class="link"><i class="fa fa-plus"></i>
                        	Add Banner Image
                        </a>
                    </div>
                    <div class="clearfix"></div>
                        <div class="m-2">500<b> X </b>130px</div>
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