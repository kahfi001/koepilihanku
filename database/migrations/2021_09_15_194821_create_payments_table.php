<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('no_payment');
            $table->timestamp('payment_date');
            $table->string('no_checkout');
            $table->string('id_user');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kota');
            $table->string('kodepos');
            $table->string('provinsi');
            $table->string('no_telpon');
            $table->integer('total');
            $table->string('catatan')->nullable();
            $table->string('gambar')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('payments');
    }
}
