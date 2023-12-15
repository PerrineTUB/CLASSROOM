<?php

namespace App\Utils;

class BddConnect {
    //fonction connexion BDD
    public function connexion() {
        //retour de l'objet PDO
        include "./env.php";
        return new \PDO(
            'mysql:host=' . $host . ';dbname=' . $database . '',
            $login,
            $password,
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
        );
    }
}
