@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Detail Borrow</h3>
            
        </div>
        <div class="panel-body">
        	
				<div class="form-group">
					<label for="">Item Name</label>
					<input type="text" class="form-control" value="{{$detail->item->name}}" disabled>
				</div>

				<div class="form-group">
					<label for="">Total Borrowed</label>
					<input type="text" class="form-control" value="{{$detail->total}}" disabled>
				</div>

				<div class="form-group">
					<label for="">Borrowed At</label>
					<input type="text" class="form-control" value="{{$detail->created_at}}" disabled>
				</div>	

				<div class="form-group">
					<label for="">returned At</label>
					<input type="text" class="form-control" value="{{$detail->borrow->returned_on}}" disabled>
				</div>				
				<a href="{{route('borrow.index')}}" class="btn btn-warning">Back</a>


        </div>
    </div>
@endsection
