@extends('layouts.app')
  
@section('contents')
    <h1 class="mb-0">Detail Product</h1>
    <hr />
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">email</label>
                <input type="text" name="email" class="form-control" placeholder="email" value="{{ $user->email }}" readonly>
            </div>
            <div class="col">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone_number " class="form-control" placeholder="Phone Number " value="{{ $user->phone_number }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">level</label>
                <input type="text" name="level" class="form-control" placeholder="level" value="{{ $user->level }}" readonly>
            </div>
        </div>
        <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $user->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $user->updated_at }}" readonly>
        </div>
    </div>
@endsection