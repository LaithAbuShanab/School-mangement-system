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
        Schema::create('ass_students', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('user_id=student_id');
            $table->integer('class_id');
            $table->integer('year_id');
            $table->integer('group_id');
            $table->integer('shift_id');
            $table->integer('roll')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ass_students');
    }
};
