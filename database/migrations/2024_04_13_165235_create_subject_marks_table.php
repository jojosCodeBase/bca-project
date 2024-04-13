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
        Schema::create('subject_marks', function (Blueprint $table) {
            $table->id();
            $table->string('cid');
            $table->bigInteger('batch');
            $table->bigInteger('regno');

            // Define unique key constraint
            $table->unique(['cid', 'batch', 'regno']);
            $table->json('q1'); // Total length 5 with 2 json places
            $table->json('s1');
            $table->json('q2'); // Total length 5 with 2 json places
            $table->json('s2');
            $table->json('assignment');
            $table->json('end_sem');
            $table->decimal('total', 5, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_marks');
    }
};
