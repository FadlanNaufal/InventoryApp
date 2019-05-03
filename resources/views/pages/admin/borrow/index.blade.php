@extends('layouts.temp')
<style>
    .dt-button.buttons-print{
        display: none;
    }
</style>
@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">borrow Dashboard</h3>
            
        </div>
        <div class="panel-body">
            <table class="table table-bordered" id="myTable">
            	<a href="{{route('borrow.create')}}" class="btn btn-primary">Add borrow</a>
            	<br><br>
            	<thead>
            		<tr>
            			<th>No</th>
            			<th>Borrow Date</th>
            			<th>Return Date</th>
                        <th>Returned On</th>
                        <th>Accepted By</th>
            			<th>Borrower</th>
            			<th>status</th>
                        <th>status denda</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($data as $show)
            		<tr>
            			<td>{{$loop->index+1}}</td>
            			<td>{{$show->borrow_date}}</td>
            			<td>{{$show->return_date}}</td>
                        <td>{{$show->returned_on}}</td>
                        <td>{{$show->user['name']}}</td>
                        <td>{{$show->employee['name']}}</td>
            			<td>
            				@if($show->status == "uncomplete")
								<div class="badge badge-warning">Uncomplete</div>
            				@endif
            				@if($show->status == "book")
								<div class="badge badge-danger">Booked</div>
            				@endif
            				@if($show->status == "returned")
								<div class="badge badge-primary">returned</div>
            				@endif
            				@if($show->status == "borrowed")
								<div class="badge badge-info">borrowed</div>
            				@endif
                            @if($show->status == "denied")
                                <div class="badge badge-info">Denied</div>
                            @endif
            			</td>
                        <td>
                            @if($show->status_denda == "non-aktif")
                                <div class="badge badge-primary">Tidak Denda</div>
                            @endif
                            @if($show->status_denda == "aktif")
                                <div class="badge badge-danger">Denda</div>
                            @endif
                        </td>
            			@if(Auth::guard('web')->check())
							<td>
								@if($show->status == "uncomplete")
									<a href="{{route('borrow.show',$show)}}" class="btn btn-primary">Back To Form</a>
								@endif

								@if($show->status == "book")
									   <form action="{{route('borrow.destroy',$show)}}" method="POST" class="btn btn-info">
											@csrf @method('delete')
											<input type="hidden" name="approve" value="1">
											<button class="btn btn-primary">Approve</button>
										</form>

										<form action="{{route('borrow.destroy',$show)}}" method="POST" class="btn btn-info">
											@csrf @method('delete')
											<input type="hidden" name="approve" value="0">
											<button class="btn btn-danger">Denied</button>
										</form>
                                        <a href="{{route('borrow_detail.edit',$show)}}" class="btn btn-secondary">Detail</a>
								@endif

								@if($show->status == "borrowed")
									<a href="{{route('borrow_detail.show',$show)}}" class="btn btn-info">Return</a>
                                    <a href="{{route('borrow_detail.edit',$show)}}" class="btn btn-secondary">Detail</a>
								@endif

								@if($show->status == "returned")
									<div class="badge badge-info">No Action Dude </div>
                                    <div class="badge badge-info">
                                        <a href="{{route('borrow_detail.edit',$show)}}" style="color: white">Detail</a>
                                    </div>
								@endif
							</td>
            			@elseif(Auth::guard('employee')->check())
                           <td>
                                @if($show->status == "uncomplete")
                                    <a href="{{route('borrow.show',$show)}}" class="btn btn-primary">Back To Form</a>
                                @endif

                                @if($show->status == "book")
                                   <span class="badge badge-info">waiting admin confirmation</span>
                                @endif

                                @if($show->status == "borrowed")
                                    <span class="badge badge-info">Please send to admin</span>
                                @endif

                                @if($show->status == "returned")
                                    <div class="badge badge-info">No Action Dude </div>
                                @endif

                                @if($show->status == "denied")
                                    <div class="badge badge-info">Sorry Denied :( </div>
                                @endif
                           </td>
            			@endif
            		</tr>
            		@endforeach
            	</tbody>

            </table>
        </div>
    </div>
@endsection
