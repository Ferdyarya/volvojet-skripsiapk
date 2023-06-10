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
        Schema::create('deliverynote', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product');
            $table->integer('id_customer');
            $table->integer('id_custorder');
            $table->integer('id_transorder');
            $table->integer('qty');
            $table->integer('wo');
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
        Schema::dropIfExists('deliverynote');
    }
};
