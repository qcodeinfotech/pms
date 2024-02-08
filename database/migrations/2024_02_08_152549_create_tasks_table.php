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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('status_id')->references('id')->on('task_status')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('due_date')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
