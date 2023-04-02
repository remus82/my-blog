<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     
   public function index() {
       
    // get all the users
     $users = Users::all();

     // load the view and pass the users
     return View::make('users.index')
         ->with('users', $users);
    
    
    
}
public function create() {
   // load the create form (views/users/create.blade.php)
     return View::make('users.create');
}
public function store(Request $request) {
         // store
         $user = new User;
         $user->name       = Input::get('name');
         $user->email      = Input::get('email');
         $user->password      = Input::get('password');
         $user->save();

         // redirect
         Session::flash('message', 'User successfully created!');
         return Redirect::to('users');
}
public function show($id) {
  // get the user
     $user = User::find($id);

     // show the view and pass the user to it
     return View::make('users.show')
         ->with('user', $user);
}
public function edit($id) {
  // get the user
     $user = User::find($id);

     // show the edit form and pass the user
     return View::make('users.edit')
         ->with('user', $user);
}
public function update($id) {
         // store
         $nerd = User::find($id);
         $user->name       = Input::get('name');
         $user->email      = Input::get('email');
         $user->password      = Input::get('password');
         $user->save();

         // redirect
         Session::flash('message', 'User successfully updated!');
         return Redirect::to('users');
}
public function destroy($id) {
         // delete
         $user = User::find($id);
         $user->delete();
     
     // redirect
         Session::flash('message', 'User successfully deleted!');
         return Redirect::to('users');
}

}
