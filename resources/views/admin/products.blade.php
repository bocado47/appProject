@extends('layouts.app')

@section('content')
<div class="container mt-5">
   
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Products Table</h2>
                <div class="m-2" style="text-align:right">
                    <a class="btn btn-success" href="{{ route('productsAdd') }}">Add Products</a>
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
                            <th>Name</th>
                            <th>Main Price</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr class="product{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>₱ {{number_format($item->main_price, 2)}}</td>
                                <td>
                                    <form action="{{ route('productsDelete',$item->id) }}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('productsEdit',$item->id) }}">Edit</a>
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


