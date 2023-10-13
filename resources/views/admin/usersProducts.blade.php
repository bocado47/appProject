@extends('layouts.app')

@section('content')
<div class="container mt-5">
   
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">User's Product Table</h2>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="m-2" style="text-align:right">
                    <a class="btn btn-success" href="{{ route('productsAdd') }}">Add Price</a>
                </div>
                <table id="userProductTable" class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Main Price</th>
                            <th>Dis. Price</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                            <tr class="users{{$dt->id}}">
                                <td>{{$dt->id}}</td>
                                <td>{{$dt->name}}</td>
                                <td>₱ {{number_format($dt->main_price,2)}}</td>
                                <td>₱ {{number_format($dt->own_price,2)}}</td>
                                <td>
                                    <form action="{{ route('productsDelete',$dt->id) }}" method="Post">
                                        <a class="btn btn-warning btn-sm" href="{{ route('productsEdit',$dt->id) }}">View/Edit info</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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


 </script>
@endsection
