<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropImagePathAtColumnFromCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('image_path')->nullable();
        });
    }
}