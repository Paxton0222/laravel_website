<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post',function(Blueprint $table){
            $table->id();
            $table->string('title')->commit("文章標題");
            $table->text('post_data')->commit("文章內容");
            $table->string('category_id')->commit("文章分類ID");
            $table->string('tag_id')->commit("文章標籤ID");
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
