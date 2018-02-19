<?php

namespace CoreBundle\Entity;

/**
 * DspBloc
 */
class DspBloc
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
     * @var bool
     */
    private $ssBloc;

    /**
     * @var int
     */
    private $numeroLigne;

    /**
     * @var int
     */
    private $cgObjet;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $longueur;

    /**
     * @var string
     */
    private $typeAcces;

    /**
     * @var string
     */
    private $crTxt;

    /**
     * @var string
     */
    private $infobulle;

    /**
     * @var string
     */
    private $crBloc;

    /**
     * @var string
     */
    private $urlImage;

    /**
     * @var string
     */
    private $labelSecondaire;

    /**
     * @var DspPage
     */
    private $dspPage;

     /**
     * @var VariableType
     */
    private $variableType;

    /**
     * @var VariableListeChoix
     */
    private $variableListeChoix;

    /**
     * @var VariableNom
     */
    private $variableNom;

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
     * @return DspBloc
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
     * @return DspBloc
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
     * Set ssBloc
     *
     * @param boolean $ssBloc
     *
     * @return DspBloc
     */
    public function setSsBloc($ssBloc)
    {
        $this->ssBloc = $ssBloc;

        return $this;
    }

    /**
     * Get ssBloc
     *
     * @return bool
     */
    public function getSsBloc()
    {
        return $this->ssBloc;
    }

    /**
     * Set numeroLigne
     *
     * @param integer $numeroLigne
     *
     * @return DspBloc
     */
    public function setNumeroLigne($numeroLigne)
    {
        $this->numeroLigne = $numeroLigne;

        return $this;
    }

    /**
     * Get numeroLigne
     *
     * @return int
     */
    public function getNumeroLigne()
    {
        return $this->numeroLigne;
    }

    /**
     * Set cgObjet
     *
     * @param integer $cgObjet
     *
     * @return DspBloc
     */
    public function setCgObjet($cgObjet)
    {
        $this->cgObjet = $cgObjet;

        return $this;
    }

    /**
     * Get cgObjet
     *
     * @return int
     */
    public function getCgObjet()
    {
        return $this->cgObjet;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return DspBloc
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set longueur
     *
     * @param integer $longueur
     *
     * @return DspBloc
     */
    public function setLongueur($longueur)
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * Get longueur
     *
     * @return int
     */
    public function getLongueur()
    {
        return $this->longueur;
    }

    /**
     * Set typeAcces
     *
     * @param string $typeAcces
     *
     * @return DspBloc
     */
    public function setTypeAcces($typeAcces)
    {
        $this->typeAcces = $typeAcces;

        return $this;
    }

    /**
     * Get typeAcces
     *
     * @return string
     */
    public function getTypeAcces()
    {
        return $this->typeAcces;
    }

    /**
     * Set crTxt
     *
     * @param string $crTxt
     *
     * @return DspBloc
     */
    public function setCrTxt($crTxt)
    {
        $this->crTxt = $crTxt;

        return $this;
    }

    /**
     * Get crTxt
     *
     * @return string
     */
    public function getCrTxt()
    {
        return $this->crTxt;
    }

    /**
     * Set infobulle
     *
     * @param string $infobulle
     *
     * @return DspBloc
     */
    public function setInfobulle($infobulle)
    {
        $this->infobulle = $infobulle;

        return $this;
    }

    /**
     * Get infobulle
     *
     * @return string
     */
    public function getInfobulle()
    {
        return $this->infobulle;
    }

    /**
     * Set crBloc
     *
     * @param string $crBloc
     *
     * @return DspBloc
     */
    public function setCrBloc($crBloc)
    {
        $this->crBloc = $crBloc;

        return $this;
    }

    /**
     * Get crBloc
     *
     * @return string
     */
    public function getCrBloc()
    {
        return $this->crBloc;
    }

    /**
     * Set urlImage
     *
     * @param string $urlImage
     *
     * @return DspBloc
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    /**
     * Get urlImage
     *
     * @return string
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }

    /**
     * Set labelSecondaire
     *
     * @param string $labelSecondaire
     *
     * @return DspBloc
     */
    public function setLabelSecondaire($labelSecondaire)
    {
        $this->labelSecondaire = $labelSecondaire;

        return $this;
    }

    /**
     * Get labelSecondaire
     *
     * @return string
     */
    public function getLabelSecondaire()
    {
        return $this->labelSecondaire;
    }

    /**
     * @return DspPage
     */
    public function getDspPage()
    {
        return $this->dspPage;
    }

    /**
     * @param DspPage $dspPage
     * @return DspBloc
     */
    public function setDspPage(DspPage $dspPage)
    {
        $this->dspPage = $dspPage;
        return $this;
    }

    /**
     * @return VariableType
     */
    public function getVariableType()
    {
        return $this->variableType;
    }

    /**
     * @param VariableType $variableType
     * @return DspBloc
     */
    public function setVariableType($variableType)
    {
        $this->variableType = $variableType;
        return $this;
    }

    /**
     * @return VariableListeChoix
     */
    public function getVariableListeChoix()
    {
        return $this->variableListeChoix;
    }

    /**
     * @param VariableListeChoix $variableListeChoix
     * @return DspBloc
     */
    public function setVariableListeChoix($variableListeChoix)
    {
        $this->variableListeChoix = $variableListeChoix;
        return $this;
    }

    /**
     * @return VariableNom
     */
    public function getVariableNom()
    {
        return $this->variableNom;
    }

    /**
     * @param VariableNom $variableNom
     * @return DspBloc
     */
    public function setVariableNom($variableNom)
    {
        $this->variableNom = $variableNom;
        return $this;
    }
}

