@extends('layouts.app')
  
@section('title', 'Show Orders')
  
@section('contents')
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Customer</label>
            <input type="text" name="Customer" class="form-control" placeholder="Title" value="{{ $order->customer_first_name }} {{ $order->customer_last_name }} {{ $order->customer_phone_number }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Recipient</label>
            <input type="text" name="Recipient" class="form-control" placeholder="Title" value="{{ $order->customer_city }} {{ $order->customer_address }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="Price" class="form-control" placeholder="Title" value="{{ $order->product_price }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" name="Quantity" class="form-control" placeholder="Title" value="{{ $order->product_quantity }} {{ $order->product_quantity }}" readonly>
        </div>
    </div>  
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $order->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $order->updated_at }}" readonly>
        </div>
    </div>
@endsection