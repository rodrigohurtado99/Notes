<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // consolidar a junção dos dois métodos do nosso model, que possui relação com o model user

    public function user() 
    {   // função que indica que este model pertence ao user
        return $this->belongsTo(User::class);
    }
}
