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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(false);
            $table->string('second_first_name')->nullable(true);
            $table->string('last_name')->nullable(false);
            $table->string('second_last_name')->nullable(true);
            $table->string('id_card')->nullable(false);
            $table->string('phone')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->foreignId('company_id')->nullable(false)->constrained('companies')->cascadeOnDelete();
            $table->foreignId('workspace_id')->nullable(true)->constrained('workspaces')->cascadeOnUpdate();
            $table->foreignId('position_id')->nullable(true)->constrained('positions')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
