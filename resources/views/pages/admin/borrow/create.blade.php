@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add Item</h3>
            
        </div>
        <div class="panel-body">
        	<form action="{{route('borrow.store')}}" method="POST">
        		@csrf 

				@if(Auth::guard('web')->check())
				<div class="form-group">
					<label for="">Employee / Borrower </label>
					<select name="employee_id" id="" class="form-control" >
						@foreach($data as $r)
							<option value="{{$r->id}}">{{$r->name}}</option>
						@endforeach
					</select>
				</div>
				@endif

				@if(Auth::guard('web')->check())
				<div class="form-group">
					<label for=""> Operator </label>
					<input type="text" class="form-control" value="{{Auth::user()->name}}" disabled="">
				</div>
				@endif
				
				<div class="form-group">
					<label for="">Return Date</label>
					<select name="return_date" id="" class="form-control">
						<option value="1">1 Hari</option>
						<option value="3">3 Hari</option>
						<option value="7">7 Hari</option>
						<option value="30">30 Hari</option>
					</select>
				</div>				

				<div class="form-group">
					<label for="">Borrow Date</label>
					<input type="text" class="form-control" name="borrow_date" value="{{date('y-m-d')}}" disabled="">
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Submit Data</button>
				</div>
        	</form>
        </div>
    </div>
@endsection
