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
                    {!! Form::open(['action' => 'AddSupplyController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <ul class="list-group mb-3" id="myList">
                      
                      @foreach($products as $product)
                        <li class="list-group-item list-group-item-action d-flex justify-content-between lh-condensed" onclick="add_product({{$product->id}});">
                            <div>
                              <h6 class="my-0">{{$product->name}}</h6>
                            </div>

                            

                            <input type="text" id="supply{{$product->id}}" value="{{$product->supply}}" disabled="disabled">

                          <span class="text-muted">${{$product->price}}</span>
                        </li>
                      @endforeach
                      
                    </ul>
                    
                    {{Form::submit('Save',['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>


                                
            </div>
          </div>

          <script>

              function add_product(id)
              {
                y = document.getElementById('supply'+id);
                y.value = Number(y.value) + Number(1);
              }

              
          </script>
@endsection