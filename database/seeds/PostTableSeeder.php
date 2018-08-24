<?php

use Illuminate\Database\Seeder;
use App\Category;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //création des genres
         App\Category::create([
            'name' => 'Dev Front-End'
        ]);

        App\Category::create([
            'name' => 'Dev Back-End'
        ]);

        App\Category::create([
            'name' => 'Dev Full-Stack'
        ]);

        //  creéation de 30 livres à partir de la factory
        factory(App\Post::class, 40)->create()->each(function($post){

            // $book->title = 'Hello nouveau titre';
            // $book->save();
            //  associations un genre un livre que nous venons de créer
            $category = App\Category::find(rand(0,2));

            // pour chaque $book on lui asocie un genre en particuler
            $post->category()->associate($category);
            $post->save();

            $link = str_random(12) . '.jpg';
            $file = file_get_contents('http://lorempicsum.com/futurama/250/250/' . rand(1, 9));
            Storage::disk('local')->put($link, $file);

            $post->picture()->create([
                    'title' => 'Default',
                    'link' => $link
            ]);
            /*
            $authors = App\Author::pluck('id')->shuffle()->slice(0, rand(1, 3))->all();

            $book->authors()->attach($authors);*/

            $post->save();
        });
    }
}
