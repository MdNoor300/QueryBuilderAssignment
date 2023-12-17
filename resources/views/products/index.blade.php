
@extends('layouts.app')

@section('content')
    <h1>Product List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No products available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
