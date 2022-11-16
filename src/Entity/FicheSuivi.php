<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheSuivi
 *
 * @ORM\Table(name="fiche_suivi", indexes={@ORM\Index(name="Id_client_fiche", columns={"id_client"})})
 * @ORM\Entity
 */
class FicheSuivi
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_fiche", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFiche;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_client", type="integer", nullable=true)
     */
    private $idClient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="diagnostic", type="string", length=255, nullable=true)
     */
    private $diagnostic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="consigne_medicale", type="string", length=255, nullable=true)
     */
    private $consigneMedicale;

    public function getIdFiche(): ?int
    {
        return $this->idFiche;
    }

    public function getIdClient(): ?int
    {
        return $this->idClient;
    }

    public function setIdClient(?int $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(?string $diagnostic): self
    {
        $this->diagnostic = $diagnostic;

        return $this;
    }

    public function getConsigneMedicale(): ?string
    {
        return $this->consigneMedicale;
    }

    public function setConsigneMedicale(?string $consigneMedicale): self
    {
        $this->consigneMedicale = $consigneMedicale;

        return $this;
    }


}
