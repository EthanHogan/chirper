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
        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('handle');
            $table->text('chirp');
            $table->string('file')->nullable();
            $table->boolean('is_video')->nullable();
            $table->integer('comments');
            $table->integer('rechirps');
            $table->integer('likes');
            $table->integer('analytics');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};
