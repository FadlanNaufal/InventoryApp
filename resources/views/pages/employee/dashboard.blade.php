@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Dashboard Employee</h3>
            	<p class="panel-subtitle">Today : {{date('D-M-Y')}}</p>
        </div>
        <div class="panel-body">
        	Halo <b>{{Auth::guard('employee')->user()->name}}</b>
        	<br><br>
			<div class="row">
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<div class="panel-title">Barang yang sudah dipinjam </div>
						</div>
						<div class="panel-body">
							<h3 class="text-center">{{$borrow}}</h3>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<div class="panel-title">Barang yang belum dikembalikan </div>
						</div>
						<div class="panel-body">
							<h3 class="text-center">{{$borrowed}}</h3>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
@endsection

