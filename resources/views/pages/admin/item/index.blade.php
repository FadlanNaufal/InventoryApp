@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Item Dashboard</h3>
            
        </div>
        <div class="panel-body">
            <table class="table table-bordered" id="myTable">
            	<a href="{{route('item.create')}}" class="btn btn-primary">Add item</a>
            	<br><br>
            	<thead>
            		<tr>
            			<th>No</th>
            			<th>Name</th>
            			<th>Code</th>
            			<th>Room</th>
            			<th>item</th>
                        <th>total</th>
            			<th>Added By</th>
            			<th>Desc</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($data as $show)
            		<tr>
            			<td>{{$loop->index+1}}</td>
            			<td>{{$show->name}}</td>
            			<td>{{$show->item_code}}</td>
            			<td>{{$show->Room->name}}</td>
            			<td>{{$show->Type->name}}</td>
                        <td>{{$show->total}}</td>
            			<td>{{$show->User->name}}</td>
            			<td>{{$show->desc}}</td>
            			<td>
            					<div class="btn-group">
                                    <a href="{{route('item.edit',$show)}}" class="btn btn-info" style="color: white"><i class="lnr lnr-pencil"></i></a>
                                    <a href="{{route('item.show',$show)}}" class="btn btn-primary" style="color: white"><i class="lnr lnr-download"></i></a>
                                    <form action="{{route('item.destroy',$show)}}" method="POST">
                                        @csrf @method('delete')
                                        <button class="btn btn-danger"><i class="lnr lnr-trash"></i></button>
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

