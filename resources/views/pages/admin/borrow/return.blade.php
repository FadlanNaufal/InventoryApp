@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add Item</h3>
            
        </div>
        <div class="panel-body">
        	<form action="{{route('borrow_detail.update',$data)}}" method="POST">
        		@csrf @method('patch')
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Total Pinjam</th>
							<th>Total Rusak</th>
						</tr>
					</thead>
					<tbody>
						 @csrf
                            @foreach($data->detail_borrow as $field)
                            <tr>
                                <td>{{ $loop->index + 1 }}
                                    <input type="hidden" name="item_id[]" value="{{ $field->item->id }}">
                                    <input type="hidden" name="total[]" value="{{ $field->total }}">
                                </td>
                                <td>{{ $field->item->name }}</td>
                                <td>{{ $field->total }}</td>
                                <td>
                                    <input type="text" class="form-control" name="total_broken[]" max="{{ $field->total }}" min="0" autocomplete="off" value="0" required>
                                </td>
                            </tr>
                            @endforeach
					</tbody>
				</table>
				<button class="btn btn-primary btn-block">Return</button>
        	</form>
        </div>
    </div>

@endsection
