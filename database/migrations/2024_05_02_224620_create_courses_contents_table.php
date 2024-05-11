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
    { Schema::create('section_contents', function (Blueprint $table) {
        $table->id();
        $table->string('file_name');
        $table->string('file_type');
        $table->string('file_path');
        $table->timestamps();
        $table->unsignedBigInteger('section_id');
        
        // Define foreign key constraint
        $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_contents');
    }
};
