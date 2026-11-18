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
            $table->foreignId('sisat_module_id')->nullable(false)->constrained('sisat_modules')->cascadeOnDelete();
            $table->string('name')->nullable(false);
            $table->string('slug')->nullable(false);
            $table->string('responsable')->nullable(false);
            $table->string('support')->nullable(true);
            $table->jsonb('rules')->nullable(false);
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
