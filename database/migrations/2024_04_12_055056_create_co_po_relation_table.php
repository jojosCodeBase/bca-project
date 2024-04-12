<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('co_po_relation', function (Blueprint $table) {
            $table->id();
            $table->string('cid');
            $table->integer('batch');
            $table->string('CO')->nullable();
            $table->integer('PO1')->nullable();
            $table->integer('PO2')->nullable();
            $table->integer('PO3')->nullable();
            $table->integer('PO4')->nullable();
            $table->integer('PO5')->nullable();
            $table->integer('PO6')->nullable();
            $table->integer('PO7')->nullable();
            $table->integer('PO8')->nullable();
            $table->integer('PO9')->nullable();
            $table->integer('PO10')->nullable();
            $table->integer('PO11')->nullable();
            $table->integer('PO12')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_po_relation');
    }
};
