<?php

namespace CoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * NomObjet
 */
class VariableNom
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
    private $numero;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var \DateTime
     */
    private $dateCreation;

    /**
     * @var \DateTime
     */
    private $dateModification;

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
     * @return VariableNom
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return VariableNom
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return VariableNom
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return VariableNom
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
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return VariableNom
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

