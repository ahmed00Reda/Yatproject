<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('released_at');
            $table->integer('downloads_num');
            $table->double('rating');
            
            $table->foreignId('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('catagory_id')->references('id')->on('catagories')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('games');
    }
}
