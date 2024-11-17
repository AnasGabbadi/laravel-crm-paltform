@extends ('layouts.app')

@section ('contents')
    <h1 class="mb-0">Add Order</h1>
    <br><br>
    <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
        @csrf   
        <div class="row mb-3">
            <div class="col">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" placeholder="First Name">
            </div>
            <div class="col">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
            </div>
            <div class="col">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <label for="City">City</label>
                <input type="text" name="city" class="form-control" placeholder="City">
            </div>
            <div class="col">
                <label for="Quantity">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
            </div>
        </div> 
        <br>
        <div class="row mb-3">
            <div class="col">
                <label for="Barcode">Barcode</label>
                <input type="text" name="barcode" class="form-control" placeholder="Barcode">
            </div>
            <div class="col">
                <label for="Condition">Condition</label>
                <select class="form-control" name="condition">
                    <option value="Confirmed ">Confirmed</option>
                    <option value="Canceled">Canceled</option>
                    <option value="Delivered">Delivered</option>
                    <option value="In_Progress">In Progress</option>
                </select>
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