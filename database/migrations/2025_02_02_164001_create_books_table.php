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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('sale_price', 8, 2);
            $table->decimal('purchase_price', 8, 2);
            $table->integer('amount');

            // Relacionamento com a tabela publishers
            $table->unsignedBigInteger('publisher_id');
            $table->foreign('publisher_id')
                  ->references('id')
                  ->on('publishers')
                  ->onDelete('cascade');

            // Relacionamento com a tabela authors
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')
                  ->references('id')
                  ->on('authors')
                  ->onDelete('cascade');

            // Coluna image para armazenar o caminho da imagem
            $table->string('image')->nullable();  // Coluna image que pode ser nula

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
