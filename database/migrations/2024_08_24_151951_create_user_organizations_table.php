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
        Schema::create('user_organizations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->tinyInteger('status_id')->unsigned()->index(); //retired //
            $table->foreign('status_id')->references('id')->on('list_statuses')->onDelete('cascade');
            $table->smallInteger('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('list_data')->onDelete('cascade');
            $table->tinyInteger('position_id')->unsigned()->index();
            $table->foreign('position_id')->references('id')->on('list_positions')->onDelete('cascade');
            $table->tinyInteger('division_id')->unsigned()->index();
            $table->foreign('division_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->tinyInteger('unit_id')->unsigned()->index();
            $table->foreign('unit_id')->references('id')->on('list_units')->onDelete('cascade');
            $table->tinyInteger('station_id')->unsigned()->index();
            $table->foreign('station_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_organizations');
    }
};
