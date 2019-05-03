@extends('layouts.temp')

@section('content')
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">DEnied Item Report</h3>
            
        </div>
        <div class="panel-body">
            <form action="{{route('laporanrusak')}}" method="POST">
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
                        <tr>
                            <th>Report Category</th>
                            <th>Denied At</th>
                            <th>item</th>
                            <th>Borrower</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $show)
                        <tr>
                            <td>Broken Item</td>
                            <td>{{$show->created_at->diffForHumans()}}</td>
                            <td>{{$show->item['name']}}</td>
                            <td>{{$show->borrower['name']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection

