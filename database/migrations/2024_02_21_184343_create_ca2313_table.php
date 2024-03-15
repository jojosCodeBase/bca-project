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
        Schema::create('ca2313', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('regno')->unsigned()->unique()->length(9);
            $table->json('q1'); // Total length 5 with 2 json places
            $table->json('s1');
            $table->json('q2'); // Total length 5 with 2 json places
            $table->json('s2');
            $table->json('assignment');
            $table->decimal('total', 5, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ca2313');
    }
};
