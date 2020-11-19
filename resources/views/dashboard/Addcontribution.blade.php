@extends('layouts.base')
@section('content')
<div style="min-height: 822px;" class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-dashboard"></i> Add Contribution</h1>
    </section>
        <section class="content">
            <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body padding">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mt-3">
                                        <input type="checkbox" class="custom-control-input" id="eve" @click="showEve()">
                                        <label class="custom-control-label" for="eve"> <h5> Anonymous</h5></label>
                                    </div>
                                    <input type="text" class="form-control" name="people_id" id="people_id" v-model="people_id" placeholder="Add Person">
                                </div>
                            
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body padding">
                                <div class="form-group">
                                <label for="batch_id">Batch</label>
                                    <select class="form-control" name="batch_id" id="batch_id" v-model="batch_id">
                                    <option value="" disabled>Select</option>
                                    </select>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-8">
                        <div class="card">
                                <div class="card-body padding">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch mt-3">
                                            <input type="checkbox" class="custom-control-input" id="mfunds" @click="showEve()">
                                            <label class="custom-control-label" for="mfunds"> <h5> Add Multiple funds</h5></label>
                                        </div>
                                        <div class="row no-gutter">
                                            <div class="col-md-3 col-3">
                                                <label for="amount">Amount<i class="text-danger">*</i></label>
                                                <input type="number" class="form-control" name="amount" id="amount" v-model="amount">
                                            </div>
                                            <div class="col-md-5 col-5">
                                            <label for="funds">Funds<i class="text-danger">*</i></label>
                                                <select name="funds" id="funds" class="form-control" v-model="funds">
                                                    <option value="" disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                
                                </div>
                            </div> 
                        </div>
                    <div class="col-md-12">
                    <!-- <div class="row"> -->
                        <!-- <div class="card">
                            <div class="card-body"> -->
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label for="date">Data</label>
                                        <select class="form-control" name="date" id="date" v-model="date">
                                        <option value="" disabled>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 float-right">
                                    <div class="form-group">
                                        <label for="date">Data</label>
                                        <select class="form-control" name="date" id="date" v-model="date">
                                        <option value="" disabled>Select</option>
                                        </select>
                                    </div>
                                </div>
                            <!-- </div>
                        </div> -->
                   <!--  </div> -->
                        
                    </div>
                    

               
            </div>
            
		</section>
	</div>
</div>
</div>
@endsection
