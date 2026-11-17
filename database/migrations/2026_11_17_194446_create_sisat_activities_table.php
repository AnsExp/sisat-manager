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
        Schema::create('sisat_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable(false)->constrained('companies')->cascadeOnDelete();
            $table->string('module')->nullable(false);
            $table->string('activity')->nullable(false);
            $table->json('results')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sisat_activities');
    }
};
