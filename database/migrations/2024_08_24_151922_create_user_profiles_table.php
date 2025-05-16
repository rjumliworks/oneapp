<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('firstname',150);
            $table->string('lastname',150);
            $table->string('middlename',100)->nullable();
            $table->string('suffix',10)->nullable();
            $table->string('sex',8);
            $table->date('birthdate');
            $table->string('contact_no',20);
            $table->string('avatar', 2048)->default('avatar.jpg');
            $table->smallInteger('marital_id')->unsigned()->index(); 
            $table->foreign('marital_id')->references('id')->on('list_data')->onDelete('cascade');
            $table->smallInteger('religion_id')->unsigned()->index();
            $table->foreign('religion_id')->references('id')->on('list_data')->onDelete('cascade');
            $table->smallInteger('blood_id')->unsigned()->index();
            $table->foreign('blood_id')->references('id')->on('list_data')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
