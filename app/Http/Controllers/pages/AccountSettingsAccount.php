<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Hash;
use App\Models\User;
use Auth;
use App\Http\Traits\EmailFireTrait;
class AccountSettingsAccount extends Controller
{
  use EmailFireTrait;
  public function index()
  {
    return view('content.pages.pages-account-settings-account');
  }

  public function users(){
    $users = User::where('id' , '!='  , Auth::user()->id)->latest()->get();
   return view('content.tables.tables-basic-users')->with('users' , $users);
 }

  public function NewUser(Request $request){
    if ($request->isMethod('post')) {
      $all_data = $request->all();
      // return $all_data;
    // return $all_data;
      $request->validate([
        
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role' => 'required' 
      
       
    ]);
    if(User::where('email' , 'like' , $request->email)->first()){
      return redirect()->back()->with('error' , 'Email Address Already Assigne To Another User');
    }
    if($request->hasFile('image')){
      $image_file = $request->file('image');
      $image_file_name = time().$image_file->getClientOriginalName();
      $image_file->move('uploads/users/images/' , $image_file_name);
      $all_data['image'] = '/uploads/users/images/'. $image_file_name;

    }
    $all_data['password'] = Hash::make($request->password);
      $user = User::create($all_data);
      try{
      $this->fire($user->email , "Your Account Creation" , "YOU HAVE AN ACCOUNT UMBRELLA CRM BOARD ! with Email : .'$user->email'. - Password : .'$request->password'. ");
      }catch(\Exception $ex){
          return $ex;
      }

      return redirect()->route('pages-users')->with('success' , 'New User Added Successfully...');;
    }else{
      return view('content.pages.pages-account-settings-new-user')->with('roles' , Role::latest()->get());
    } 
  }


  public function EditUser(Request $request , $user_id){
    $_user = User::find($user_id);
    if ($request->isMethod('post')) {
      $all_data = $request->all();
    // return $all_data;
      $request->validate([
        
        'name' => 'required',
        'email' => 'required',
        'role' => 'required' 
      
       
    ]);
    if($request->hasFile('image')){
      $image_file = $request->file('image');
      $image_file_name = time().$image_file->getClientOriginalName();
      $image_file->move('uploads/users/images/' , $image_file_name);
      $all_data['image'] = '/uploads/users/images/'. $image_file_name;

    }

    if($request->password){
      $all_data['password'] = Hash::make($request->password);
   }else{
     $all_data['password'] = $_user->password;
   }
    
      $_user->update($all_data);
      return redirect()->route('pages-users')->with('success' , ' User Updated Successfully...');;
      }else{
      return view('content.pages.pages-account-settings-new-user-edit')->with(['roles' => Role::latest()->get() , 'user' => $_user ]);
    } 
  }

  public function DeleteUser($user_id){
    $user = User::find($user_id)->delete();
    return redirect()->route('pages-users')->with('success' , ' User Deleted Successfully...');;
  }

}
