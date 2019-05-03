@extends('layouts.temp')
<style>
    .dt-button.buttons-print{
        display: none;
    }
</style>
@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Room Dashboard</h3>
            
        </div>
        <div class="panel-body">
            <table class="table table-bordered" id="myTable">
            	<a href="{{route('room.create')}}" class="btn btn-primary">Add Room</a>
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
            					<a href="{{route('room.edit',$show)}}" class="btn btn-info" style="color: white">Edit</a>
            					<form action="{{route('room.destroy',$show)}}" method="POST">
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
