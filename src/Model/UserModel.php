<?php

namespace App\Model;

use App\Core\AbstractModel;

class UserModel extends AbstractModel {


    
    function getUserByEmail(string $email): array 
{
    // Connexion à la base de données


    // Préparation de la requête
    $sql = 'SELECT * FROM user WHERE email = ?';
    $pdoStatement = self::$pdo->prepare($sql);

    // Exécution de la requête
    $pdoStatement->execute([$email]);

    // Récupération du résultat 
    $user = $pdoStatement->fetch();

    if (!$user) {
        return [];
    }
    return $user;
}

    function inserUser(string $firstname, string $lastname, string$email, string $password, bool $isSubscribed) 
    
    {
       

        // Hashage du mot de passe
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insertion des données 
        $sql = 'INSERT INTO user (firstname, lastname, email, password, isSubscribed, createdAt)
                VALUES (?, ?, ?, ?, ?, NOW())';

        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$firstname, $lastname, $email, $passwordHash, $isSubscribed ? 1 : 0]);

    }
}

?>