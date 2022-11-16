<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CertificatMedical
 *
 * @ORM\Table(name="certificat_medical")
 * @ORM\Entity(repositoryClass="App\Repository\CertificatMedicalRepository")
 */
class CertificatMedical
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCertif", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcertif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeCertif", type="string", length=255, nullable=true)
     */
    private $typecertif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="designation", type="string", length=255, nullable=true)
     */
    private $designation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom_patient", type="string", length=255, nullable=true)
     */
    private $nomPatient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Prénom_patient", type="string", length=255, nullable=true)
     */
    private $prénomPatient;

    public function getIdcertif(): ?int
    {
        return $this->idcertif;
    }

    public function getTypecertif(): ?string
    {
        return $this->typecertif;
    }

    public function setTypecertif(?string $typecertif): self
    {
        $this->typecertif = $typecertif;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getNomPatient(): ?string
    {
        return $this->nomPatient;
    }

    public function setNomPatient(?string $nomPatient): self
    {
        $this->nomPatient = $nomPatient;

        return $this;
    }

    public function getPrénomPatient(): ?string
    {
        return $this->prénomPatient;
    }

    public function setPrénomPatient(?string $prénomPatient): self
    {
        $this->prénomPatient = $prénomPatient;

        return $this;
    }


}
