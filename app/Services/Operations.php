<?php

/* Criamos esse arquivo para nos auxiliar com nosso código como a função de encriptar e desencriptar 
ficou muito repetitiva, criamos essa função que irá ser utilizada em qualquer parte de nosso código
fazendo com fique mais clean */

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations
{
    public static function decryptId($value)
    {
        try {
            $value = Crypt::decrypt($value);
        } catch (DecryptException $e) {
            return null;
        }

        return $value;
    }
}