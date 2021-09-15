<?php

namespace ByusTechnology\Gabinete\Utils;

class CalcularContraste
{

    public static function handle($hexadecimal = '#ffffff')
    {
            list($red, $green, $blue) = sscanf($hexadecimal, "#%02x%02x%02x");
            $luma = ($red + $green + $blue) / 3;

            return $luma < 150 ? 'white' : 'black';
    }
}
