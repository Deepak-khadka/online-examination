<?php

use App\Foundation\Lib\QuestionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exam');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->longText('question');
            $table->integer('question_type')->default(QuestionType::OBJECTIVE);
            $table->json('options')->nullable();
            $table->string('correct_option')->nullable();
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
        Schema::dropIfExists('question_list');
    }
}
