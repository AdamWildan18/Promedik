<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_outlet_jrecare', function (Blueprint $table) {
            $table->bigIncrements('code_outlet');
            $table->bigInteger('code_provinsi');
            $table->bigInteger('code_kota');
            $table->bigInteger('code_cabang');
            $table->string('nama_outlet', 150)->unique();
            $table->string('alamat', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_outlet_jrecare');
    }
};
