<?php

namespace CoreBundle\Entity;

/**
 * PatientConsultation
 */
class PatientConsultation
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $nip;

    /**
     * @var int
     */
    private $nipro;

    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var int
     */
    private $iteration;

    /**
     * @var \DateTime
     */
    private $dateModification;

    /**
     * @var string
     */
    private $var;

    /**
     * @var string
     */
    private $val;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PatientConsultation
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * @param int $nip
     * @return PatientConsultation
     */
    public function setNip($nip)
    {
        $this->nip = $nip;
        return $this;
    }

    /**
     * @return int
     */
    public function getNipro()
    {
        return $this->nipro;
    }

    /**
     * @param int $nipro
     * @return PatientConsultation
     */
    public function setNipro($nipro)
    {
        $this->nipro = $nipro;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param string $commentaire
     * @return PatientConsultation
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    /**
     * @return int
     */
    public function getIteration()
    {
        return $this->iteration;
    }

    /**
     * @param int $iteration
     * @return PatientConsultation
     */
    public function setIteration($iteration)
    {
        $this->iteration = $iteration;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * @param \DateTime $dateModification
     * @return PatientConsultation
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
        return $this;
    }

    /**
     * @return string
     */
    public function getVar()
    {
        return $this->var;
    }

    /**
     * @param string $var
     * @return PatientConsultation
     */
    public function setVar($var)
    {
        $this->var = $var;
        return $this;
    }

    /**
     * @return string
     */
    public function getVal()
    {
        return $this->val;
    }

    /**
     * @param string $val
     * @return PatientConsultation
     */
    public function setVal($val)
    {
        $this->val = $val;
        return $this;
    }
}

