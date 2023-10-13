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
                            <tr class="users{{$dt->upid}}">
                                <td>{{$dt->upid}}</td>
                                <td>{{$dt->name}}</td>
                                <td>₱ {{number_format($dt->main_price,2)}}</td>
                                <td>₱ {{number_format($dt->own_price,2)}}</td>
                                <td>
                                    <form action="{{ route('productsDelete',$dt->upid) }}" method="Post">
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPrice" data-id="{{ $dt->upid }}" data-user_id="{{ $dt->user_id }}" data-product_id="{{ $dt->product_id }}" data-name="{{ $dt->name }}" data-own_price="{{ $dt->own_price }}">Edit Price</a>
                                        
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


<div class="modal fade" id="editPrice" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3" id="cartform" action="{{ route('editPrice') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="product_id" id="product_id">
                        <div class="modal-body">
                            <div class="row m-2" >
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="dis_price" name="own_price" placeholder="Discounted Price" required >
                                        <label for="own_price">Discounted Price</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="Submit">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>

<script type="text/javascript">
$(document).on('show.bs.modal','#editPrice', function (e) {
                    var id = $(e.relatedTarget).data('id');
                    var user_id = $(e.relatedTarget).data('user_id');
                    var name = $(e.relatedTarget).data('name');
                    var product_id = $(e.relatedTarget).data('product_id');
                    var own_price = $(e.relatedTarget).data('own_price');
                    $(e.currentTarget).find('.modal-title').text(name);
                    $(e.currentTarget).find('#id').val(id);
                    $(e.currentTarget).find('#user_id').val(user_id);
                    $(e.currentTarget).find('#product_id').val(product_id);
                    $(e.currentTarget).find('#dis_price').val(own_price);

                })


 </script>
@endsection
