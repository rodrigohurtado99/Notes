<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */ // vai ser executado quando quiser fazer as migrations
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) { // blueprint da um conjunto de recursos para criarmos a tabela
            $table->id()->autoIncrement(); // id chave primaria, vai se auto incrementar
            $table->string('username', 50)->nullable(); // cria a coluna username com 50 caracteres
            $table->string('password', 200)->nullable(); // cria a coluna password com um length 200, e podendo ser nula
            $table->dateTime('last_login')->nullable();
            $table->timestamps(); // adiciona de forma automatica as duas colunas, o create_at e o deleted_at
            $table->softDeletes(); //deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */ // vai fazer um rollback na table
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
