@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-11 col-sm-12">
		<section class="content-header">
    		<h3><i class="fa fa-dashboard"></i>All Contributions</h3>
  		</section>
		<section class="content">
		<div class="card">
			<div class="card-header">
				<h3 class="cardt=-title">Contributions</h3>
			</div>
			<div class="card-body">
				<span><b>Total Amount:</b> N950,000.00</span>
				
				<table class="table table-hover bg-light">
					<th>NAME</th>
					<th>AMOUNT</th>
					<th>DATE</th>
					@foreach($contribution as $fund)
					<tr>
						<td>{{$fund->people->first_name}} {{$fund->people->last_name}}</td>
						<td>N{{$fund->amount}}</td>
						<td>{{$fund->date}}</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		
		</section>
	</div>
</div>
@endsection