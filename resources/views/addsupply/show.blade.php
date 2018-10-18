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
                      <span class="text-muted">Your Products - Click to Add Supply</span> 
                      <span class="badge badge-secondary badge-pill">0</span>
                    </h4>

                    <ul class="list-group mb-3" id="myList">
                      
                      @foreach($products as $product)
                        <li class="list-group-item list-group-item-action d-flex justify-content-between lh-condensed" >
                            <div>
                              <h6 class="my-0">{{$product->name}}</h6>
                            </div>
                          <span class="text-muted">${{$product->price}}</span>
                        </li>
                      @endforeach
                      
                    </ul>
                    
                </div>


                                
            </div>
          </div>

        <script>
              
        </script>
    
@endsection