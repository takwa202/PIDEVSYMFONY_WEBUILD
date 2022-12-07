<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandePatient
 *
 * @ORM\Table(name="commande_patient")
 * @ORM\Entity
 */
class CommandePatient
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_comd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComd;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Pat", type="string", length=255, nullable=false)
     */
    private $nomPat;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom_Pat", type="string", length=255, nullable=false)
     */
    private $prenomPat;

    /**
     * @var string
     *
     * @ORM\Column(name="Adress_Pat", type="string", length=255, nullable=false)
     */
    private $adressPat;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Produit", type="string", length=255, nullable=false)
     */
    private $nomProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="Categorie", type="string", length=255, nullable=false)
     */
    private $categorie;

    /**
     * @var int
     *
     * @ORM\Column(name="Quantite", type="integer", nullable=false)
     */
    private $quantite;

    public function getIdComd(): ?int
    {
        return $this->idComd;
    }

    public function getNomPat(): ?string
    {
        return $this->nomPat;
    }

    public function setNomPat(string $nomPat): self
    {
        $this->nomPat = $nomPat;

        return $this;
    }

    public function getPrenomPat(): ?string
    {
        return $this->prenomPat;
    }

    public function setPrenomPat(string $prenomPat): self
    {
        $this->prenomPat = $prenomPat;

        return $this;
    }

    public function getAdressPat(): ?string
    {
        return $this->adressPat;
    }

    public function setAdressPat(string $adressPat): self
    {
        $this->adressPat = $adressPat;

        return $this;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
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


}
