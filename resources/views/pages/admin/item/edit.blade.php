@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add Room</h3>
            
        </div>
        <div class="panel-body">
        	<form action="{{route('item.update',$data)}}" method="POST">
        		@csrf @method('patch')
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name" value="{{$data->name}}" required>
				</div>

				<div class="form-group">
					<label for="">Code</label>
					<input type="text" class="form-control" name="code" value="{{$data->item_code}}" required>
				</div>

				<div class="form-group">
					<label for="">Room</label>
					<select name="room_id" id="" class="form-control">
						@foreach($room as $r)
							@if($r->id == $data->room_id)
							<option value="{{$r->id}}" selected="">{{$r->name}}</option>
							@else
							<option value="{{$r->id}}">{{$r->name}}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="">Type</label>
					<select name="type_id" id="" class="form-control">
						@foreach($type as $r)
							@if($r->id == $data->type_id)
							<option value="{{$r->id}}" selected="">{{$r->name}}</option>
							@else
							<option value="{{$r->id}}">{{$r->name}}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="">Description</label>
					<textarea name="desc" class="form-control" required>{{$data->desc}}</textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Save Room</button>
				</div>
        	</form>
        </div>
    </div>
@endsection
