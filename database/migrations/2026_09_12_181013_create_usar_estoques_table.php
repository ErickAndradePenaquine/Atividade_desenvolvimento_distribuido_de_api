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
        Schema::create('usar_estoques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estoque_id')->constrained('estoques');
            $table->foreignId('chamado_id')->constrained('chamados');
            $table->timestamps();
            $table->unique(['estoque_id', 'chamado_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usar_estoques');
    }
};
