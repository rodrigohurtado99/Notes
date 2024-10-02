<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{


    use SoftDeletes; // vai trazer um metodo trait para o nosso model que consiste em fazer um soft delete na nossa aplicação


    // RELAÇÃO: um usuário poderá ter muitas notas
    public function notes() { // função notes que irá dizer que é uma relacão de um para muitos com nosso model Note
        return $this->hasMany(Note::class);
    }
}
