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
        Schema::create('attendancelists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('year');
            $table->string('section');
            $table->string('date');
            $table->string('code');
            $table->string('attendance');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendancelists');
    }
};
