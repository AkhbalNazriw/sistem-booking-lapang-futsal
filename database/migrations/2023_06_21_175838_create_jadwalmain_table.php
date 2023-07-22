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
    Schema::create('jadwalmain', function (Blueprint $table) {
        $table->id();
        $table->string('nama', 20);
        $table->string('nama_tim', 20);
        $table->string('alamat', 100);
        $table->string('no_hp', 13);
        $table->enum('pilih_lapangan', ['Rumput', 'Vynil']);
        $table->date('tanggal');
        $table->time('jam');
        $table->binary('bukti_bayar')->nullable();
        $table->timestamps();
    });
}

};
