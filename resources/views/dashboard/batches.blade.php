@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-12 col-sm-12">
    <section class="content-header">
        <h1><i class="fa fa-dashboard"></i> Batches</h1>
    </section>
    <section class="content">
    <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th >BATCH NUMBER</th>
                      <th>DATE</th>
                      <th>CONTRIBUTIONS</th>
                      <th style="width: 40px">TOTAL</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        1.
                      </td>
                      <td>
                        Thurs 23, 2020
                      </td>
                      <td>
                        1
                      </td>
                      <td>
                        $300
                      </td>
                    </tr>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    </section>
	</div>
</div>
@endsection