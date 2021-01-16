<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users (){
        $users = User::all() ;
        return view('admin/users',compact("users"));


    }
    public function add_user(Request $request){
        $user = new User() ;
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->get('password'));
        $user->role=$request->get('radio');
        $user->save();
        return back() ;
    }

    public function update_user(Request $request , $user_id){
        $user =  User::find($user_id) ;
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=$request->get('password');

        $user->save();
        return back() ;
    }

    public function delete_user(Request $request,$user_id){
        $user =  user::find($user_id) ;
        $user->delete();
        if($request->ajax())
        {
            return response()->json(['success'=>'success', 'message'=> 'Deleted Successfully' ]);
        }
        return back() ;

    }
}
