<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('course')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->date('exam_date');
            $table->integer('full_marks');
            $table->integer('exam_duration')->default(3);
            $table->longText('terms_and_conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam');
    }
}
