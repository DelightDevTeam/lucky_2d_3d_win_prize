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
        Schema::create('two_d_results', function (Blueprint $table) {
            $table->id();
            $table->integer('result');
            $table->unsignedBigInteger('two_d_session_id');
            $table->foreign('two_d_session_id')->references('id')->on('two_d_sessions')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('two_d_results');
    }
};
