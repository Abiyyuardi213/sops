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
        Schema::create('dermaga', function (Blueprint $table) {
            $table->id();
            $table->string('kode_dermaga')->unique();
            $table->string('nama_dermaga');
            $table->enum('tipe_dermaga', ['Beton', 'Floating', 'Kayu', 'Ponton'])->default('Beton');
            $table->decimal('panjang_m', 8, 2);
            $table->decimal('lebar_m', 8, 2);
            $table->decimal('kedalaman_min_lws', 5, 2);
            $table->decimal('kedalaman_max_lws', 5, 2);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->json('fasilitas')->nullable(); // BBM, Air, Listrik, Crane
            $table->enum('status', ['Tersedia', 'Penuh', 'Perbaikan', 'Non-Aktif'])->default('Tersedia');
            $table->text('catatan_operasional')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dermaga');
    }
};
