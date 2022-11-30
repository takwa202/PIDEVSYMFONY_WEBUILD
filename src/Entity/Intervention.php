<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervention
 *
 * @ORM\Table(name="intervention", indexes={@ORM\Index(name="id_med", columns={"id_med"}), @ORM\Index(name="id_patien", columns={"id_patien"})})
 * @ORM\Entity(repositoryClass = "App\Repository\InterventionRepository")
 */
class Intervention
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_interv", type="integer", nullable=false, length=100)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idInterv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inter", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
   
    private $dateInter;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptions", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank]
    private $descriptions;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_patien", referencedColumnName="Id_patient")
     * })
     */
 
    private $idPatien;

    /**
     * @var \Medecin
     *
     * @ORM\ManyToOne(targetEntity="Medecin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_med", referencedColumnName="id_med")
     * })
     */
   
    private $idMed;

    public function getIdInterv(): ?int
    {
        return $this->idInterv;
    }
 

    public function getDateInter()
    {
        return $this->dateInter;
       // return $this->dateInter->format('Y-m-d H:i:s');
    }
    public function getDateInterstring()
    {
        return $this->dateInter->format('Y-m-d H:i:s');
    }
    public function setDateInter($dateInter): self
    {
        $this->dateInter = $dateInter;

        return $this;
    }

    public function getDescriptions(): ?string
    {
        return $this->descriptions;
    }

    public function setDescriptions(string $descriptions): self
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    public function getIdPatien(): ?Patient
    {
        return $this->idPatien;
    }

    public function setIdPatien(?Patient $idPatien): self
    {
        $this->idPatien = $idPatien;

        return $this;
    }

    public function getIdMed(): ?Medecin
    {
        return $this->idMed;
    }

    public function setIdMed(?Medecin $idMed): self
    {
        $this->idMed = $idMed;

        return $this;
    }


}
