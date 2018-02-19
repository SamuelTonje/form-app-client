<?php

namespace CoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * DspPage
 */
class DspPage
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $pageLabel;

    /**
     * @var bool
     */
    private $tpPage;

    /**
     * @var int
     */
    private $nombreBloc;

    /**
     * @var \DateTime
     */
    private $dateCreation;

    /**
     * @var \DateTime
     */
    private $dateSuppression;

    /**
     * @var Dsp
     */
    private $dsp;

    /**
     * @var ArrayCollection
     */
    private $dspBlocs;

    public function __construct()
    {
        $this->dspBlocs = new ArrayCollection();
    }

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
     * Set code
     *
     * @param integer $code
     *
     * @return DspPage
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return DspPage
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
     * Set pageLabel
     *
     * @param string $pageLabel
     *
     * @return DspPage
     */
    public function setPageLabel($pageLabel)
    {
        $this->pageLabel = $pageLabel;

        return $this;
    }

    /**
     * Get pageLabel
     *
     * @return string
     */
    public function getPageLabel()
    {
        return $this->pageLabel;
    }

    /**
     * Set tpPage
     *
     * @param boolean $tpPage
     *
     * @return DspPage
     */
    public function setTpPage($tpPage)
    {
        $this->tpPage = $tpPage;

        return $this;
    }

    /**
     * Get tpPage
     *
     * @return bool
     */
    public function getTpPage()
    {
        return $this->tpPage;
    }

    /**
     * Set nombreBloc
     *
     * @param integer $nombreBloc
     *
     * @return DspPage
     */
    public function setNombreBloc($nombreBloc)
    {
        $this->nombreBloc = $nombreBloc;

        return $this;
    }

    /**
     * Get nombreBloc
     *
     * @return int
     */
    public function getNombreBloc()
    {
        return $this->nombreBloc;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return DspPage
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateSuppression
     *
     * @param \DateTime $dateSuppression
     *
     * @return DspPage
     */
    public function setDateSuppression($dateSuppression)
    {
        $this->dateSuppression = $dateSuppression;

        return $this;
    }

    /**
     * Get dateSuppression
     *
     * @return \DateTime
     */
    public function getDateSuppression()
    {
        return $this->dateSuppression;
    }

    /**
     * @return Dsp
     */
    public function getDsp()
    {
        return $this->dsp;
    }

    /**
     * @param Dsp $dsp
     * @return DspPage
     */
    public function setDsp(Dsp $dsp)
    {
        $this->dsp = $dsp;
        return $this;
    }

    /**
     * @param DspBloc $dspBloc
     * @return $this
     */
    public function addDspBlocs(DspBloc $dspBloc)
    {
        $this->dspBlocs[] = $dspBloc;

        return $this;
    }

    /**
     * @param DspBloc $dspBloc
     * @return $this
     */
    public function removeDspBlocs(DspBloc $dspBloc)
    {
        $this->dspBlocs->removeElement($dspBloc);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDspBlocs()
    {
        return $this->dspBlocs;
    }

}

