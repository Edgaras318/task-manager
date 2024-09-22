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
        Schema::create('entities', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->text('description')->nullable();
                $table->string('creator')->nullable();
                $table->string('tester')->nullable();
                $table->string('assignee')->nullable();
                $table->enum('status', ['paused', 'in progress', 'testing', 'released']);
                $table->enum('type', ['task', 'bug']); // Differentiates between Task and Bug
                $table->timestamps();
                $table->softDeletes();

            // Add indexes
            $table->index('creator');
            $table->index('status');
            $table->index('type');
            $table->index(['assignee', 'status']); // Composite index
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entities');
    }
};
