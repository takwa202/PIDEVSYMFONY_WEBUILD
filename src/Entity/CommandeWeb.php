<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeWeb
 *
 * @ORM\Table(name="commande_web", indexes={@ORM\Index(name="id_produit", columns={"id_produit"}), @ORM\Index(name="id_patien", columns={"id_patien"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CommandeWebRepository")
 */
class CommandeWeb
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_comd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComd;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="Destination", type="string", length=255, nullable=false)
     */
    private $destination;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_comd", type="datetime")
     */
    private $dateComd;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produit", referencedColumnName="id_prod")
     * })
     */
    private $idProduit;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_patien", referencedColumnName="Id_patient")
     * })
     */
    private $idPatien;

    public function getIdComd(): ?int
    {
        return $this->idComd;
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

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDateComd(): ?\DateTimeInterface
    {
        return $this->dateComd;
    }

    public function setDateComd(\DateTimeInterface $dateComd): self
    {
        $this->dateComd = $dateComd;

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

    public function getIdPatien(): ?Patient
    {
        return $this->idPatien;
    }

    public function setIdPatien(?Patient $idPatien): self
    {
        $this->idPatien = $idPatien;

        return $this;
    }


}
