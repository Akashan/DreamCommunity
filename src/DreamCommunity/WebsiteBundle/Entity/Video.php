<?php

namespace DreamCommunity\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DreamCommunity\WebsiteBundle\Entity\VideoRepository")
 */
class Video
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="urlVideo", type="string", length=255)
     */
    private $urlVideo;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePublication", type="datetime")
     */
    private $datePublication;

    /**
     * @var array
     *
     * @ORM\Column(name="keywords", type="array")
     */
    private $keywords;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbVue", type="integer")
     */
    private $nbVue;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isDeleted", type="boolean")
     */
    private $isDeleted;

    /**
     * @ORM\ManyToOne(targetEntity="DreamCommunity\WebsiteBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set urlVideo
     *
     * @param string $urlVideo
     * @return Video
     */
    public function setUrlVideo($urlVideo)
    {
        $this->urlVideo = $urlVideo;
    
        return $this;
    }

    /**
     * Get urlVideo
     *
     * @return string 
     */
    public function getUrlVideo()
    {
        return $this->urlVideo;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Video
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Video
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Video
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
     * Set datePublication
     *
     * @param \DateTime $datePublication
     * @return Video
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
    
        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime 
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set keywords
     *
     * @param array $keywords
     * @return Video
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    
        return $this;
    }

    /**
     * Get keywords
     *
     * @return array 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set nbVue
     *
     * @param integer $nbVue
     * @return Video
     */
    public function setNbVue($nbVue)
    {
        $this->nbVue = $nbVue;
    
        return $this;
    }

    /**
     * Get nbVue
     *
     * @return integer 
     */
    public function getNbVue()
    {
        return $this->nbVue;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return Video
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    
        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set user
     *
     * @param \DreamCommunity\WebsiteBundle\Entity\User $user
     * @return Video
     */
    public function setUser(\DreamCommunity\WebsiteBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \DreamCommunity\WebsiteBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}