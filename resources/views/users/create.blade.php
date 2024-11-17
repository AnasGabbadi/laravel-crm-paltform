@extends ('layouts.app')

@section ('title', 'Create User')

@section ('contents')
<h1 class="mb-0">Add User</h1>
    <br><br>
    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf   
        
        <div class="row mb-3">
            <div class="col">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}" >
                @error('name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col">
                <label for="Email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
                @error('email')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col">
                <label for="">Level</label>
                <select id="" class="form-control" name="level">
                    <option value="teamAdmin">TeamAdmin</option>
                    <option value="admin">Admin</option>
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