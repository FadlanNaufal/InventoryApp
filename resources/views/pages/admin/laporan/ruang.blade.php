@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Room Item Report</h3>
            
        </div>
        <div class="panel-body">
            <form action="{{route('laporanruang')}}" method="POST">
            	@csrf
            	<div class="form-group">
            		<label for="">Pilih Ruang</label>
            		<select name="room_id" id="" class="form-control">
            				<option selected disabled="">Pilih Ruang</option>
            			@foreach($room as $r)
							<option value="{{$r->id}}">{{$r->name}}</option>
            			@endforeach
            		</select>
            	</div>
            	<div class="form-group">
            		<button class="btn btn-primary"><i class="lnr lnr-magnifier"></i></button>
            	</div>
            </form>
            <h2 style="display: none;">Hai</h2>
            <table class="table table-bordered" id="myTable">
            		<thead>
            			<tr>
                            <th>Report Category</th>
            				<th>Item Name</th>
            				<th>Total</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($data as $show)
						<tr>
                            <td>Total Item By Room Report</td>
							<td>{{$show->name}}</td>
							<td>{{$show->total}}</td>
						</tr>
            			@endforeach
            		</tbody>
            	</table>
        </div>
    </div>
@endsection

