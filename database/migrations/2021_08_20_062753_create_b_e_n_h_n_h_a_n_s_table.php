<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBENHNHANSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BENHNHAN', function (Blueprint $table) {
            $table->Increments('benhnhan_ma');
            $table->string('benhnhan_ten');
            $table->string('benhnhan_dc');
            $table->integer('benhnhan_sdt');
            $table->integer('benhnhan_ns');
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
        Schema::dropIfExists('BENHNHAN');
    }
}
