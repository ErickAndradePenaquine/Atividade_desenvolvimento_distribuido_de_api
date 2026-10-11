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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tecnico_id')->constrained('users');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('status_id')->constrained('status');
            $table->text('descricao_problema');
            $table->text('descricao_solucao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
