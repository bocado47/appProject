@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Price Per Position Form</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('pricePerPositionUpdate',$PricePerPosition->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="position_id" required>
                            <option>Select Position</option>
                            @foreach($position as $value)
                                @if($position2->id == $value->id)
                                    <option value="{{ $value->id }}" selected>{{ $value->position_name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->position_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="floatingSelect">Select Position</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="product_id" required>
                            <option>Select Product</option>
                            @foreach($Products as $value2)
                                @if($Products2->id == $value2->id)
                                    <option value="{{ $value2->id }}" selected>{{ $value2->name }}</option>
                                @else
                                    <option value="{{ $value2->id }}">{{ $value2->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="floatingSelect">Select Product</label>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="price" name="price"  value="{{ $PricePerPosition->price }}" placeholder="Price" required>
                    <label for="name">Price</label>
                  </div>
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