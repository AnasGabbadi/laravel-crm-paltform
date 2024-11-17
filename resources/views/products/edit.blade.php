@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Purchase price</label>
                <input type="text" name="Purchase_price" class="form-control" placeholder="Purchase price" value="{{ $product->Purchase_price }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Selling price</label>
                <input type="text" name="Selling_price" class="form-control" placeholder="Selling price" value="{{ $product->Selling_price }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">product code</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Descriptoin">{{ $product->description }}</textarea>
            </div>
            <div class="col mb-3">
                <label class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo" placeholder= "Photo" value="{{ $product->photo }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{ $product->quantity }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection