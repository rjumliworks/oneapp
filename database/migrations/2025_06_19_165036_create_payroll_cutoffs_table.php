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
        Schema::create('payroll_cutoffs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('start');
            $table->date('end');
            $table->enum('type', ['1st','2nd'])->nullable();
            $table->boolean('is_deducted');
            $table->boolean('is_locked')->default(0);
            $table->boolean('is_active')->default(1);
            $table->integer('cycle_id')->unsigned()->index();
            $table->foreign('cycle_id')->references('id')->on('payroll_cycles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_cutoffs');
    }
};
