<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAcess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_acess', function (Blueprint $table) {
            $table->id();            
            $table->bigInteger('user_id')->unsigned()->index();
            $table->dateTime('last_login');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    // $table->integer('order_line_id')->unsigned(); to 
    // $table->unsignedInteger('order_line_id');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_acess');
    }
}
