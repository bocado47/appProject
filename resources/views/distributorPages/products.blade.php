@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3> Our Products</h3>
        </div>
        <div class="col-md-6 " style="text-align:right">
            <a href="#" class="btn btn-primary"> <i class="bi bi-cart"></i>  My Cart</a>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
           <p>{{ $message }}</p>
        </div>
     @endif
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
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" data-name="{{ $p->name }}" data-id="{{ $p->id }}">Add To Cart</a>
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
            <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3" id="cartform" action="{{ route('addToCart') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" id="productId"/>
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}"/>
                        <div class="modal-body">
                            <div class="row m-2">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="Quantity" name="quantity"  placeholder="Quantity" min="1">
                                        <label for="name">Quantity</label>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row m-2" >
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="DPrice" placeholder="Price" disabled>
                                        <input type="hidden" class="form-control" id="Price" >
                                        <label for="Price">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="TotalPrice"   placeholder="Total Price" disabled> 
                                        <input type="hidden" class="form-control" id="TotalPrice" name="total_price">  
                                        <label for="TotalPrice">Total Price</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="addtocart">Add To Cart</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div><!-- End Basic Modal-->

            <script type="text/javascript">
                $(document).on('show.bs.modal','#basicModal', function (e) {
                    var name = $(e.relatedTarget).data('name');
                    var id = $(e.relatedTarget).data('id');
                    var user_id = "{{auth()->user()->id}}";
                    var own_price = "";
                    $.ajax({
						type: 'GET',
						data: {
							user_id: user_id,
                            product_id:id
						},
						url: "{{route('getPrice')}}",
						success: function(data) {
                            own_price = data[0].own_price;
                            $(e.currentTarget).find('#DPrice').val(parseFloat(data[0].own_price, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                            $(e.currentTarget).find('#Price').val(data[0].own_price);
						}
					});

                    $(e.currentTarget).find('.modal-title').text(name);
                    $(e.currentTarget).find('#productId').val(id);

                    $(e.currentTarget).find('#Quantity').on('keyup',function(){
                        var quantity = $(this).val()
                        var TotalPrice = own_price * quantity;
                        $(e.currentTarget).find('#TotalPrice').val(TotalPrice);
                    });
                })

            </script>
@endsection
