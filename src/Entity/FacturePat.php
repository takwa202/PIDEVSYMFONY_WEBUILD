<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacturePat
 *
 * @ORM\Table(name="facture_pat")
 * @ORM\Entity
 */
class FacturePat
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_Fact", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFact;

    /**
     * @var int
     *
     * @ORM\Column(name="Quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix_Tot", type="string", length=255, nullable=false)
     */
    private $prixTot;

    /**
     * @var string
     *
     * @ORM\Column(name="Montant_SR", type="string", length=255, nullable=false)
     */
    private $montantSr;

    /**
     * @var string
     *
     * @ORM\Column(name="Montant_AR", type="string", length=255, nullable=false)
     */
    private $montantAr;

    public function getIdFact(): ?int
    {
        return $this->idFact;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixTot(): ?string
    {
        return $this->prixTot;
    }

    public function setPrixTot(string $prixTot): self
    {
        $this->prixTot = $prixTot;

        return $this;
    }

    public function getMontantSr(): ?string
    {
        return $this->montantSr;
    }

    public function setMontantSr(string $montantSr): self
    {
        $this->montantSr = $montantSr;

        return $this;
    }

    public function getMontantAr(): ?string
    {
        return $this->montantAr;
    }

    public function setMontantAr(string $montantAr): self
    {
        $this->montantAr = $montantAr;

        return $this;
    }


}
