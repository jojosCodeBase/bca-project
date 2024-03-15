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
        Schema::create('ca2313_co_po', function (Blueprint $table) {
            $table->id();
            $table->integer('co1')->nullable();
            $table->integer('co2')->nullable();
            $table->integer('co3')->nullable();
            $table->integer('co4')->nullable();
            $table->integer('co5')->nullable();
            $table->integer('co6')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ca2313_co_po');
    }
};
