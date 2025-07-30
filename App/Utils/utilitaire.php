<?php

namespace App\Utils;

class Utilitaire
{

    //Supprimer les balises + les caractères spéciaux, suppression des espaces
    public static function sanitize(string $value)
    {

        return htmlspecialchars(strip_tags(trim($value)), ENT_NOQUOTES);
    }
}
