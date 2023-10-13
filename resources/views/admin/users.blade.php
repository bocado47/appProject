@extends('layouts.app')

@section('content')
<div class="container mt-5">
   
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">User's Table</h2>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table id="userTable" class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                            <tr class="users{{$dt->id}}">
                                <td>{{$dt->id}}</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->email}}</td>
                                <td>
                                    <form action="{{ route('productsDelete',$dt->id) }}" method="Post">
                                        <a class="btn btn-warning btn-sm" href="{{ route('productsEdit',$dt->id) }}">View/Edit info</a>
                                        @csrf
                                        @method('DELETE')
                                        @if($dt->is_active)
                                        <a class="btn btn-primary btn-sm" href="{{ route('usersProducts',$dt->id) }}">Add/Change Product Prices</a>
                                            <button type="submit" class="btn btn-danger btn-sm">DeActivate</button>
                                        @else
                                            <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal"data-id="{{ $dt->id }}">Activate</a>
                                        @endif
                                        
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
<div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Activate User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3" id="cartform" action="{{ route('activateUser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                        <div class="modal-body">
                            <div class="row m-2" >
                                <div class="col-md-12">
                                    <select class="form-select" id="floatingSelect" name="user_type" aria-label="Floating label select example" required>
                                        <option selected>Select User Type</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Distributor">Distributor</option>
                                    </select>
                                </div>
                            </div>  
                            <div class="row m-2" >
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="bau_id" name="bau_id_number" placeholder="BAU ID Number" required >
                                        <label for="bau_id_number">BAU ID Number</label>
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
            </div><!-- End Basic Modal-->

<script type="text/javascript">
 

$(document).on('show.bs.modal','#basicModal', function (e) {
                    var id = $(e.relatedTarget).data('id');
                    $(e.currentTarget).find('#user_id').val(id);

                })

 </script>
@endsection
