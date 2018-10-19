@extends('layouts.app')

@section('content')
    <h3>POSMAKER</h3>
    <table class="table">
        <tr>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/storage/cover_images/{{$point_of_sale->cover_image}}" alt="Card image cap">
                <div class="card-body">
                </div>
            </div>
        </tr>


        <tr><td>Point of Sale Name: {{$point_of_sale->name}}</td></tr>
        <tr><td>Point of Sale Description: <br> {{$point_of_sale->description}}</td></tr>
        <tr><td>Point of Sale Created At: {{$point_of_sale->created_at}}</td></tr>
        

    </table>
        <a href="/addsupply/{{$point_of_sale->id}}" class="btn btn-primary">Add Supply</a>
        <a href="/buyingtransactions/{{$point_of_sale->id}}" class="btn btn-primary">Add Transaction</a>

        <br><br>
        Product List:
        @foreach($products as $product)
            <ul class="list-group">
                <li class="list-group-item">Product Name: {{$product['ProductName']}}</li>
                <li class="list-group-item">Product Price: {{$product['ProductPrice']}}</li>
                <li class="list-group-item">Current Supply: {{$product['CurrentSupply']}}</li>
                @foreach($product['Attributes'] as $attribute )
                    <li class="list-group-item">Attribute: {{$attribute->name}}</li>
                @endforeach
            </ul>
            <br>
        @endforeach

@endsection