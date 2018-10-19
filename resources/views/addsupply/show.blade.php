@extends('layouts.app')

@section('content')

<script>
    var x = 1;     
    
    function add_product_id(id)
    {
        y = document.getElementById('productid');
        y.name = 'productid' + x;
        y.value = id;
        y.id = "";
      
        z = document.getElementsByName('supplyq'+x)
        //alert(z.value)
        x++;
    }

    function add_product(id)
    {
       var x = Number(document.getElementById('supply'+id).value) + Number(1)
       document.getElementById('supply'+id).setAttribute("value", x);
    }

</script>



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
                      <span class="badge badge-secondary badge-pill"></span>
                    </h4>

                    {!! Form::open(['action' => 'AddSupplyController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    <ul class="list-group mb-3" id="myList">

                      @foreach($products as $product)
                      <input type="hidden" id="productid" value="">
                      <input id="supply{{$product->id}}" value="" name="supplyq{{$product->count}}" placeholder="Quantity">  

                      <li class="list-group-item list-group-item-action d-flex justify-content-between lh-condensed" onclick="add_product({{$product->id}});">
                          
                          <div>
                              <h6 class="my-0">{{$product->name}}</h6>
                            </div>

                                <script>
                                  
                                  add_product_id({{$product->id}});
                                
                                </script>
                            
                          <span class="text-muted">${{$product->price}}</span>

                        </li>
                        <br>
                      @endforeach
                      
                    </ul>
                    
                    {{Form::submit('Save',['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>

            </div>
          </div>

          
@endsection