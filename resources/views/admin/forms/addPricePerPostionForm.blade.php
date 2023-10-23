@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <div class="card ">
            <div class="card-body">
              <h5 class="card-title">Add Price Per Postion Form</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('pricePerPositionStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="position_id" required>
                            <option selected>Select Position</option>
                            @foreach($position as $value)
                            <option value="{{ $value->id }}">{{ $value->position_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Select Position</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="product_id" required>
                            <option selected>Select Product</option>
                            @foreach($Products as $value2)
                            <option value="{{ $value2->id }}">{{ $value2->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Select Product</label>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="price" name="price"  placeholder="Price" required>
                    <label for="name">Price</label>
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
</div>
@endsection