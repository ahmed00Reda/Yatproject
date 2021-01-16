<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Game ;
use App\Models\Image ;

class GameController extends Controller
{
    public function games (){
        $games = game::all() ;
        return view('admin/games',compact("games"));


    }

    public function add_game(Request $request){
        $game = new Game() ;
        $game->name=$request->get('name');
        $game->description=$request->get('description');
        $game->catagory_id=$request->get('catagory_id');
        $game->company_id=$request->get('company_id');
        $game->released_at=$request->get('released');

        
        if($request->hasFile('main_image') )
        {
            $file = $request->file('main_image');
            
            $image_name = time().$file->getClientOriginalName();
            $image_path = 'images/main_images/';
            $file->move($image_path,$image_name); 
            $image = $image_path.$image_name;
            $game->main_image = $image;
        }
        $game->save();

        if($request->hasFile('multiple_images'))
        {
            foreach ($request->file('multiple_images') as $file)
            {
                $image_name = time().$file->getClientOriginalName();
                $image_path = 'images/images'.$game->id.'/';
                $file->move($image_path,$image_name); // upload image to spacific folder on my server
                $image = $image_path.$image_name;
                $multiple_image = new Image();
                $multiple_image->image = $image;
                $multiple_image->game_id = $game->id;
                $multiple_image->save();
            }
            
            
        }

       
    	return back();
        

    }
    public function update_game(Request $request,$game_id){
        $game =  Game::find($game_id) ;
        $game->name=$request->get('name');
        $game->description=$request->get('description');
        $game->catagory_id=$request->get('catagory_id');
        $game->company_id=$request->get('company_id');
        $game->released_at=$request->get('released');

        $game->save();
        return back() ;

    }
    public function delete_game(Request $request,$game_id){
        $game =  Game::find($game_id) ;
        $game->delete();
        if($request->ajax())
        {
            return response()->json(['success'=>'success', 'message'=> 'Deleted Successfully' ]);
        }
        return back() ;

    }
    public function details($game_id)
    {
        $game = Game::find($game_id);
        

        return view('details',compact('game'));
    }

    public function catagory_games ($catagory_id){
        $games = Game::where('catagory_id',$catagory_id)->get();
        return view('display',compact('games'));

    }



    
}
