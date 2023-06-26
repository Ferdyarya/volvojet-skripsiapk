<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partreturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pn');
            $table->string('asalpart');
            $table->string('id_unit');
            $table->string('qty');
            $table->date('tanggal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partreturs');
    }
};
