<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('adm', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password'); // Laravel usa 'password' por padrão, não 'senha'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adm');
    }
};


