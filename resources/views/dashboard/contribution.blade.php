@extends('layouts.base')

@section('content')
<div style="min-height: 822px;" class="content-wrapper">
	<div class="col-md-11 col-sm-12">
		<section class="content-header">
    		<h3><i class="fa fa-dashboard"></i>All Contributions</h3>
  		</section>
		<section class="content">
		<span><b>Total Amount:</b> N950,000.00</span>
		<table class="table table-hover bg-light">
			<th>NAME</th>
			<th>AMOUNT</th>
            <th>DATE</th>
			<tr>
				<td>Caleb Bala</td>
				<td>N2400</td>
				<td>21/05/2020</td>
			</tr>
			<tr>
				<td>Ibrahim Akawu</td>
				<td>N9000</td>
				<td>21/05/2020</td>
			</tr>
		</table>
		</section>
	</div>
</div>
@endsection