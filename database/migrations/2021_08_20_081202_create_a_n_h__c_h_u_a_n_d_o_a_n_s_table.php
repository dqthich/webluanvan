<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateANHCHUANDOANSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ANH_CHUANDOAN', function (Blueprint $table) {
            $table->Increments('anh_cd_ma');
            $table->string('anh_cd_gt');
            $table->string('anh_cd_duongdan');
            $table->integer('anh_cd_ngay');
            $table->string('anh_cd_docx');
            $table->integer('chuandoan_ma')->unsigned();
            $table->foreign('chuandoan_ma')->references('chuandoan_ma')->on('CHUANDOAN')->onDelete('cascade');
            $table->integer('anh_ma')->unsigned();
            $table->foreign('anh_ma')->references('anh_ma')->on('ANH')->onDelete('cascade');
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
        Schema::dropIfExists('ANH_CHUANDOAN');
    }
}
