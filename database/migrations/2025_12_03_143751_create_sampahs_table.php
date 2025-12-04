<?php

// database/migrations/2025_12_03_000002_create_sampahs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampahsTable extends Migration
{
    public function up()
    {
        Schema::create('sampahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained()->onDelete('cascade');
            $table->string('jenis');
            $table->date('tgl_setor');
            $table->integer('harga');
            $table->float('berat');
            $table->integer('total');
            $table->integer('poin');
            $table->date('tgl_kirim');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sampahs');
    }
}
