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
        Schema::create('calendars', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('venue')->nullable();
            $table->datetime('start');
            $table->datetime('end');
            $table->boolean('is_allday');
            $table->tinyInteger('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('agency_id')->unsigned()->index();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
