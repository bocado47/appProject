@extends('layouts.app')

@section('content')
<div class="container mt-5">
   
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Price Per Position Table</h2>
                <div class="m-2" style="text-align:right">
                    <a class="btn btn-success" href="{{ route('pricePerPositionAdd') }}">Add Price Per Position</a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table id="myTable" class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Position Name</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $ppp)
                            <tr class="product{{$ppp->main_id}}">
                                <td>{{$ppp->main_id}}</td>
                                <td>{{$ppp->position_name}}</td>
                                <td>{{$ppp->product_name}}</td>
                                <td>{{$ppp->price}}</td>
                                <td>
                                    <form action="{{ route('pricePerPositionelete',$ppp->main_id) }}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('pricePerPositionEdit',$ppp->main_id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

<script type="text/javascript">
    // JQUERY('#table').DataTable();
    let table = new DataTable('#table', {
    // options
});

 </script>
@endsection


