<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelTvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_tvas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('OR');
            $table->integer('FACT_NUM');
            $table->string('DESIGNATION');
            $table->double('M_HT');
            $table->double('TVA');
            $table->double('M_TTC');
            $table->integer('IF');
            $table->string('LIB_FRSS');
            $table->string('ICE_FRS');
            $table->integer('TAUX');
            $table->integer('ID_PAIE');
            $table->date('DATE_PAIE');
            $table->date('DATE_FAC');
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
        Schema::dropIfExists('excel_tvas');
    }
}
