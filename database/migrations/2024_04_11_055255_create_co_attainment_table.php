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
        Schema::create('co_attainment', function (Blueprint $table) {
            $table->id();
            $table->string('cid');
            $table->integer('batch');
            $table->json('q1');
            $table->json('s1');
            $table->json('q2');
            $table->json('s2');
            $table->json('assignment');
            $table->json('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_attainment');
    }
};
