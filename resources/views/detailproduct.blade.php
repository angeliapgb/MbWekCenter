@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')
<div class="detail container-fluid">
    @foreach ($details as $det)
        <img src="{{ Storage::url($det->image) }}" style="width: 20vw; height: 50vh;" alt="">
        <h2 style="margin: 3vh 0">{{ $det->title }}</h2>
        <h5 style="margin: 0 0 3vh 0">Description: <br>{{$det->description}}</h5>
        <h5 style="margin: 0 0 3vh 0">Stock: <br>{{$det->stock}} piece(s)</h5>
        <h5 style="margin: 0 0 3vh 0">Price: <br> Rp. {{$det->price}}</h5>
    @endforeach
</div>
@if ( Auth::guest() )
@else
    @if ( Auth::user()->name != 'Admin' )
        <form method="POST"  action="{{ route('detailproduct', $det->title) }}" class="container-fluid">
            @csrf
            <h3>Add To Cart</h3>
            <input id="product_id" type="hidden" value="{{ $det->id }}" name="product_id">
            <input id="user_id" type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            <div class="addcart d-flex justify-content-evenly">
                <label class="form-label" style="margin:0 5%;">Quantity: </label>
                <input id="quantity" type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" style="width: 50%; margin:0 2%;">
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
@endif

@endsection
