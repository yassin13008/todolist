<?php 

namespace App\Entity;

class Priority {
     
    private ?int $id;
    private string $label;

    function __construct(
        ?int $id,
        string $label
    )
    {
        $this->id = $id;
        $this->label = $label;
    }


    public function getId(): ?int
    {
        return $this->id;
    }



    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }




    public function getLabel(): string
    {
        return $this->label;
    }




    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }



}






?>