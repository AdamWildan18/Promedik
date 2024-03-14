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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code_customer', 100);
            $table->string('name', 100);
            $table->enum('gender', ['L', 'P'])->default('L');
            $table->string('address', 100);
            $table->enum('specialist', ['Orthopedi', 'BedahSyaraf', 'BedahUmum', 'Cardio', 'Internis', 'Obgyn'])->default('Orthopedi');
            $table->string('hari', 100);
            $table->string('jam', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
