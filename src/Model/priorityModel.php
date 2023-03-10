<?php 

namespace App\Model;

use App\Core\AbstractModel;
use App\Entity\Priority;

class PriorityModel extends AbstractModel {

function getAllPriorities(): array
{
    // Création d'une connexion PDO

    // Préparation de la requête
    $sql = 'SELECT * FROM priority';
    $pdoStatement = self::$pdo->prepare($sql);
    
    // Exécution de la requête
    $pdoStatement->execute();

    // On retourne tous les résultats de la requête
    $results = $pdoStatement->fetchAll();

    // PHP < 8.0.0 : si on récupère la valeur false de la méthode fetchAll(), on retourne un tableau vide
    if (!$results) {
        return [];
    }

    return $results;
}

// function getOnePriorityById(int $priorityId): Priority
// {
//     // Création d'une connexion PDO


//     // Préparation de la requête de sélection
//     $sql = 'SELECT id, label
//             FROM priority AS P
//             WHERE P.id = ?';

//     $pdoStatement = self::$pdo->prepare($sql);
    
//     // Exécution de la requête
//     $pdoStatement->execute([$priorityId]);

//     // Récupération et retour du résultat de la requête SQL
//     $priority = $pdoStatement->fetch();

//     if (!$priority) {
//         return [];
//     }

//     return $priority;
// }


} ?>