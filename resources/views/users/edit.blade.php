@extends('layouts.app')
  
@section('title', 'Edit User')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">email</label>
                <input type="text" name="email" class="form-control" placeholder="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Phone Number </label>
                <input type="text" name="phone_number" class="form-control" placeholder="Phone Number " value="{{ $user->phone_number }}">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Level</label>
                    <select id="" class="form-control" name="level" value="{{ $user->level }}">
                        <option value="{{ $user->level }}">{{ $user->level }}</option>
                        <option value="admin" >Admin</option>
                        <option value="teamAdmin">TeamAdmin</option>
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