<?php

namespace DreamCommunity\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRole
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DreamCommunity\WebsiteBundle\Entity\UserRoleRepository")
 */
class UserRole
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="DreamCommunity\WebsiteBundle\Entity\UserRole")
     * @ORM\JoinColumn(nullable=true)
     */
    private $parent;

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
     * Set code
     *
     * @param string $code
     * @return UserRole
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
     * Set nom
     *
     * @param string $nom
     * @return UserRole
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
     * Set parent
     *
     * @param \DreamCommunity\WebsiteBundle\Entity\UserRole $parent
     * @return UserRole
     */
    public function setParent(\DreamCommunity\WebsiteBundle\Entity\UserRole $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \DreamCommunity\WebsiteBundle\Entity\UserRole 
     */
    public function getParent()
    {
        return $this->parent;
    }
}