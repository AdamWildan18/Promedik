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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('code_outlet', 100);
            $table->string('jenis_outlet', 100);
            $table->string('type_outlet', 100);
            $table->string('nama_direktur', 100)->nullable();
            $table->string('nama_ok', 100)->nullable();
            $table->string('ppk', 100)->nullable();
            $table->string('if_farmasi', 100)->nullable();
            $table->string('listing_product', 100)->nullable();
            $table->string('proges_outlet', 100)->nullable();
            $table->string('keterangan', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
