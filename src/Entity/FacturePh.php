<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacturePh
 *
 * @ORM\Table(name="facture_ph", indexes={@ORM\Index(name="Id_ProdS", columns={"Id_ProdS"}), @ORM\Index(name="Id_Phar", columns={"Id_Phar"})})
 * @ORM\Entity
 */
class FacturePh
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_fact", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFact;

    /**
     * @var int
     *
     * @ORM\Column(name="Somme_Prix", type="integer", nullable=false)
     */
    private $sommePrix;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_ProdS", referencedColumnName="id_prod")
     * })
     */
    private $idProds;

    /**
     * @var \Pharmacien
     *
     * @ORM\ManyToOne(targetEntity="Pharmacien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Phar", referencedColumnName="id_Pharmacien")
     * })
     */
    private $idPhar;

    public function getIdFact(): ?int
    {
        return $this->idFact;
    }

    public function getSommePrix(): ?int
    {
        return $this->sommePrix;
    }

    public function setSommePrix(int $sommePrix): self
    {
        $this->sommePrix = $sommePrix;

        return $this;
    }

    public function getIdProds(): ?Produit
    {
        return $this->idProds;
    }

    public function setIdProds(?Produit $idProds): self
    {
        $this->idProds = $idProds;

        return $this;
    }

    public function getIdPhar(): ?Pharmacien
    {
        return $this->idPhar;
    }

    public function setIdPhar(?Pharmacien $idPhar): self
    {
        $this->idPhar = $idPhar;

        return $this;
    }


}
