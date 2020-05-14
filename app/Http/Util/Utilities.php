<?php

namespace App\Http\Util;

use Illuminate\Support\Facades\Hash;


class Utilities {
    public static function CifrarClave(string $clave) : string
    {
        return Hash::make($clave);
    }
}