<?php

namespace CoreBundle\Entity;

/**
 * HistoriquePatient
 */
class PatientHistorique
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var int
     */
    private $nip;

    /**
     * @var int
     */
    private $nipro;

    /**
     * @var \DateTime
     */
    private $dateModification;

    /**
     * @var \DateTime
     */
    private $datePro;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return PatientHistorique
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nip
     *
     * @param integer $nip
     *
     * @return PatientHistorique
     */
    public function setNip($nip)
    {
        $this->nip = $nip;

        return $this;
    }

    /**
     * Get nip
     *
     * @return int
     */
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * Set nipro
     *
     * @param integer $nipro
     *
     * @return PatientHistorique
     */
    public function setNipro($nipro)
    {
        $this->nipro = $nipro;

        return $this;
    }

    /**
     * Get nipro
     *
     * @return int
     */
    public function getNipro()
    {
        return $this->nipro;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return PatientHistorique
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set datePro
     *
     * @param \DateTime $datePro
     *
     * @return PatientHistorique
     */
    public function setDatePro($datePro)
    {
        $this->datePro = $datePro;

        return $this;
    }

    /**
     * Get datePro
     *
     * @return \DateTime
     */
    public function getDatePro()
    {
        return $this->datePro;
    }
}

