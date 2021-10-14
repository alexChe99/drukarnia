<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direction;
use App\Models\Member;
use App\Models\Event;
use App\Models\Partner;
use App\Post;


class MainController extends Controller
{

    
    public function home(){
        date_default_timezone_set('Europe/Kiev');
        $date = date('Y-m-d ');
        $time = date('h:i');
        $direction = Direction::all();
        $member = Member::all();
        $post = Post::all();
        $partner = Partner::all();
       
        $event = Event::where([
            ['data', '>', $date],
            ['time', '>', $time],
          ])->get();
      
        return view('home', ['directions'=>$direction, 'members'=>$member, 'posts'=>$post, 'events'=>$event, 'partners'=>$partner]);
     }

     public function publications(){ 
        $post = Post::all();
        return view('publications', ['posts'=>$post] );
     }

     public function events(){ 
        $event = Event::all();
        return view('events', ['events'=>$event] );
     }

     public function getPost($id_post){
       $blogpost = Post::where('id', '!=', $id_post)->get();
         $cpost=Post::where('id', $id_post)->first();
         
         event('postHasViewed', $cpost);
         return view('show-post', ['post'=>$cpost, 'blogposts'=>$blogpost] );
     }

    
}
