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
        Schema::table('request_tags', function (Blueprint $table) {
            $table->bigInteger('signatory_id')->unsigned()->index()->after('division_id');
            $table->foreign('signatory_id')->references('id')->on('request_signatories')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_tags', function (Blueprint $table) {
            //
        });
    }
};
