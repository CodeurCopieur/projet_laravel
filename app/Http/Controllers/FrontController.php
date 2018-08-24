<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    protected $paginate = 40;

    public function index(){
        $types = Post::all()->pluck('post_type')->unique();
        $posts = Post::paginate($this->paginate); // pagination 

        return view('front.index', ['posts' => $posts, 'types'=> $types]);

    }
    
   /* public function index(){
        $posts = Post::all();
       return view('front.index', ['posts' => $posts]);
    }*/

    //retourne un livre en fonction  de son identifiant 
   /* public function show(int $id){
        return Post::find($id);
    }*/


    public function show(int $id){

        // vous ne récupérez qu'un seul livre 
        $book = Post::find($id);

        // que vous passez à la vue
        return view('front.show', ['post' => $post]);
    }
}
