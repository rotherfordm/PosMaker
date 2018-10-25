@extends('layouts.app')

@section('content')
<h3>Points Of Sale</h3>
<table class="table">
    <td>Logo</td>
    <td>Name</td>
    <td>Description</td>
    <td>Created At</td>
    

    @foreach($points_of_sale as $point_of_sale)
    <tr>
        <td>
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="/storage/cover_images/{{$point_of_sale->cover_image}}" alt="Card image cap">
            </div>
        </td>
        <td><a href="pos/{{$point_of_sale->id}}">{{$point_of_sale->name}}</a></td>
        <td><a>{{$point_of_sale->description}}</a></td>
        <td><a>{{$point_of_sale->created_at}}</a></td>

       
    </tr>
    
    @endforeach
</table>
@endsection