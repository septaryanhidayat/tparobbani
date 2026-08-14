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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->string('child_nickname')->nullable();
            $table->date('birth_date');
            $table->string('gender')->default('Laki-laki');
            $table->string('parent_name');
            $table->string('phone');
            $table->string('branch')->default('TPA Pusat (Jl Sarjana)');
            $table->text('address')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('Menunggu Konfirmasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
