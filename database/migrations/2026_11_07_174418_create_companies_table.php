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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->unique(true);
            $table->string('ruc')->nullable(false)->unique(true);
            $table->string('address')->nullable(true);
            $table->foreignId('ciiu_id')->nullable(false)->constrained('ciius')->cascadeOnDelete();
            $table->string('email')->nullable(true)->unique(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
