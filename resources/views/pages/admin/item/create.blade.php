@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add Item</h3>
            
        </div>
        <div class="panel-body">
        	<form action="{{route('item.store')}}" method="POST">
        		@csrf 
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name">
				</div>

				<div class="form-group">
					<label for="">Code</label>
					<input type="text" class="form-control" name="item_code">
				</div>

				<div class="form-group">
					<label for="">Total</label>
					<input type="number" class="form-control" name="total">
				</div>


				<div class="form-group">
					<label for="">Room</label>
					<select name="room_id" id="" class="form-control">
						@foreach($room as $r)
							<option value="{{$r->id}}">{{$r->name}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="">Type</label>
					<select name="type_id" id="" class="form-control">
						@foreach($type as $r)
							<option value="{{$r->id}}">{{$r->name}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="">Description</label>
					<textarea name="desc" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Save Item</button>
				</div>
        	</form>
        </div>
    </div>
@endsection
