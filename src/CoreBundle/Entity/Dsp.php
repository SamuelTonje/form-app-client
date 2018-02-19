<?php

namespace CoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Dsp
 */
class Dsp
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $numero;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $code;

    /**
     * @var bool
     */
    private $imagerie;

    /**
     * @var bool
     */
    private $audio;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $codeService;

    /**
     * @var \DateTime
     */
    private $dateCreation;

    /**
     * @var \DateTime
     */
    private $dateSuppression;

    /**
     * @var ArrayCollection
     */
    protected $dspPages;

    public function __construct()
    {
        $this->pages = new ArrayCollection();
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Dsp
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Dsp
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
     * Set code
     *
     * @param string $code
     *
     * @return Dsp
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set imagerie
     *
     * @param boolean $imagerie
     *
     * @return Dsp
     */
    public function setImagerie($imagerie)
    {
        $this->imagerie = $imagerie;

        return $this;
    }

    /**
     * Get imagerie
     *
     * @return bool
     */
    public function getImagerie()
    {
        return $this->imagerie;
    }

    /**
     * Set audio
     *
     * @param boolean $audio
     *
     * @return Dsp
     */
    public function setAudio($audio)
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * Get audio
     *
     * @return bool
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Dsp
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set codeService
     *
     * @param string $codeService
     *
     * @return Dsp
     */
    public function setCodeService($codeService)
    {
        $this->codeService = $codeService;

        return $this;
    }

    /**
     * Get codeService
     *
     * @return string
     */
    public function getCodeService()
    {
        return $this->codeService;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Dsp
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
     * @return Dsp
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
     * @param DspPage $pages
     * @return $this
     */
    public function addDspPages(DspPage $pages)
    {
        $this->dspPages[] = $pages;

        return $this;
    }

    /**
     * @param DspPage $pages
     * @return $this
     */
    public function removeDspPages(DspPage $pages)
    {
        $this->dspPages->removeElement($pages);

        return $this;
    }

    /**
     * Get pagess.
     *
     * @return ArrayCollection
     */
    public function getDspPages()
    {
        return $this->dspPages;
    }
}

