<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarHargaLapangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_harga_lapang', function (Blueprint $table) {
            $table->increments('id_lapang');
            $table->string('jenislapangan', 10);
            $table->decimal('harga', 8, 2);
            $table->binary('foto')->nullable();
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
        Schema::dropIfExists('daftar_harga_lapang');
    }
}

