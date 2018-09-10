@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <h1>Create Product</h1>
    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('product', 'Product')}}
            {{Form::text('product_name', '', ['class' => 'form-control', 'placeholder' => 'Product Name'])}}
        </div>
        <div class="form-group">
            </div>
            <div class="form-group">
                    {{Form::file('cover_image')}}
            </div>

            <div id='textBoxes'>
          
            </div>
            
            <input type='button' value='add' id='add' class="btn btn-primary">
            <input type='button' value='remove' id='remove' class="btn btn-primary">
            <br>
            <br>
           {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
           {!! Form::close() !!}

<script>




$(document).ready(function(){
    var counter = 1;

    $("#add").click(function () 
    {
        if(counter==20)
        {
            alert("Too many Attributes");
            return false;
        }   
        
        $("#textBoxes").html($("#textBoxes").html() + "\
        <div id='d"+counter+"' >\
            <label for='t"+counter+"'> Attribute "+counter+"</label>\
            <input class='form-control' placeholder='Attribute Name' type='textbox' name='t"+counter+"' id='t"+counter+"' \>\
            \
            <div class='dropdown'>\
                <a class='btn btn-secondary dropdown-toggle' role='button' name='dropdownMenuLink"+counter+"' id='dropdownMenuLink"+counter+"' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\
                    Pick A Type\
                </a>\
                <input type=\"hidden\" name='value"+counter+"' id='value"+counter+"'>\
                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink"+counter+"'>\          \
                \
                    <a class='dropdown-item' onclick='setType(\"#dropdownMenuLink"+counter+"\",\"Text\","+counter+")' value='texttype' id='texttype"+counter+"'>Text</a>\
                    <a class='dropdown-item' onclick=\"setType('#dropdownMenuLink"+counter+"','Number',"+counter+")\" id='numbertype"+counter+"'>Number</a>\
                </div>\
            </div>\
        </div>\
        ");
        ++counter; 
    });

    $("#remove").click(function () 
    {
        if(counter==1)
        {
            return false;
        }   
        --counter;
        $("#d"+counter).remove();
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