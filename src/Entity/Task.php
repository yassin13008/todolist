<?php 

namespace App\Entity;

use DateTimeImmutable;
use App\Entity\Priority;

class Task {

    //Propriété 

    private ?int $id;
    private string $title;
    private string $description;
    private \DateTimeImmutable $createdAt;
    private bool $isDone;
    private ?\DateTimeImmutable $deadline;
    private Priority $priority;

    function __construct(
        ?int $id,
        string $title,
        string $description,
        string $createdAt,
        bool $isDone,
        string $deadline,
        Priority $priority, 
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = new \DateTimeImmutable($createdAt);
        $this->isDone = $isDone;
        $this->deadline = new \DateTimeImmutable($deadline);
        $this->priority = $priority; // Appelez la fonction ici 
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function setId(?int $id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription(string $description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of createdAt
         */ 
        public function getCreatedAt()
        {
                return $this->createdAt;
        }

        /**
         * Set the value of createdAt
         *
         * @return  self
         */ 
        public function setCreatedAt(DateTimeImmutable $createdAt)
        {
                $this->createdAt = $createdAt;

                return $this;
        }

        /**
         * Get the value of isDone
         */ 
        public function getIsDone()
        {
                return $this->isDone;
        }

        /**
         * Set the value of isDone
         *
         * @return  self
         */ 
        public function setIsDone(bool $isDone)
        {
                $this->isDone = $isDone;

                return $this;
        }

    /**
     * Get the value of deadline
     */ 
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set the value of deadline
     *
     * @return  self
     */ 
    public function setDeadline(DateTimeImmutable $deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get the value of priorityId
     */ 
    public function getPriority() : Priority
    {
        return $this->priority;
    }

    /**
     * Set the value of priorityId
     *
     * @return  self
     */ 
    public function setPriority(Priority $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    function getPriorityClass(): string
{
    // VERSION 1 avec des if
    // if ($priorityId == 1) {
    //     return 'bg-success';
    // }

    // if ($priorityId == 2) {
    //     return 'bg-warning';
    // }

    // if ($priorityId == 3) {
    //     return 'bg-danger';
    // }

    // Version 2 avec un switch
    // switch ($priorityId) {
    //     case 1:
    //         return 'bg-success';
        
    //     case 2:
    //         return 'bg-warning';

    //     case 3:
    //         return 'bg-danger';
    // }

    // Version 3 avec match ( > PHP 8.0)
    return match($this->priority->getId()) {
        1 => 'bg-success',
        2 => 'bg-warning',
        3 => 'bg-danger'
    };
}


/**
 * Détermine le statut d'une tâche :
 *  - terminée
 *  - en cours
 *  - en retard
 * @param array $task Le tableau associatif contenant les données de la tâche
 * @return string Le statut la tâche
 */
function getStatus(): string 
{
    // Si le champ isDone vaut 1 (équivalent à true)
    if ($this->isDone) {
        return 'Terminée';
    }

    // Ici, je sais que isDone vaut 0
    
    // Si la deadline est dépassée (avant la date du jour)
    if ($this->deadline && $this->deadline < date('Y-m-d')) {
        return 'En retard';
    }

    // Ici je sais que la deadline n'est pas dépassée
    return 'En cours';
}

/**
 * Formatte une date au format "français"
 * @param null|string $date : date au format américain ('2023-05-12')
 * @return string La date formattée 
 */
function getFormatDeadline() 
{
    // Si la date est null (pas de deadline)...
    if ($this == null) {

        // ... on retourne une chaîne vide
        return '';
    }

    // Création d'un objet DateTimeImmutable
    
    // Formattage de la date
    return $this->deadline->format('d/m/Y');
}
}