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
        Schema::create('ilo_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('index')->nullable(false);
            $table->text('name')->nullable(false);
            $table->foreignId('parent_id')->nullable(true)->constrained('ilo_items')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ilo_items');
    }
};
