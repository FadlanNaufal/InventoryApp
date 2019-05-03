@extends('layouts.temp')

@section('content')
   <div class="col-md-12">
   		<div class="row">
   			<div class="col-md-6">
   				 <div class="panel panel-headline">
			        <div class="panel-heading">
			            <h3 class="panel-title">Choose What You Want :)</h3>
			            
			        </div>
			        <div class="panel-body">
			        	<form action="{{route('borrow_detail.store')}}" method="POST">
			        		@csrf 
			        		<input type="hidden" name="borrow_id" value="{{$borrow->id}}">
							<div class="form-group">
								<label for="">Borrower</label>
								<input type="text" class="form-control" name="employee_id" value="{{$borrow->employee['name']}}" disabled>
							</div>

							<div class="form-group">
								<label for="">Item</label>
								<select name="item_id" id="" class="form-control" required="">
										<option selected disabled=""></option>
									@foreach($item as $i)
										<option value="{{$i->id}}">{{$i->name}} // {{$i->total}}</option>
									@endforeach>
								</select>
							</div>

							<div class="form-group">
								<label for="">Total Pinjam</label>
								<input type="number" name="total" id="" class="form-control" required min="1">
							</div>

							<div class="form-group">
								<button class="btn btn-primary">Add To Cart</button>
							</div>
			        	</form>
			        </div>
			    </div>
   			</div>

   			<div class="col-md-6">
   				 <div class="panel panel-headline">
			        <div class="panel-heading">
			            <h3 class="panel-title">Choose What You Want :)</h3>
			            
			        </div>
			        <div class="panel-body">
			        	<table class="table table-bordered">
			        		<thead>
			        			<tr>
			        				<th>No</th>
			        				<th>Item Name</th>
			        				<th>Total</th>
			        				<th>Action</th>
			        			</tr>	
			        		</thead>
			        		<tbody>
			        			@foreach($borrow->detail_borrow as $show)
			        			<tr>
									<td>{{$loop->index+1}}</td>
									<td>{{$show->item->name}}</td>
									<td>{{$show->total}}</td>
									<td>
									<form action="{{route('borrow_detail.destroy',$show)}}" method="POST">
										@csrf @method('delete')
										<button class="btn btn-danger">Cancel</button>
									</form>
									</td>
			        			</tr>
			        			@endforeach
			        		</tbody>
			        	</table>
			        	<form action="{{route('borrow.update',$borrow)}}" method="post">
			        		@csrf @method('patch')
							<button class="btn btn-primary btn-block">Done</button>
			        	</form>
			        </div>
			    </div>
   			</div>
   		</div>
   </div>
@endsection
