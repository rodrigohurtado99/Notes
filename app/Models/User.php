<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // RELAÇÃO: um usuário poderá ter muitas notas

    public function notes() { // função notes que irá dizer que é uma relacão de um para muitos com nosso model Note
        return $this->hasMany(Note::class);
    }
}
