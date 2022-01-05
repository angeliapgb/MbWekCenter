@extends('layouts.app')

@section('content')

<div class="container">
    <div class="cart">
        <h2>Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Item Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Sub Total</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <form method="POST"  action="{{ route('cart') }}" class="container-fluid">
                @csrf
                <input id="user_id" type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            </form>
            <tbody>
                <?php $sum = 0; ?>
                @forelse ($cart as $cart)
                    <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cart->title }}</td>
                            <td>{{ $cart->price }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->price*$cart->quantity }}</td>
                            <input type="hidden" value="{{ $sum+=$cart->price*$cart->quantity }}">
                            <td>
                                <form action="{{ route('cartDelete', $cart->id) }}" method="POST">
                                    @csrf
                                    <a href="cart/{{ $cart->id }}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Delete') }}
                                        </button>
                                    </a>
                                </form>
                            </td>
                    </tr>
                    @empty
                        <td id="datanotfound" colspan="6">Your cart is empty ...</td>
                @endforelse
            </tbody>
        </table>
        <p>Grand Total {{ $sum }},-</p>
        @if($cart != null)
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                    <input name="id" type="hidden" value="{{ $cart->id }}">

                    <button type="submit" class="btn btn-primary">
                        {{ __('Checkout') }}
                    </button>
            </form>
        @else
        @endif

    </div>
</div>

@endsection
