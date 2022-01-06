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
                            <input type="hidden" value="{{ $cart->id }}" name="transaction_id">
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
        {{-- @if($cart != null) --}}
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                    @foreach ($products as $product)
                        <input type="hidden" value="{{ $product->id }}" name="id">
                    @endforeach
                    <button type="submit" class="btn btn-primary">
                        {{ __('Checkout') }}
                        <?php Session::forget('cart'); ?>
                    </button>
            </form>
        {{-- @else
        @endif --}}

    </div>
</div>

@endsection
