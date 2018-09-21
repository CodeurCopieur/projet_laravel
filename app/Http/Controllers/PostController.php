<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('picture','category')->paginate(10);
        return view('back.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //permet de récuperer une collection type array avec en clé id => name
         $categories = Category::pluck('name', 'id')->all();
 
         return view('back.post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'post_type' => 'required',
            'description' => 'required|string',
            'date_debut' => 'date',
            'date_fin' => 'date',
            'prix' => 'integer',
            'max_eleves' => 'integer',
            'publication' => 'in:publier,unpublished',
            'picture' => 'image|max:5000',
        ]);

        $post = Post::create($request->all());

       /* $link = $request->file('picture')->store('./');

        $post->picture()->create([
            'link' => $link,
            'title' => 'No title'
        ]);*/

        return redirect()->route('post.index')->with('message', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('back.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);//Found id of the post and give it to the route
        $categories = Category::all()->pluck('name', 'id');

        $date_debut =  Carbon::parse($post->date_debut)->format('d-m-Y');
        $date_fin =  Carbon::parse($post->date_fin)->format('d-m-Y');

        return view('back.post.edit',   [   
                                            'post'=> $post, 
                                            'categories'=> $categories,
                                            'date_debut' => $date_debut,
                                            'date_fin' => $date_fin
                                        ]);//Donne accès à la page d'édition
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
        //On recup le livre souhaité
        $post = Post::find($id);
        //On met a jour les données de ce livre
        $post->update($request->all());
        
        
        /* var_dump($request->category_id);
        exit; */
        
        //Sychro des données avec les tables de liaison
        $post->category_id = $request->category_id;
        // $post->categories()->sync($request->category_id);

        $im = $request->file('picture');

        if(!empty($im)) {

           /* if(is_null($post->picture) == false) {
                Storage::disk('local')->delete($post->picture->link); //on supprime physiquement l'image
                $post->picture()->delete(); //Supprime l'information en base
            }*/

            $link = $request->file('picture')->store('images');

            $post->picture()->create([
                'link' => $link,
                'title' => 'No title'
            ]);

        }

        // Sauvegarde
        $post->save();

        return redirect()->route('post.index')->with('message', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('message', 'success for the delete');
    }
}
