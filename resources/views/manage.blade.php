@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

<div class="container">
    <div class="manage-user">
        <table class="table">
            <thead>
                <tr>
                    <td>User ID</td>
                    <td>Username</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $data)
                    <tr>
                        @if ($data->name != 'Admin')
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <form action="{{ route('deleteUser') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$data->id}}" name="id">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    @empty
                        <td id="datanotfound" colspan="6">No user found ...</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
