<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pharmacien
 *
 * @ORM\Table(name="pharmacien")
 * @ORM\Entity(repositoryClass="App\Repository\PharmacienRepository")
 */
class Pharmacien
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_Pharmacien", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPharmacien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_Pharmacien", type="string", length=255, nullable=true)
     */
    private $nomPharmacien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom_Pharmacien", type="string", length=255, nullable=true)
     */
    private $prenomPharmacien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adress_Pharmacien", type="string", length=255, nullable=true)
     */
    private $adressPharmacien;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTel_Pharmacien", type="integer", nullable=true)
     */
    private $numtelPharmacien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motDePasse_Pharmacien", type="string", length=255, nullable=true)
     */
    private $motdepassePharmacien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_Pharmacien", type="string", length=255, nullable=true)
     */
    private $emailPharmacien;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="blockfarm", type="boolean", nullable=true)
     */
    private $blockfarm;

    public function getIdPharmacien(): ?int
    {
        return $this->idPharmacien;
    }

    public function getNomPharmacien(): ?string
    {
        return $this->nomPharmacien;
    }

    public function setNomPharmacien(?string $nomPharmacien): self
    {
        $this->nomPharmacien = $nomPharmacien;

        return $this;
    }

    public function getPrenomPharmacien(): ?string
    {
        return $this->prenomPharmacien;
    }

    public function setPrenomPharmacien(?string $prenomPharmacien): self
    {
        $this->prenomPharmacien = $prenomPharmacien;

        return $this;
    }

    public function getAdressPharmacien(): ?string
    {
        return $this->adressPharmacien;
    }

    public function setAdressPharmacien(?string $adressPharmacien): self
    {
        $this->adressPharmacien = $adressPharmacien;

        return $this;
    }

    public function getNumtelPharmacien(): ?int
    {
        return $this->numtelPharmacien;
    }

    public function setNumtelPharmacien(?int $numtelPharmacien): self
    {
        $this->numtelPharmacien = $numtelPharmacien;

        return $this;
    }

    public function getMotdepassePharmacien(): ?string
    {
        return $this->motdepassePharmacien;
    }

    public function setMotdepassePharmacien(?string $motdepassePharmacien): self
    {
        $this->motdepassePharmacien = $motdepassePharmacien;

        return $this;
    }

    public function getEmailPharmacien(): ?string
    {
        return $this->emailPharmacien;
    }

    public function setEmailPharmacien(?string $emailPharmacien): self
    {
        $this->emailPharmacien = $emailPharmacien;

        return $this;
    }

    public function isBlockfarm(): ?bool
    {
        return $this->blockfarm;
    }

    public function setBlockfarm(?bool $blockfarm): self
    {
        $this->blockfarm = $blockfarm;

        return $this;
    }


}
