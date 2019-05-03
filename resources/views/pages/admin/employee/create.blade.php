@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add Employee</h3>
            
        </div>
        <div class="panel-body">
        	<form action="{{route('employee.store')}}" method="POST">
        		@csrf 
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" name="name">
				</div>

				<div class="form-group">
					<label for="">NIP</label>
					<input type="number" class="form-control" name="nip">
				</div>

				<div class="form-group">
					<label for="">Address</label>
					<textarea name="address" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Save Employee</button>
				</div>
        	</form>
        </div>
    </div>
@endsection
