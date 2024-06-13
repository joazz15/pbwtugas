<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBazookaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bazooka', function (Blueprint $table) {
            $table->increments('id'); // Menggunakan increments sebagai pengganti id
            $table->string('nama_senjata');
            $table->string('jenis_senjata');
            $table->integer('jumlah');
            $table->decimal('harga', 8, 2);
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('bazooka');
    }
}
