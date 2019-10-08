<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 12);
            $table->integer('seen_id');
            $table->json('data');
            $table->timestamps();

            $table->unique(['name', 'seen_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senarios');
    }
}
