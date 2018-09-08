@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <h1>Create Product</h1>
    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('product', 'Product')}}
            {{Form::text('product', '', ['class' => 'form-control', 'placeholder' => 'Product'])}}
        </div>
        <div class="form-group">
            </div>
            <div class="form-group">
                    {{Form::file('cover_image')}}
            </div>

            <div id='textBoxes'>
                <div id='d1' >
                    <label for="t1"> Attribute 1</label>
                    <input class="form-control" type='textbox' id='t1' />

                    <div class='dropdown'>
                            <a class='btn btn-secondary dropdown-toggle' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                              Pick A Type
                            </a>
                          
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                              <a class='dropdown-item' onclick='setType("#dropdownMenuLink","Text")' value='textype' id='texttype'>Text</a>
                              <a class='dropdown-item' onclick="setType('#dropdownMenuLink','Number')" id='numbertype'>Number</a>
                            </div>
                    </div>
                </div>

                    
            </div>
            <input type='button' value='add' id='add' class="btn btn-primary">
            <input type='button' value='remove' id='remove' class="btn btn-primary">
            <br>
            <br>
           {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
           {!! Form::close() !!}

<script>
    function setType(id, text){
    $(id).text(text);

$(document).ready(function(){

var counter = 2;
$("#add").click(function () 
{
// var onclickCmd1 = 'onclick="setType('#dropdownMenuLink','Text')"';
    //var onclickCmd2 = 'onclick="setType('#dropdownMenuLink','Number')"';

    if(counter==20)
    {
        alert("Too many Attributes");
        return false;
    }   
    /*
    $("#textBoxes").html($("#textBoxes").html() + "<div id='d"+counter+"' >\
    <label for='t2'> Attribute "+counter+"</label>\
    <input class='form-control' type='textbox' id='t"+counter+"' ></div>\n");
    ++counter;*/

/*
    $("#textBoxes").html($("#textBoxes").html() + "\
    <div id='d"+counter+"' >\
        <label for='t2'> Attribute "+counter+"</label>\
        <input class='form-control' type='textbox' id='t"+counter+"' >\
        \
        <div class='dropdown'>\
            <a class='btn btn-secondary dropdown-toggle' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\
                Pick A Type\
            </a>\
            <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>\          \
                <a class='dropdown-item' onclick='setType(\"#dropdownMenuLink"+counter+"\",\"Text\")' value='textype' id='texttype'>Text</a>\
                <a class='dropdown-item' onclick=\"setType('#dropdownMenuLink"+counter+"','Number')\" id='numbertype'>Number</a>\
            </div>\
        </div>\
    </div>\
    ");*/

    alert(counter);
    $("#textBoxes").html($("#textBoxes").html() + "\
    <div id='d"+counter+"' >\
        <div class='dropdown'>\
            <a class='btn btn-secondary dropdown-toggle' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\
                Pick A Type\
            </a>\
            <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>\          \
                <a class='dropdown-item' onclick='setType(\"#dropdownMenuLink"+counter+"\",\"Text\")' value='textype' id='texttype'>Text</a>\
                <a class='dropdown-item' onclick=\"setType('#dropdownMenuLink"+counter+"','Number')\" id='numbertype'>Number</a>\
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


}
</script>

@endsection