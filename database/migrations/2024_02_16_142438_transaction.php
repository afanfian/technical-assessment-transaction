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
        Schema::table('koperasi', function (Blueprint $table) {
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('item_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
            $table->foreign('item_id')->references('id')->on('item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
