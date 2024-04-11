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
        Schema::create('max_marks_co', function (Blueprint $table) {
            $table->id();
            $table->string('cid');
            $table->json('q1')->nullable(); // Total length 5 with 2 json places
            $table->json('s1')->nullable();
            $table->json('q2')->nullable(); // Total length 5 with 2 json places
            $table->json('s2')->nullable();
            $table->json('assignment')->nullable();
            $table->json('end_sem')->nullable();
            $table->decimal('total', 5, 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_marks_co');
    }
};
