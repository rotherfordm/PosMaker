@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    @if(count($products) > 0)
        @foreach($products as $product)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/storage/cover_images/{{$product->cover_image}}" alt="Card image cap">
                <div class="card-body">
                <h3><a href="/products/{{$product->id}}">{{$product->name}}</a></h3>
                <small>Created on {{$product->created_at}} by {{$product->user->name}}</small>
                </div>
            </div>
        @endforeach
        {{$products->links()}}
    @else
        <p>No posts found</p>

    @endif
@endsection