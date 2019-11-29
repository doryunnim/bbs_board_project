<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQnaCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qna_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('commentable_type');
            $table->unsignedBigInteger('commentable_ud');
            $table->text('content');
            $table->timestamps();

            $talbe->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qna_comments', function(Blueprint $table){
            $table->dropForeign('qna_comments_parent_id_foreign');
            $table->dropForeign('qna_comments_user_id_foreign');
        });

        Schema::dropIfExists('qna_comments');
    }
}
