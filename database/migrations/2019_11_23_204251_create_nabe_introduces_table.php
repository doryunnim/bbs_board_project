<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNabeIntroducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nabe_introduces', function (Blueprint $table) {
            $table->bigIncrements('id');
<<<<<<< HEAD
            $table->string('name');
            $table->string('comment');
            $table->string('url');
            $table->string('hashname');
            $table->string('originalname');
            #$table->string('photo');
            $table->timestamps();
=======
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('comment');
            $table->string('url');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nabe_introduces');
    }
}
