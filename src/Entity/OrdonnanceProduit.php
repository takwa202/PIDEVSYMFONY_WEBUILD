<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdonnanceProduit
 *
 * @ORM\Table(name="ordonnance_produit", indexes={@ORM\Index(name="id_ordonnance", columns={"id_ordonnance"}), @ORM\Index(name="id_produit", columns={"id_produit"})})
 * @ORM\Entity
 */
class OrdonnanceProduit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ordoProd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrdoprod;

    /**
     * @var \Ordonnance
     *
     * @ORM\ManyToOne(targetEntity="Ordonnance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ordonnance", referencedColumnName="Id_ordonnance")
     * })
     */
    private $idOrdonnance;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produit", referencedColumnName="id_prod")
     * })
     */
    private $idProduit;

    public function getIdOrdoprod(): ?int
    {
        return $this->idOrdoprod;
    }

    public function getIdOrdonnance(): ?Ordonnance
    {
        return $this->idOrdonnance;
    }

    public function setIdOrdonnance(?Ordonnance $idOrdonnance): self
    {
        $this->idOrdonnance = $idOrdonnance;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?Produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }


}
