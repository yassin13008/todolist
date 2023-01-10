<?php 

namespace App\Model;

use Entity\Task;

// Sélections de la liste des tâches
$taskModel = new TaskModel();

$tasks = $taskModel->getAllTasks();

// dump($tasks);
// Récupération du message flash le cas échéant
$flashMessage = fetchFlash();


// Affichage : inclusion du template
$template = 'home';
include '../templates/base.phtml';
