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
        Schema::create('assets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code',30)->unique();
            $table->string('name',30)->unique();
            $table->tinyInteger('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('list_units')->onDelete('cascade');
            $table->tinyInteger('station_id')->unsigned()->index();
            $table->foreign('station_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->smallInteger('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('list_data')->onDelete('cascade');
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
        Schema::dropIfExists('assets');
    }
};
