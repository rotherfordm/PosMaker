
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});




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

        $("#textBoxes").html($("#textBoxes").html() + "\
        <div class='dropdown'>\
        <a class='btn btn-secondary dropdown-toggle' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\
          Pick A Type\
        </a>\
        <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>\          <a class='dropdown-item' onclick='setType(\"#dropdownMenuLink\",\"Text\")' value='textype' id='texttype'>Text</a>\
          <a class='dropdown-item' onclick=\"setType('#dropdownMenuLink','Number')\" id='numbertype'>Number</a>\
        </div>\
        </div>\
        ");

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

    /*
    $("#texttype").click(function () 
    {
        $("#dropdownMenuLink").text("Text");
    }); 

    $("#numbertype").click(function () 
    {
        $("#dropdownMenuLink").text("Number");
    }); */


});

   