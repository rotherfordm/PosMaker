@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="text-left">
              <h2>Buying Transaction</h2>
                <div class="card align-self-center" style="width: 18rem;">
                    <img class="card-img-top" src="/storage/cover_images/{{$point_of_sale->cover_image}}" alt="Card image cap">
                </div>
                <br><br>
              <h4 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">POS NAME: {{$point_of_sale->name}}</span> 
                <h4 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">POS DESCRIPTION: {{$point_of_sale->description}}</span> 
            </div>


            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">

                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-muted">Your Products</span> 
                      <span class="badge badge-secondary badge-pill"></span>
                    </h4>

                    <ul class="list-group mb-3">
                      
                      @foreach($products as $product)
                        <li class="list-group-item list-group-item-action d-flex justify-content-between lh-condensed" onclick="add_product({{$product}});">
                            <div>
                              <h6 class="my-0">{{$product->name}}</h6>
                            </div>
                          <span class="text-muted">${{$product->price}}</span>
                        </li>
                      @endforeach
                      
                    </ul>
                    
                </div>

                
                
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Cart</span> <span class="badge badge-secondary badge-pill"><div id='cart_count'>0</div></span></h4>
                    <ul class="list-group mb-3">
                          
                      {!! Form::open(['action' => 'BuyingTransactionController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                      <div id='cart'>
        
                      </div>
                      
                     {{Form::submit('Checkout ',['class' => 'btn btn-primary'])}}
                     {!! Form::close() !!}
                    
                    </ul>

                  

                </div>
                
            </div>
          </div>
    
          <script>
              var cart_count = 0;
              
              function add_product(product)
              {
                cart_count++;
                y = document.getElementById('cart_count');
                y.innerHTML = cart_count;

                x = document.getElementById('cart');
                x.innerHTML = x.innerHTML + "\
                <li class=\"list-group-item d-flex justify-content-between lh-condensed\">\
                          <div>\
                          <input type=\"hidden\" name='cartproduct"+cart_count+"' id='cartproduct"+cart_count+"' value="+product.id+">\
                            <h6 class=\"my-0\">"+product.name+"</h6>\
                          </div>\
                          <span  class=\"text-muted\">"+product.price+"</span>\
                      </li>\
                      \
                      \
                      <div class=\"input-group mb-3\">\
                  <div class=\"input-group-prepend\">\
                    <span class=\"input-group-text\" id=\"basic-addon1\">Quantity</span>\
                  </div>\
                  <input name='cartproduct"+cart_count+"amount' type=\"text\" class=\"form-control\" placeholder=\"Enter Amount\" \aria-label=\"Username\" aria-describedby=\"basic-addon1\">\
                </div>\
                ";
              }
          </script>
@endsection