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
        Schema::create('documents', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('route_slip',30)->unique();
            $table->string('subject');
            $table->text('remarks');
            $table->json('keywords');
            $table->json('actions');
            $table->boolean('is_incoming')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_status')->default(0);
            $table->integer('sender_id')->unsigned()->index();
            $table->foreign('sender_id')->references('id')->on('list_keywords')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('list_keywords')->onDelete('cascade');
            $table->tinyInteger('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->integer('routed_by')->unsigned()->index()->nullable();
            $table->foreign('routed_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('encoded_by')->unsigned()->index();
            $table->foreign('encoded_by')->references('id')->on('users')->onDelete('cascade');
            $table->date('documented_at');
            $table->date('received_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
