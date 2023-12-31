@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Products Form</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('productsStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="name"  placeholder="Product Name">
                    <label for="name">Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="price" name="main_price"  placeholder="Product Price">
                    <label for="price">Price</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="stocks" name="stocks"  placeholder="Product Stocks">
                    <label for="stocks">Stocks</label>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="details" name="details" style="height: 100px;"></textarea>
                    <label for="details">Details</label>
                  </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                      <input class="form-control" type="file" name="image_url" id="image_url">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
</div>
@endsection