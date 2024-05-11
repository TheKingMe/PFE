<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sections', function (Blueprint $table) {
            // Check if the column exists before adding it
            if (!Schema::hasColumn('sections', 'course_id')) {
                $table->unsignedBigInteger('course_id');
            } else {
                // Modify the existing column definition to include the default value
                $table->unsignedBigInteger('course_id')->default(1)->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sections', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['course_id']);

            // Drop the course_id column
            $table->dropColumn('course_id');
        });
    }
};
