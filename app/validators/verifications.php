<?php

namespace App\Validators;

class Verification
{
    /**
     * Teste le format d'un mail
     * @param $mail : valeur testée
     * @return : bool
     */
    public static function mailRegex($mail)
    {
        $lowermail = strtolower($mail);
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,5})$/i";
        return preg_match($pattern, $lowermail);
    }

    /**
     * 
     */
    public static function intRegex($valeur)
    {
        return preg_match("/[^0-9]/", $valeur) == 0;
    }

    /**
     * Teste si la chaîne de caractère est un nombre entier
     * @param $cp : valeur testée
     * @return : bool
     */
    public static function cpRegex($cp)
    {
        return strlen($cp) == 5 && Verification::intRegex($cp);
    }

    public static function pwRegex($pw)
    {
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/s";
        return preg_match($pattern, $pw);
    }
}
