@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Products Form</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('positionUpdate',$position->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="position_name" value="{{ $position->position_name }}" placeholder="Position Name">
                    <label for="name">Position Name</label>
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