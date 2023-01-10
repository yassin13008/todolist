<?php

class TaskModel extends AbstractModel {


    function getAllTasks(): array 
{
    // Création d'une connexion PDO


    // Préparation de la requête de sélection
    $sql = 'SELECT title, isDone, deadline, label AS priority, P.id AS priority_id, T.id AS task_id 
            FROM task AS T
            INNER JOIN priority AS P
            ON T.priority_id = P.id
            ORDER BY deadline ASC';

    $pdoStatement = self::$pdo->prepare($sql);
    
    // Exécution de la requête
    $pdoStatement->execute();

    // Récupération et retour des résultats de la requête SQL
    $tasks = $pdoStatement->fetchAll();

    if (!$tasks) {
        return [];
    }

    return $tasks;
}

function insertTask(string $title, string $description, int $isDone, ?string $deadline, int $priority): int
{
    // Création d'une connexion PDO
   

    // Insertion des données dans la base de données
    $sql = 'INSERT INTO task 
    (title, description, createdAt, isDone, deadline, priority_id)
    VALUES (?,?,NOW(),?,?,?)';

    $pdoStatement = $this->pdo->prepare($sql);
    $pdoStatement->execute([$title, $description, $isDone, $deadline, $priority]);

    return self::$pdo->lastInsertId();
}


function deleteTask(int $taskId)
{
    // Création d'une connexion PDO
 

    // Préparation de la requête SQL de suppression
    $sql = 'DELETE FROM task WHERE id = ?';

    $pdoStatement = self::$pdo->prepare($sql);
    
    // Exécution de la requête
    $pdoStatement->execute([$taskId]);
}



/**
 * Sélectionne une tâche à partir de son id
 * @param int $taskId L'id de la tâche que je souhaite sélectionner
 * @return array La tâche sélectionnée
 */
function getOneTaskById(int $taskId): array
{
    // Création d'une connexion PDO


    // Préparation de la requête de sélection
    $sql = 'SELECT title, description, deadline, priority_id 
            FROM task AS T
            WHERE T.id = ?';

    $pdoStatement = self::$pdo->prepare($sql);
    
    // Exécution de la requête
    $pdoStatement->execute([$taskId]);

    // Récupération et retour du résultat de la requête SQL
    $task = $pdoStatement->fetch();

    if (!$task) {
        return [];
    }

    return $task;
}

function editTask(string $title, string $description, ?string $deadline, int $priority, int $taskId)
{
    // Création d'une connexion PDO


    // Insertion des données dans la base de données
    $sql = 'UPDATE task 
            SET title = ?, description = ?, deadline = ?, priority_id = ?
            WHERE id = ?';

    $pdoStatement = self::$pdo->prepare($sql);
    $pdoStatement->execute([$title, $description, $deadline, $priority, $taskId]);
}

}

?>