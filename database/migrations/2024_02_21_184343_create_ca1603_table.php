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
        Schema::create('ca1603', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('regno')->unsigned()->unique()->length(9);
            $table->decimal('q1', 5, 1); // Total length 5 with 2 decimal places
            $table->decimal('s1', 5, 1);
            $table->decimal('q2', 5, 1); // Total length 5 with 2 decimal places
            $table->decimal('s2', 5, 1);
            $table->decimal('assignment', 5, 1);
            $table->decimal('attendance', 5, 1);
            $table->decimal('total', 5, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ca1603');
    }
};
