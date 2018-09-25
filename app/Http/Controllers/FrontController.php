<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Post;

class FrontController extends Controller
{
    private $paginate = 6;

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

        $posts= Post::where('post_type','=','stage')->where('publication','=','publier')->paginate(6); // récupérez les informations liés à l'auteur
        // on récupère tous les livres d'un auteur

        // On passe les livres et le nom de l'auteur
        return view('front.stage', ['posts' => $posts, 'post_type' => 'stage']);

    }

    public function showPostFormation(){

        // on récupère le modèle genre.id 
        $posts= Post::where('post_type','=','formation')->where('publication','=','publier')->paginate(6); // récupérez les informations liés à l'auteur

        return view('front.formation', ['posts' => $posts, 'post_type' => 'formation']);

    }

    public function searchPost(Request $request){
        $query = $request->search;

        $posts = Post::where('title', 'LIKE', '%' . $query . '%')
        ->orWhere('description', 'LIKE', '%' . $query . '%')
        ->orWhere('post_type', 'LIKE', '%' . $query . '%')
        ->paginate(10);

    return view('front.search', ['posts' => $posts]); 
    }

    public function formContact(){
        return view('front.create');
    }

    public function store(ContactRequest $request){

        $mailable = new ContactMessageCreated($request->name, $request->email, $request->message);
        Mail::to(config('projet.admin_support_email'))->send($mailable);

        flashy('Nous vous répondrons dans les plus brefs délais !');

        return redirect()->route('contact');
    }

}
