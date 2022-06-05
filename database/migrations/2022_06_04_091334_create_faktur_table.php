<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->integer('id_user');
            $table->integer('jumlah_pesanan');
            $table->string('alamat');
            $table->integer('kode_pos');
            $table->float('total_harga');
            $table->integer('nomor_invoice');
            $table->enum('status', ['Accepted', 'Pending'])->default('Pending');
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
        Schema::dropIfExists('faktur');
    }
}
