<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // each student has a login account in the users table
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('reg_no')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('program');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
