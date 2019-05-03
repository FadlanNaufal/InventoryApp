@extends('layouts.temp')
<style>
    h3{
        color: 
    }
</style>
@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Dashboard {{Auth::user()->name}}</h3>
            	<p class="panel-subtitle">Today : {{date('D-M-Y')}}</p>
        </div>
        <div class="panel-body">
        	<div class="row">
        		<div class="col-md-3">
        			<div class="panel">
        				<div class="panel-heading">
        					<div class="panel-title" style="color: red">Jumlah Peminjam</div>
        				</div>
        				<div class="panel-body">
        					<h3 class="text-center">{{$borrow}}</h3>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-3">
        			<div class="panel">
        				<div class="panel-heading">
        					<div class="panel-title" style="color: red">Jumlah Barang</div>
        				</div>
        				<div class="panel-body">
        					<h3 class="text-center">{{$item}}</h3>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-3">
        			<div class="panel">
        				<div class="panel-heading">
        					<div class="panel-title" style="color: red">Barang Yang Rusak</div>
        				</div>
        				<div class="panel-body">
        					<h3 class="text-center">{{$rusak}}</h3>
        				</div>
        			</div>
        		</div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title" style="color: red">Jumlah Ruang</div>
                        </div>
                        <div class="panel-body">
                            <h3 class="text-center">{{$room}}</h3>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>

    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Dashboard Multimedia</h3>
                <p class="panel-subtitle">Today : {{date('D-M-Y')}}</p>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Video</div>
                        </div>
                        <div class="panel-body">
                           <video controls controls style="width: 300px ; height: 400px">
                              <source src="{{url('assets/bmth.mkv')}}">
                              <source src="movie.ogg" type="video/ogg">
                              Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Images</div>
                        </div>
                        <div class="panel-body">
                            <img src="{{url('assets/wk.jpg')}}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


