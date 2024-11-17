@extends('layouts.app')
 
@section('contents')
    <h1 class="mb-0">Profile</h1>
    <br><br>
    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="" >
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="row" id="res"></div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="first name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">E-mail</label>
                        <input type="text" name="email" désactivé class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                    </div> 
                </div>
                <br><br>
                <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Enregistrer le profil</button></div>
            </div>
        </div>
    </div>  
        </form>
@endsection