<?php

namespace CoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TypeObjet
 */
class VariableType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var ArrayCollection
     */
    protected $dspBlocs;

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
     * @param string $code
     *
     * @return VariableType
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return VariableType
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
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

