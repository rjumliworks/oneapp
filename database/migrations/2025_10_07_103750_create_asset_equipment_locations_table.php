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
        Schema::create('asset_equipment_locations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('location')->nullable();
            $table->unsignedInteger('personnel_id')->nullable();
            $table->foreign('personnel_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedTinyInteger('station_id')->nullable();
            $table->foreign('station_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->integer('equipment_id')->unsigned()->index();
            $table->foreign('equipment_id')->references('id')->on('asset_equipment')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_equipment_locations');
    }
};
