@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add Item</h3>
            
        </div>
        <div class="panel-body">
        	<form action="{{route('supply.store')}}" method="POST">
        		@csrf 
				<input type="hidden" name="item_id" value="{{$data->id}}">
				<div class="form-group">
					<label for="">Item</label>
					<input type="text" class="form-control" name="item_id" value="{{$data->name}}" disabled="">
				</div>

				<div class="form-group">
					<label for="">Supplier Name</label>
					<input type="text" class="form-control" name="name" required>
				</div>

				<div class="form-group">
					<label for="">Total</label>
					<input type="number" class="form-control" name="total" required min="1">
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Submit Data</button>
				</div>
        	</form>
        </div>
    </div>
@endsection
