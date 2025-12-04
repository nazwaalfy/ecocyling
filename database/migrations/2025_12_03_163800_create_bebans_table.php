<?php

// database/migrations/2025_12_03_000003_create_bebans_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBebansTable extends Migration
{
    public function up()
    {
        Schema::create('bebans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_beban');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->string('kategori');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bebans');
    }
}
