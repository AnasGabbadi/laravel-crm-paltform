@extends('layouts.app')
    
@section('contents')
    <h1 class="mb-0">Edit Order</h1>
    <hr />
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">product_code</label>
                <input type="text" name="product_code" class="form-control" placeholder="product_code" value="{{ $order->product_code }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">customer_first_name</label>
                <input type="text" name="customer_first_name" class="form-control" placeholder="customer_first_name" value="{{ $order->customer_first_name }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">customer_last_name</label>
                <input type="text" name="customer_last_name" class="form-control" placeholder="customer_last_name" value="{{ $order->customer_last_name }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">customer_phone_number</label>
                <input type="text" name="customer_phone_number" class="form-control" placeholder="customer_phone_number" value="{{ $order->customer_phone_number }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">customer_address</label>
                <input type="text" name="customer_address" class="form-control" placeholder="customer_address" value="{{ $order->customer_address }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">customer_city</label>
                <input type="text" name="customer_city" class="form-control" placeholder="customer_city" value="{{ $order->customer_city }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">product_price</label>
                <input type="text" name="product_price" class="form-control" placeholder="product_price" value="{{ $order->product_price }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">product_quantity</label>
                <input type="text" name="product_quantity" class="form-control" placeholder="product_quantity" value="{{ $order->product_quantity }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">order_code</label>
                <input type="text" name="order_code" class="form-control" placeholder="order_code" value="{{ $order->order_code }}">
            </div>
            <div class="col mb-3">
                <div class="col">
                    <label for="">product_condition</label>
                    <select class="form-control" name="product_condition" value="{{ $order->product_condition }}">
                        <option value="{{ $order->product_condition }}">{{ $order->product_condition }}</option>
                        <option value="Confirm">Confirm</option>
                        <option value="Canceled">Canceled</option>
                        <option value="Delivered">Delivered</option>
                        <option value="In_Progress">In Progress</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection