@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<h1>Create Point Of Sale</h1>
{!! Form::open(['action' => 'PointsOfSaleController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
               Logo Image: {{Form::file('cover_image')}}
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
            </div>
            <input id="pos_name" name="pos_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
  
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
            </div>
            <textarea id="description" name="description" class="form-control" aria-label="With textarea"></textarea>
        </div>
     
        <br>

    <h1>Create POS Products</h1>
    <input type='button' value='add product' id='addproduct' class="btn btn-primary">
    <input type='button' value='remove product' id='removeproduct' class="btn btn-danger">
    <br><br>
    <div id='products'><!--Dynamic Products are here!--> </div>
    
    <br>
    <br>
    {{Form::submit('Create Point of Sale',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <script>

        var products = {};

            //Adds attribute to product
            function makeattribute(product_number)
            {
                //alert(product_number + 'prodnum');
                var attribute_count = 0;
                try{
                attribute_count = products['product'+product_number+'']['attribute_count']; //Get total count    
                } catch(err){
                    alert(err.message);
                }
                x = document.getElementById('productattribute'+product_number+'')
                if(attribute_count == null) {attribute_count = 0; }
                //alert(attribute_count);
                x.innerHTML = x.innerHTML + "<div id='product"+product_number+"a"+attribute_count +"' >\
                    <br><div class=container> \
                    \
                        <div class=\"input-group input-group-sm mb-3\">\
                            \
                            <div class=\"input-group-prepend\">\
                                <span class=\"input-group-text\" id=\"inputGroup-sizing-sm\">Attribute Name</span>\
                            </div>\
                            <input name='product"+product_number+"a"+attribute_count +"name' type=\"text\" class=\"form-control\" aria-label=\"Sizing example input   aria-describedby=\"inputGroup-sizing-sm\">\
                            \
                            \
                            <div class=\"input-group-prepend\">\
                                <span class=\"input-group-text\" id=\"inputGroup-sizing-sm\">Attribute Value</span>\
                            </div>\
                            <input name='product"+product_number+"a"+attribute_count +"value' type=\"text\" class=\"form-control\" aria-label=\"Sizing example input   aria-describedby=\"inputGroup-sizing-sm\">\
                        </div>\
                        \
                    </div>\
                    \
                </div>"
                ++attribute_count;
                products['product'+product_number+'']['attribute_count'] = attribute_count;
                console.log(products['product'+product_number+'']);
            }

            //Removes attribute to product
            function removeattribute(product_number)
            {
                //TODO fix this
                var attribute_number = 0;
                try{
                    attribute_number = products['product'+product_number+'']['attribute_count'];
                } catch(err){
                    alert(err.message);
                }
                --attribute_number;
                //alert(attribute_number);
                if(attribute_number >= 0)
                {
                    //Remove The HTML
                    x = document.getElementById('product'+product_number+'a'+attribute_number+'');
                    x.parentNode.removeChild(x);

                    //Minus The Count in the product JSON
                    //attribute_number = attribute_number - 1;
                    console.log(attribute_number);
                    products['product'+product_number+'']['attribute_count'] = attribute_number;
                }
                else{
                    return false;
                }
                
            }


            $(document).ready(function(){
                var counter = 1;
                
                //Removes last inserted product
                $("#removeproduct").click(function () 
                {
                    var total_product_count = 0;

                    try{
                        total_product_count = Object.keys(products).length;
                    } catch(err){
                        console.log(err.message);
                    }

                    if(total_product_count < 0)
                    {
                        return false;
                    }   
                    
                    total_product_count--;
                    //Remove In the Html
                    $("#product"+total_product_count).remove();
                    //Remove In the products JSON
                    delete products['product'+total_product_count+''];
                    console.log('deleting');
                    console.log(products);
                });

                //Adds input for custom products
                $("#addproduct").click(function () 
                {
                    var total_product_count = 0;
                    try{
                        total_product_count = Object.keys(products).length;
                    } catch(err){
                        console.log(err.message);
                    }
                    
                    

                    $("#products").html($("#products").html() + "\
                        <div id='product"+total_product_count+"' >\
                        \
                        \
                        <br>\
                        <div class=\"input-group mb-3\">\
                            <div class=\"input-group-prepend\">\
                                <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Product Name</span>\
                            </div>\
                            <input name='product"+total_product_count+"' type=\"text\" class=\"form-control\" aria-label=\"Sizing example input\" aria-describedby=\"inputGroup-sizing-default\">\
                        </div> \
                        \
                        \
                        <input type='button' value='add attributes' onclick='makeattribute("+total_product_count+");'  class=\"btn btn-primary\">\
                        \
                        \
                        <input type='button' value='remove attributes' onclick='removeattribute("+total_product_count+");'  class=\"btn btn-danger\">\
                        <br>\
                        \
                        \
                        <div id='productattribute"+total_product_count+"'></div>\
                        \
                        \
                        </div>\
                    ");
                    
                    products['product'+total_product_count+''] = { 'attribute_count': 0 };
                    ++total_product_count;
                    console.log(products); 
                });
            
            
             });
        
            </script>
@endsection