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
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
  
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
            </div>
            <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
     
        <br>

    <h1>Create POS Products</h1>
    <input type='button' value='add product' id='addproduct' class="btn btn-primary">
    <input type='button' value='remove product' id='removeproduct' class="btn btn-danger">
    <br><br>
    <div id='products'><!--Dynamic Products are here!--> </div>
    

    <script>

        var products = {};

            //Adds attribute to product
            function makeattribute(product_number)
            {
                //alert(product_number + 'prodnum');
                var attribute_count = 1;
                try{
                attribute_count = products['product'+product_number+'']['attribute_count']; //Get total count    
                } catch(err){
                    alert(err.message);
                }
                x = document.getElementById('productattribute'+product_number+'')
                x.innerHTML = x.innerHTML + "<div id='product"+product_number+"a"+ ++attribute_count +"' >\
                    <br><div class=container> \
                    \
                        <div class=\"input-group input-group-sm mb-3\">\
                            \
                            <div class=\"input-group-prepend\">\
                                <span class=\"input-group-text\" id=\"inputGroup-sizing-sm\">Attribute Name</span>\
                            </div>\
                            <input type=\"text\" class=\"form-control\" aria-label=\"Sizing example input   aria-describedby=\"inputGroup-sizing-sm\">\
                            \
                            \
                            <div class=\"input-group-prepend\">\
                                <span class=\"input-group-text\" id=\"inputGroup-sizing-sm\">Attribute Value</span>\
                            </div>\
                            <input type=\"text\" class=\"form-control\" aria-label=\"Sizing example input   aria-describedby=\"inputGroup-sizing-sm\">\
                        </div>\
                        \
                    </div>\
                    \
                </div>"
                products['product'+product_number+'']['attribute_count'] = attribute_count;
                console.log(products['product'+product_number+'']);
            }

            //Removes attribute to product
            function removeattribute(product_number)
            {
                var attribute_number = products['product '+product_number+' ']['attribute_count'];
                //Remove The HTML
                x = document.getElementById('product' + product_number + attribute_number)
                x.parentNode.removeChild(x);
                //Remove The Attribute in the product JSON
                //delete product['product '+product_number+' '];
            }


            $(document).ready(function(){
                var counter = 1;
                
            
                //Removes attribute from product
                $('body').on('click', '#removeattribute', function ()
                {
                    if(counter==1)
                    {
                        return false;
                    }   
                    --counter;
                    $("#d"+counter).remove();
                });

                //Removes last inserted product
                $("#removeproduct").click(function () 
                {
                    var total_product_count = 0;

                    try{
                        total_product_count = Object.keys(products).length;
                        alert(total_product_count)
                    } catch(err){
                        console.log(err.message);
                    }

                    if(total_product_count==0)
                    {
                        return false;
                    }   
                    
                    
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
                    
                    ++total_product_count;

                    $("#products").html($("#products").html() + "\
                        <div id='product"+total_product_count+"' >\
                        \
                        \
                        <br>\
                        <div class=\"input-group mb-3\">\
                            <div class=\"input-group-prepend\">\
                                <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Product Name</span>\
                            </div>\
                            <input type=\"text\" class=\"form-control\" aria-label=\"Sizing example input\" aria-describedby=\"inputGroup-sizing-default\">\
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
                    console.log(products); 
                });
            
            
             });
            
             function setHiddenInputValue(text, counter){
                $("#value"+counter).val(text);
             }
            
            
            function setType(id, text, counter)
            {
                $(id).text(text);
                setHiddenInputValue(text, counter);
            }
            </script>
@endsection