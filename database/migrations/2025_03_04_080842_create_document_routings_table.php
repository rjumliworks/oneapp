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
        Schema::create('document_routings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('is_seen_to')->default(0);
            $table->boolean('is_seen_from')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_required')->default(0);
            $table->boolean('is_action')->default(0);
            $table->integer('route_to')->unsigned()->index();
            $table->foreign('route_to')->references('id')->on('users')->onDelete('cascade');
            $table->integer('document_id')->unsigned()->index();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->datetime('seened_at')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_routings');
    }
};
