<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserCreateRequest;    
use App\Models\User;
class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $user = User::findOrFail(Auth::user()->id);
   
       $users = User::where('Team_Id',(string)Auth::user()->id)->get();
       if ($user->level === 'admin' ) {
           
           $user = User::whereIn('level', ['teamAdmin','admin'])->orderBy('created_at', 'DESC')->get();
           return view('users.index',compact('users'));
           
       } else {
           return abort(403, 'YOU DON T HAVE PERMISSION.');
       }
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\View\View
    */
   public function create()
   {
       return view('users.create');
   }

  
   public function store(UserCreateRequest $request):RedirectResponse
   {   
       $data = $request->validated();
       $data['Team_Id']= Auth::user()->id;
       $data['user_id'] = Auth::user()->id;
       $data['password'] = Hash::make($data['password']);
       $user = User::create($data);
       return redirect()->route('users')->with('success', 'User added successfully');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $user = User::findOrFail($id);
       return view('users.show',compact('user'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $user = User::findOrFail($id);
       return view('users.edit', compact('user'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $user = User::findOrFail($id);
       $user->update($request->all());
       return redirect()->route('users')->with('success', 'user updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $user = User::findOrFail($id);
       $user->delete();
       return redirect()->route('users')->with('success', 'user deleted successfully');
   }
}
