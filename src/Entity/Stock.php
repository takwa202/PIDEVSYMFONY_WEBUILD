<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity
 */
class Stock
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_produit", type="string", length=255, nullable=true)
     */
    private $nomProduit;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantite_produit", type="integer", nullable=true)
     */
    private $quantiteProduit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_produit", type="string", length=255, nullable=true)
     */
    private $imageProduit;

    /**
     * @var int|null
     *
     * @ORM\Column(name="prix_produit", type="integer", nullable=true)
     */
    private $prixProduit;

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(?string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getQuantiteProduit(): ?int
    {
        return $this->quantiteProduit;
    }

    public function setQuantiteProduit(?int $quantiteProduit): self
    {
        $this->quantiteProduit = $quantiteProduit;

        return $this;
    }

    public function getImageProduit(): ?string
    {
        return $this->imageProduit;
    }

    public function setImageProduit(?string $imageProduit): self
    {
        $this->imageProduit = $imageProduit;

        return $this;
    }

    public function getPrixProduit(): ?int
    {
        return $this->prixProduit;
    }

    public function setPrixProduit(?int $prixProduit): self
    {
        $this->prixProduit = $prixProduit;

        return $this;
    }


}
