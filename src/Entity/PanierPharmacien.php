<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PanierPharmacien
 *
 * @ORM\Table(name="panier-pharmacien", indexes={@ORM\Index(name="Id-Ph", columns={"Id-Ph"}), @ORM\Index(name="Id-Pr", columns={"Id-Pr"})})
 * @ORM\Entity
 */
class PanierPharmacien
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id-Pn", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPn;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id-Pr", referencedColumnName="id_prod")
     * })
     */
    private $idPr;

    /**
     * @var \Pharmacien
     *
     * @ORM\ManyToOne(targetEntity="Pharmacien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id-Ph", referencedColumnName="id_Pharmacien")
     * })
     */
    private $idPh;

    public function getIdPn(): ?int
    {
        return $this->idPn;
    }

    public function getIdPr(): ?Produit
    {
        return $this->idPr;
    }

    public function setIdPr(?Produit $idPr): self
    {
        $this->idPr = $idPr;

        return $this;
    }

    public function getIdPh(): ?Pharmacien
    {
        return $this->idPh;
    }

    public function setIdPh(?Pharmacien $idPh): self
    {
        $this->idPh = $idPh;

        return $this;
    }


}
