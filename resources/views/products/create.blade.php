@extends ('layouts.app')

@section ('title', 'Create Product')

@section ('contents')
    <h1 class="mb-0">Add Product</h1>
    <br><br>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf   
        <div class="row mb-3">
            <div class="col">
                <label for="Title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col">
                <label for="Price">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <label for="Quantity">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
            </div>
            <div class="col">
                <label for="Barcode">Barcode</label>
                <input type="text" name="barcode" class="form-control" placeholder="Barcode">
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <label for="Photo">Photo</label>
                <input type="file" class="form-control" name="photo" placeholder= "Photo"> </input>
            </div>
        </div> 
        <br><br>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection