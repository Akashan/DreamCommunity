<?php

namespace DreamCommunity\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DreamCommunity\WebsiteBundle\Entity\UserRepository")
 */
class User
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
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=255)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastLogin", type="datetime")
     */
    private $lastLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="urlYoutube", type="string", length=255)
     */
    private $urlYoutube;

    /**
     * @var string
     *
     * @ORM\Column(name="urlTwitter", type="string", length=255)
     */
    private $urlTwitter;

    /**
     * @var string
     *
     * @ORM\Column(name="urlFacebook", type="string", length=255)
     */
    private $urlFacebook;

    /**
     * @var string
     *
     * @ORM\Column(name="urlOther", type="string", length=255)
     */
    private $urlOther;

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
     * @ORM\ManyToOne(targetEntity="DreamCommunity\WebsiteBundle\Entity\UserRole")
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

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
     * Set login
     *
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return User
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    
        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
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
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    
        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set urlYoutube
     *
     * @param string $urlYoutube
     * @return User
     */
    public function setUrlYoutube($urlYoutube)
    {
        $this->urlYoutube = $urlYoutube;

        return $this;
    }

    /**
     * Get urlYoutube
     *
     * @return string
     */
    public function getUrlYoutube()
    {
        return $this->urlYoutube;
    }

    /**
     * Set urlTwitter
     *
     * @param string $urlTwitter
     * @return User
     */
    public function setUrlTwitter($urlTwitter)
    {
        $this->urlTwitter = $urlTwitter;

        return $this;
    }

    /**
     * Get urlTwitter
     *
     * @return string
     */
    public function getUrlTwitter()
    {
        return $this->urlTwitter;
    }

    /**
     * Set urlFacebook
     *
     * @param string $urlFacebook
     * @return User
     */
    public function setUrlFacebook($urlFacebook)
    {
        $this->urlFacebook = $urlFacebook;

        return $this;
    }

    /**
     * Get urlFacebook
     *
     * @return string
     */
    public function getUrlFacebook()
    {
        return $this->urlFacebook;
    }

    /**
     * Set urlOther
     *
     * @param string $urlOther
     * @return User
     */
    public function setUrlOther($urlOther)
    {
        $this->urlOther = $urlOther;

        return $this;
    }

    /**
     * Get urlOther
     *
     * @return string
     */
    public function getUrlOther()
    {
        return $this->urlOther;
    }

    /**
     * Set nbVue
     *
     * @param integer $nbVue
     * @return User
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
     * @return User
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
     * Set role
     *
     * @param \DreamCommunity\WebsiteBundle\Entity\UserRole $role
     * @return User
     */
    public function setRole(\DreamCommunity\WebsiteBundle\Entity\UserRole $role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return \DreamCommunity\WebsiteBundle\Entity\UserRole 
     */
    public function getRole()
    {
        return $this->role;
    }
}