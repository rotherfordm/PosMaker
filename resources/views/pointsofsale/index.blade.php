@extends('layouts.app')

@section('content')
<h3>Points Of Sale</h3>
<table class="table">
    <td>Name</td>

    @foreach($points_of_sale as $point_of_sale)
    <tr>
        <td>{{$point_of_sale->name}}</td>
    </tr>
    
    @endforeach
</table>
@endsection