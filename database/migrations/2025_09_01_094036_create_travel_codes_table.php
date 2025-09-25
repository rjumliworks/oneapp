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
        Schema::create('travel_codes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('code',30)->unique()->index();
            $table->tinyInteger('division_id')->unsigned()->index();
            $table->foreign('division_id')->references('id')->on('list_dropdowns')->onDelete('cascade');    
            $table->unsignedBigInteger('travel_id')->nullable();
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_codes');
    }
};
