@extends('layouts.app')

@section('contents')
<h1>Simulator</h1>
<br><br>
<form action="{{ route('orders.display') }}" method="post">
        @csrf

        <div class="row">
          <div class="col mb-3">
            <label for="Barcode">Barcode : </label>
            <input type="text" name="code" class="form-control" placeholder="Enter Barcode for Product" required>
          </div>
        </div>
        <br><br>
        <div class="row">
            <div class="d-grid">
              <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Submit</button></div>
            </div>
        </div>
</form> 
@endsection

