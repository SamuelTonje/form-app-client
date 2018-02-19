<?php

namespace CoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * VariableListeChoix
 */
class VariableListeChoix
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
    private $numeroItem;

    /**
     * @var string
     */
    private $labelItem;

    /**
     * @var string
     */
    private $codeItem;

    /**
     * @var bool
     */
    private $defaut;

    /**
     * @var string
     */
    private $tpListe;

    /**
     * @var string
     */
    private $description;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return VariableListeChoix
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
     * Set numeroItem
     *
     * @param integer $numeroItem
     *
     * @return VariableListeChoix
     */
    public function setNumeroItem($numeroItem)
    {
        $this->numeroItem = $numeroItem;

        return $this;
    }

    /**
     * Get numeroItem
     *
     * @return int
     */
    public function getNumeroItem()
    {
        return $this->numeroItem;
    }

    /**
     * Set labelItem
     *
     * @param string $labelItem
     *
     * @return VariableListeChoix
     */
    public function setLabelItem($labelItem)
    {
        $this->labelItem = $labelItem;

        return $this;
    }

    /**
     * Get labelItem
     *
     * @return string
     */
    public function getLabelItem()
    {
        return $this->labelItem;
    }

    /**
     * Set codeItem
     *
     * @param string $codeItem
     *
     * @return VariableListeChoix
     */
    public function setCodeItem($codeItem)
    {
        $this->codeItem = $codeItem;

        return $this;
    }

    /**
     * Get codeItem
     *
     * @return string
     */
    public function getCodeItem()
    {
        return $this->codeItem;
    }

    /**
     * Set defaut
     *
     * @param boolean $defaut
     *
     * @return VariableListeChoix
     */
    public function setDefaut($defaut)
    {
        $this->defaut = $defaut;

        return $this;
    }

    /**
     * Get defaut
     *
     * @return bool
     */
    public function getDefaut()
    {
        return $this->defaut;
    }

    /**
     * Set tpListe
     *
     * @param string $tpListe
     *
     * @return VariableListeChoix
     */
    public function setTpListe($tpListe)
    {
        $this->tpListe = $tpListe;

        return $this;
    }

    /**
     * Get tpListe
     *
     * @return string
     */
    public function getTpListe()
    {
        return $this->tpListe;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return VariableListeChoix
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

