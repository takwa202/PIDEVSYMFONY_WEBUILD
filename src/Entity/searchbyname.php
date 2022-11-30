<?php

namespace App\Entity;



/**
 * searchbyname
 *
 * 
 * @ORM\Entity(repositoryClass = "App\Repository\searchbynameRepository")
 */

class searchbyname
{
   
   
    private $name;

        public function getName(): ?String
    {
        return $this->name;
    }

    public function setName(String $name): self
    {
        $this->name = $name;

        return $this;
    }


}
