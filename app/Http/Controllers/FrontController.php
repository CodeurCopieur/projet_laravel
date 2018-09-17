<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    private $paginate = 5;

    public function index(){
        //$posts = Post::orderByDate()->with('picture', 'category')->limit(2)->get();
        $posts = Post::orderBy('created_at', 'ASC')->take(2)->get();

        return view('front.index', ['posts' => $posts]);

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
        $post = Post::find($id);

        // que vous passez à la vue
        return view('front.show', ['post' => $post]);
    }

    public function showPostStage(){

        $posts= Post::where('post_type','=','stage')->paginate(5); // récupérez les informations liés à l'auteur
        // on récupère tous les livres d'un auteur

        // On passe les livres et le nom de l'auteur
        return view('front.stage', ['posts' => $posts, 'post_type' => 'stage']);

    }

    public function showPostFormation(){

        // on récupère le modèle genre.id 
        $posts= Post::where('post_type','=','formation')->paginate(5); // récupérez les informations liés à l'auteur

        return view('front.formation', ['posts' => $posts, 'post_type' => 'formation']);

    }

}
