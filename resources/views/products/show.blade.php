@extends('layouts.app')
  
@section('title', 'Show Product')
  
@section('contents')
    <h1 class="mb-0">Detail Product</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Purchase price</label>
            <input type="text" name="Purchase_price" class="form-control" placeholder="Purchase price" value="{{ $product->Purchase_price }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Selling price</label>
            <input type="text" name="Selling_price" class="form-control" placeholder="Selling price" value="{{ $product->Selling_price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">product code</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $product->description }}</textarea>
        </div>
        <div class="col">
            <label class="form-label">Photo</label>
            <input  class="form-control" name="photo" placeholder= "Photo" value="{{ $product->photo}}" readonly/>
        </div>
        <div class="col">
            <label class="form-label">Quantity</label>
            <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{ $product->quantity }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product->updated_at }}" readonly>
        </div>
    </div>
@endsection