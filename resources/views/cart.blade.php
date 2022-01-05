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
            <tbody>
                @forelse ($cart as $cart) 
                    <form method="POST"  action="{{ route('cart') }}" class="container-fluid">
                        @csrf
                        <input id="user_id" type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                    </form>
                    <tr>
                        {{-- @if ($cart->name != 'Admin') --}}

                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $cart->product->title }}</td>
                            <td>{{ $cart->product->price }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->product->price*$cart->quantity }}</td>
                            <td>
                                {{-- belum dibenerin --}}
                                <form action="{{ route('deleteUser') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$cart->id}}" name="id">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        {{-- @endif --}}
                    </tr>
                    @empty
                        {{-- <td id="datanotfound" colspan="2">No user found ...</td> --}}
                @endforelse
            </tbody>
        </table>
        {{-- belum itung grand total --}}
        {{-- <p>Grand Total {{ $cart->sum($cart->product->price*$cart->quantity) }},-</p> --}}
        {{-- belum routing checkout --}}
        <form action="" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ __('Checkout') }}
            </button>
        </form>
    </div>
</div>

@endsection