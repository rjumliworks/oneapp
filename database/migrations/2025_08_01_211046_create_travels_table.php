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
        Schema::create('travels', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('purpose');
            $table->string('destination');
            $table->json('expenses');
            $table->string('remarks')->nullable();
            $table->date('start');
            $table->date('end');
            $table->string('time');
            $table->string('document')->nullable();
            $table->smallInteger('mode_id')->unsigned()->index();
            $table->foreign('mode_id')->references('id')->on('list_data')->onDelete('cascade');
            $table->smallInteger('expense_id')->unsigned()->index();
            $table->foreign('expense_id')->references('id')->on('list_data')->onDelete('cascade');
            $table->bigInteger('request_id')->unsigned()->index();
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->unsignedInteger('recommended_id')->nullable();
            $table->foreign('recommended_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('approved_id')->nullable();
            $table->foreign('approved_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_ard')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
