@extends('layouts.temp')
<style>
    .dt-button.buttons-print{
        display: none;
    }
</style>

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Employee Dashboard</h3>
            
        </div>
        <div class="panel-body">
            <table class="table table-bordered" id="myTable">
            	<a href="{{route('employee.create')}}" class="btn btn-primary">Add Employee</a>
            	<br><br>
            	<thead>
            		<tr>
            			<th>No</th>
            			<th>Name</th>
            			<th>NIP</th>
                        <th>Address</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($data as $show)
            		<tr>
            			<td>{{$loop->index+1}}</td>
            			<td>{{$show->name}}</td>
            			<td>{{$show->nip}}</td>
                        <td>{{$show->address}}</td>
            			<td>
            				<div class="btn-group">
            					<a href="{{route('employee.edit',$show)}}" class="btn btn-info" style="color: white">Edit</a>
            					<form action="{{route('employee.destroy',$show)}}" method="POST">
            						@csrf @method('delete')
            						<button class="btn btn-danger">Delete </button>
            					</form>
            				</div>
            			</td>
            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>
    </div>
@endsection
