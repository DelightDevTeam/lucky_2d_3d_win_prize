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
        Schema::create('result_lists', function (Blueprint $table) {
            $table->id();
            $table->string('am_11')->nullable();
            $table->string('pm_1')->nullable();
            $table->string('pm_3')->nullable();
            $table->string('pm_5')->nullable();
            $table->string('pm_7')->nullable();
            $table->string('pm_9')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_lists');
    }
};