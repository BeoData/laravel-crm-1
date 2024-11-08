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
        Schema::create('matters', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique(); // Matter number
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['open', 'pending', 'closed'])->default('open');
            $table->unsignedBigInteger('person_id')->nullable();
            $table->unsignedBigInteger('organisation_id')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable(); // Link to users table
            $table->date('start_date')->nullable();
            $table->date('close_date')->nullable();
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('persons')->onDelete('set null');
            $table->foreign('organisation_id')->references('id')->on('organisations')->onDelete('set null');
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('matters');
    }
};
