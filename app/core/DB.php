<?php

namespace App\Core;

use \PDO;

class DB
{
    private static $dsn = "mysql:host=localhost;dbname=lord_of_geek;charset=utf8";
    private static $username = "root";
    private static $password = "";

    private static $pdo;

    public static function getPdo()
    {
        if (DB::$pdo == null) {
            DB::$pdo = new PDO(DB::$dsn, DB::$username, DB::$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return DB::$pdo;
    }

    public static function query(string $requete_sql)
    {
        return DB::getPdo()->query($requete_sql);
    }

    public static function exec(string $requete_sql)
    {
        return DB::getPdo()->exec($requete_sql);
    }
}
