<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateANHSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ANH', function (Blueprint $table) {
            $table->Increments('anh_ma');
            $table->string('anh_duongdan');
            $table->integer('anh_ngaychup');
            $table->integer('benhnhan_ma')->unsigned();
            $table->foreign('benhnhan_ma')->references('benhnhan_ma')->on('BENHNHAN')->onDelete('cascade');
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
        Schema::dropIfExists('ANH');
    }
}
