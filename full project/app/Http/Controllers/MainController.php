<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Models\Game ;
use App\Models\Company;

class MainController extends Controller
{
    


    public function admin()
    {
        $counter_user = User::where('role',0)->count();
        $counter_admin = User::where('role',1)->count();
        $counter_game = Game::count();
        $counter_catagory = Catagory::count();
        $counter_company = Company::count();
    	return  view('admin.admin',compact('counter_user','counter_game','counter_company','counter_catagory','counter_admin'));
    }
    public function catagories(){
        $catagories = Catagory::all();
        return view('catagories',compact("catagories"));

    }


}
