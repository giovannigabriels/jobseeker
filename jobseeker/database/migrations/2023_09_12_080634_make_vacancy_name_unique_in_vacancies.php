<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeVacancyNameUniqueInVacancies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->unique('vacancy_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropUnique('vacancy_name');
        });
    }
}
