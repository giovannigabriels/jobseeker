<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_applies', function (Blueprint $table) {
            $table->id('apply_id');
            $table->foreignId('candidate_id')->constrained('candidates', 'candidate_id');
            $table->foreignId('vacancy_id')->constrained('vacancies', 'vacancy_id');
            $table->date('apply_date');
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
        Schema::dropIfExists('candidate_applies');
    }
}
