@extends('layouts.app')

@section('content')

<div class="container">
    <div class="cart">
        <h2>Transaction</h2>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Transaction Time</td>
                    <td>Detail Transaction</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $data) 
                    <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                {{-- <form action="{{ route('transaction') }}" method="POST">
                                    @csrf --}}
                                    <a href="detailtransaction/{{ $data->id }}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Check Detail') }}
                                        </button>
                                    </a>
                                {{-- </form> --}}
                            </td>
                    </tr>
                    @empty
                        <td id="datanotfound" colspan="6">Your cart is empty ...</td>
                @endforelse
            </tbody>
        </table>
        {{-- <p>Grand Total {{ $sum }},-</p> --}}
        {{-- @if($cart != null)
            <form action="" method="POST">
                @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ __('Checkout') }}
                    </button>
            </form>
        @endif --}}
        
    </div>
</div>

@endsection