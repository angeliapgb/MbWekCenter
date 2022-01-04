@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')
<div class="detail container-fluid">
    @foreach ($details as $det)
        <img src="{{ $det->image }}" style="width: 20vw; height: 50vh;" alt="">
        <h2 style="margin: 3vh 0">{{ $det->title }}</h2>
        <h5 style="margin: 0 0 3vh 0">Description: <br>{{$det->description}}</h5>
        <h5 style="margin: 0 0 3vh 0">Stock: <br>{{$det->stock}} piece(s)</h5>
        <h5 style="margin: 0 0 3vh 0">Price: <br> Rp. {{$det->price}}</h5>
    @endforeach
</div>
@if ( Auth::guest() )
@else
    @if ( Auth::user()->name != 'Admin' )
        <form action="/cart" class="container-fluid">
            <h3>Add To Cart</h3>
            <div class="addcart d-flex justify-content-evenly">
                <label class="form-label" style="margin:0 5%;">Quantity: </label>
                <input type="text" name="quantity" class="form-control" style="width: 50%; margin:0 2%;">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
@endif

@endsection