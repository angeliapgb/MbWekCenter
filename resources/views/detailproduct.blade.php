@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')
<div class="detail container-fluid">
    @foreach ($details as $det)
        <div class="detail-image">
            <img src="{{ Storage::url($det->image) }}" style="width: 20vw; height: 50vh;" alt="">
        </div>
        <div class="detail-info">
            <h2 style="margin: 3vh 0">{{ $det->title }}</h2>
            <h5 style="margin: 0 0 3vh 0;">Description:
                <h5 style="background-color:#f0f0f0; border:#e5e6e8 1px solid; padding: 3%;">{{$det->description}}</h5>
            </h5>
            <h5 style="margin: 0 0 3vh 0">Stock: <br>{{$det->stock}} piece(s)</h5>
            <h5 style="margin: 0 0 3vh 0">Price: <br> Rp. {{$det->price}}</h5>
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
                            <input id="quantity" type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" style="margin:0 2%;">
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="add-to-cart">
                            <button type="submit" class="btn btn-primary" style="padding: 2% 10%;">Submit</button>
                        </div>
                    </form>
                @endif
            @endif
        </div>
    @endforeach
</div>

@endsection
