@extends('layouts.app')

@section('content')
    <a href="/products" class="btn btn-primary">Go Back</a>  
    <h1>{{$product->title}}</h1>

    <div>
        {!!$product->body!!}
    </div>
    <hr>
    <small>Written on {{$product->created_at}} by {{$product->user->name}}</small>
    <hr>
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