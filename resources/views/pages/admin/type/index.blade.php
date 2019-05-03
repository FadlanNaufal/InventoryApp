@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Type Dashboard</h3>
            
        </div>
        <div class="panel-body">
            <table class="table table-bordered" id="myTable">
            	<a href="{{route('type.create')}}" class="btn btn-primary">Add type</a>
            	<br><br>
            	<thead>
            		<tr>
            			<th>No</th>
            			<th>Name</th>
            			<th>Code</th>
            			<th>Desc</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($data as $show)
            		<tr>
            			<td>{{$loop->index+1}}</td>
            			<td>{{$show->name}}</td>
            			<td>{{$show->code}}</td>
            			<td>{{$show->desc}}</td>
            			<td>
            				<div class="btn-group">
            					<a href="{{route('type.edit',$show)}}" class="btn btn-info" style="color: white">Edit</a>
            					<form action="{{route('type.destroy',$show)}}" method="POST">
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
