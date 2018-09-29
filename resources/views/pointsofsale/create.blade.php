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

            //Adds attribute to product
            function makeattribute(id)
            {
                x = document.getElementById('attributes' + id)
                x.innerHTML = x.innerHTML + "<div id='attribute"+id+"' >\
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
            }

            //Removes attribute to product
            function removeattribute(id)
            {
                x = document.getElementById('attribute' + id)
                x.parentNode.removeChild(x);
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
                    if(counter==1)
                    {
                        return false;
                    }   
                    --counter;
                    $("#p"+counter).remove();
                });

                //Adds input for custom products
                $("#addproduct").click(function () 
                {
                    $("#products").html($("#products").html() + "\
                    <div id='p"+counter+"' >\
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
                    <input type='button' value='add attributes' onclick='makeattribute("+counter+");' id='addattribute' class=\"btn btn-primary\">\
                    \
                    \
                    <input type='button' value='remove attributes' onclick='removeattribute("+counter+");' id='addattribute' class=\"btn btn-danger\">\
                    <br>\
                    \
                    \
                    <div id='attributes"+counter+"'></div>\
                    \
                    \
                    </div>\
                    ");
                    ++counter; 
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