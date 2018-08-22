<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('post_type', ['stage','formation', 'undefined']);
            $table->string('title', 100); // varchar 100
            $table->text('description')->nullable(); // TEST NULL
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->decimal('prix', 8, 2);
            $table->smallInteger('max_eleves');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
