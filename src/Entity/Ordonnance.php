<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ordonnance
 *
 * @ORM\Table(name="ordonnance", indexes={@ORM\Index(name="Id_patient", columns={"Id_patient"})})
 * @ORM\Entity
 */
class Ordonnance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ordonnance", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrdonnance;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateAjout", type="date", nullable=true)
     */
    private $dateajout;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomMedicament", type="string", length=255, nullable=true)
     */
    private $nommedicament;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modeUtilisation", type="string", length=255, nullable=true)
     */
    private $modeutilisation;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_patient", referencedColumnName="Id_patient")
     * })
     */
    private $idPatient;

    public function getIdOrdonnance(): ?int
    {
        return $this->idOrdonnance;
    }

    public function getDateajout(): ?\DateTimeInterface
    {
        return $this->dateajout;
    }

    public function setDateajout(?\DateTimeInterface $dateajout): self
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    public function getNommedicament(): ?string
    {
        return $this->nommedicament;
    }

    public function setNommedicament(?string $nommedicament): self
    {
        $this->nommedicament = $nommedicament;

        return $this;
    }

    public function getModeutilisation(): ?string
    {
        return $this->modeutilisation;
    }

    public function setModeutilisation(?string $modeutilisation): self
    {
        $this->modeutilisation = $modeutilisation;

        return $this;
    }

    public function getIdPatient(): ?Patient
    {
        return $this->idPatient;
    }

    public function setIdPatient(?Patient $idPatient): self
    {
        $this->idPatient = $idPatient;

        return $this;
    }


}
