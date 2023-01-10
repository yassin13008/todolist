<?php 

namespace App\Entity;

use DateTimeImmutable;

class Task {

    //Propriété 

    private ?int $id;
    private string $title;
    private string $description;
    private \DateTimeImmutable $createdAt;
    private bool $isDone;
    private ?\DateTimeImmutable $deadline;
    private int $priorityId;

    function __construct(
        ?int $id,
        string $title,
        string $description,
        string $createdAt,
        bool $isDone,
        string $deadline,
        int $priorityId, 
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = new \DateTimeImmutable($createdAt);
        $this->isDone = $isDone;
        $this->deadline = new \DateTimeImmutable($deadline);
        $this->priorityId = $priorityId;
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
    public function getPriorityId()
    {
        return $this->priorityId;
    }

    /**
     * Set the value of priorityId
     *
     * @return  self
     */ 
    public function setPriorityId(int $priorityId): self
    {
        $this->priorityId = $priorityId;

        return $this;
    }
}