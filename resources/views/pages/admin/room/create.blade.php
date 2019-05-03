@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add Room</h3>
            
        </div>
        <div class="panel-body">
        	<form action="{{route('room.store')}}" method="POST">
        		@csrf 
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name">
				</div>

				<div class="form-group">
					<label for="">Code</label>
					<input type="text" class="form-control" name="code">
				</div>

				<div class="form-group">
					<label for="">Description</label>
					<textarea name="desc" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Save Room</button>
				</div>
        	</form>
        </div>
    </div>
@endsection
