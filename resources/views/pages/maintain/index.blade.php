@extends('layouts.temp')
<style>
    .dt-button.buttons-print{
        display: none;
    }
</style>
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
            			<th>Nama Item Rusak</th>
            			<th>Broken Date</th>
            			<th>Fix Date</th>
            			<th>Total Broken Item</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($data as $show)
            		<tr>
            			<td>{{$loop->index+1}}</td>
            			<td>{{$show->item->name}}</td>
            			<td>{{$show->broken_date}}</td>
            			<td>{{$show->fix_date}}</td>
            			<td>{{$show->total}}</td>
            			<td>
            				@if($show->fix_date == null)
                            <form action="{{route('maintain.destroy',$show)}}" method="POST">
                                @csrf @method('delete')
                                <button class="btn btn-primary">
                                    <i class="lnr lnr-cog"></i>
                                </button>
                            </form>
                            
                            @else
                                <div class="badge badge-primary">No Action Dude</div>
                            @endif
            			</td>
            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>
    </div>
@endsection
