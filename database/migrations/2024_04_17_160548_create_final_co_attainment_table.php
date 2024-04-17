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
        Schema::create('final_co_attainment', function (Blueprint $table) {
            $table->id();
            $table->string('cid');
            $table->integer('batch');
            $table->json('grand_total');
            $table->json('total_avg_internal');
            $table->json('final_co_attainment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_co_attainment');
    }
};
