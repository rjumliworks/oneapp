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
        Schema::create('signatories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');   
            $table->date('start');
            $table->date('end');  
            $table->tinyInteger('designation_id')->unsigned()->index();
            $table->foreign('designation_id')->references('id')->on('list_dropdowns')->onDelete('cascade');    
            $table->tinyInteger('division_id')->unsigned()->index();
            $table->foreign('division_id')->references('id')->on('list_dropdowns')->onDelete('cascade');    
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_oic')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signatories');
    }
};
