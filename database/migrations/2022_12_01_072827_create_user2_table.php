<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user2', function (Blueprint $table) {
            $table->id();
            $table->string("username")->unique();
            $table->string("remember_token");
            $table->string("email")->unique();
            $table->string("password");
            $table->string("name");
            $table->string("roles");
            $table->string("addres");
            $table->string("phone");
            $table->string("avatar");
            $table->enum("status",["ACTIVE", "INACTIVE"]);
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
        Schema::dropIfExists('user2');
    }
};
