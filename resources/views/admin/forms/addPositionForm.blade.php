@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <div class="card col-md-6">
            <div class="card-body">
              <h5 class="card-title">Add Products Form</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ route('positionStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="position_name"  placeholder="Position Name">
                    <label for="name">Position Name</label>
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