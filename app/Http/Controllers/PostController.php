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
            'description' => 'required|string',
            'post_type' => 'required',
            'category_id' => 'required',
            'date_debut' => 'date',
            'date_fin' => 'date',
            'prix' => 'integer',
            'max_eleves' => 'integer',
            'publication' => 'in:publier,nonpublier',
            //'picture' => 'required|image|max:3000'
        ]);
        
        $post = Post::create($request->all());
        
        /* echo '<pre>';
        var_dump($post);
        echo '</pre>';
        die(); */

       /* $pic = $request->file('picture');    

        if(!empty($pic)){
            $link = $request->file('picture')->store('images');
            //if( $post->picture()->exits())

            $post->picture()->create([
                'link' => $link,
                'title' => $request->title_image?? $request->title
            ]);
        }*/

        //$post->categories()->attach($request->categories);
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

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'post_type' => 'required',
            'category_id' => 'required',
            'date_debut' => 'date',
            'date_fin' => 'date',
            'prix' => 'integer',
            'max_eleves' => 'integer',
            'publication' => 'in:publier,nonpublier'
        ]);


        //On recup le livre souhaité
        $post = Post::find($id);
        //On met a jour les données de ce livre
        $post->update($request->all());
        
        
        /* var_dump($request->category_id);
        exit; */
        
        //Sychro des données avec les tables de liaison
        $post->category_id = $request->category_id;
        // $post->categories()->sync($request->category_id);

        $pic = $request->file('picture');

        if($pic != null ) {
            $link = $request->picture->store('');

            //$link = $request->file('picture')->store('images');
            //$link = $picture->store('./');
            //if(count($post->picture)>0) {

           if($post->picture()->exits()):
                Storage::disk('local')->delete($post->picture->link); //on supprime physiquement l'image
                //$post->picture()->delete(); //Supprime l'information en base
            //mettre à jour la table picture 
            $post->picture()->update([
                'link'=> $link,
            ]);
            else:
                $post->picture()->create([
                    'link'=> $link,
                ]);
            endif;

        }

         /* $link = $im->store('');
            $post->picture()->create([
                'link' => $link,
                'title' => $request->title_image?? $request->title
            ]);*/


        $post->update($request->except('picture')); //mettre à jour les données d'un post
        $post->categories()->sync($request->categories); //synchronise les données avec la table de liaison
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
