@extends('layouts.app')

@section('content')
<div class="container">
    <h3> Our Products</h3>
    <div class="row align-items-top">
        @foreach($products as $p)
           
            <div class="card mb-3">
                <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/img/products/{{$p->image_url}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">{{$p->name}}</h5>
                    <h6 class="card-text">Current Stocks: {{$p->stocks}}</h6><br/>
                    <p class="card-text">{{$p->details}}</p>
                        @if($p->stocks > 0)
                            <a href="#" class="btn btn-primary">Add To Cart</a>
                        @else
                        <a href="#" class="btn btn-primary disabled" >No Stocks</a>
                        @endif
                    </div>
                </div>
                </div>
            </div>
            
        @endforeach
    </div>    
</div>
@endsection
