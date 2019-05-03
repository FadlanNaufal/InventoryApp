@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Borrowed Item Report</h3>
            
        </div>
        <div class="panel-body">
            <form action="{{route('laporantgl')}}" method="POST">
            	@csrf
            	<div class="form-group">
            		<label for="">Tanggal Awal</label>
            		<input type="date" name="tgl_awal" id="" class="form-control" required="">
            	</div>

            	<div class="form-group">
            		<label for="">Tanggal Akhir</label>
            		<input type="date" name="tgl_akhir" id="" class="form-control" required="">
            	</div>

            	<div class="form-group">
            		<button class="btn btn-primary"><i class="lnr lnr-magnifier"></i></button>
            	</div>
            </form>
            <table class="table table-bordered" id="myTable">
            		<thead>
            			<tr><th>Report Category</th>
            				<th>Borrow Date</th> LIst
            				<th>Return Date</th>
            				<th>Status</th>
            				<th>Borrower</th>
            				<th>Borrowed By</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($data as $show)
						<tr>
                            <td>Borrower Report</td>
							<td>{{$show->borrow_date}}</td>
							<td>{{$show->return_date}}</td>
							<td>{{$show->status}}</td>
							<td>{{$show->user['name']}}</td>
							<td>{{$show->employee->name}}</td>
						</tr>
            			@endforeach
            		</tbody>
            	</table>
        </div>
    </div>
@endsection

