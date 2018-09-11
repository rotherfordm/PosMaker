@extends('layouts.app')

@section('content')
    <a href="/products" class="btn btn-primary">Go Back</a>  
    <h1>{{$product->name}}</h1>
    
    <h3>Attributes</h3>
    <table class="table">
        
            <td>Type</td>
        
            
            <td>Name</td>
    
        @foreach($attributes as $attribute)
        <tr>
            <td>{{$attribute->type}}</td>
        
            
        
            <td>{{$attribute->name}}</td>
        </tr>
        
        @endforeach
    </table>

    <hr>
    <!--
    <small>Written on {{$product->created_at}} by {{$product->user->name}}</small> -->
    @if(!Auth::guest())
        @if(Auth::user()->id == $product->user_id)
            <a href="/products/{{$product->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                {{Form::hidden('_method', 'Delete')}}
                {{Form::submit('Delete', ['class'=>"btn btn-danger"])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection