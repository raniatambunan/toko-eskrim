@extends('layouts.app')

@section('content')
<h1>Ice Cream Products</h1>
<div class="product-list">
@foreach($products as $product)
<div class="product-item">
<h2>{{ $product->name }}</h2>
<p>{{ $product->description }}</p>
<p>Price: ${{ $product->price }}</p>
<a href="/order/{{ $product->id }}">Order Now</a>
</div>
@endforeach
</div>
@endsection
