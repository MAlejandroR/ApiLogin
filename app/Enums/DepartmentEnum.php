<?php

namespace App\Enums;


class DepartmentEnum
{
    const INFORMATICA = "Informática";
    const COMERCIO = "Comercio";
    const IMAGEN_Y_SONIDO = "Imagen y Sonido";

    public static function values()
    {
        return [
            self::INFORMATICA,
            self::COMERCIO,
            self::IMAGEN_Y_SONIDO
        ];
    }

    public static function isValid($value): bool
    {
        return in_array($value, self::values());
    }


}
