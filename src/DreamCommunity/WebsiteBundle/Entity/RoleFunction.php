<?php

namespace DreamCommunity\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoleFunction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DreamCommunity\WebsiteBundle\Entity\RoleFunctionRepository")
 */
class RoleFunction
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="DreamCommunity\WebsiteBundle\Entity\Fonction")
     */
    private $fonction;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="DreamCommunity\WebsiteBundle\Entity\UserRole")
     */
    private $userRole;

    /**
     * @var boolean
     *
     * @ORM\Column(name="granted", type="boolean")
     */
    private $granted;

    /**
     * Set granted
     *
     * @param boolean $granted
     * @return RoleFunction
     */
    public function setGranted($granted)
    {
        $this->granted = $granted;
    
        return $this;
    }

    /**
     * Get granted
     *
     * @return boolean 
     */
    public function getGranted()
    {
        return $this->granted;
    }

    /**
     * Set fonction
     *
     * @param \DreamCommunity\WebsiteBundle\Entity\Fonction $fonction
     * @return RoleFunction
     */
    public function setFonction(\DreamCommunity\WebsiteBundle\Entity\Fonction $fonction)
    {
        $this->fonction = $fonction;
    
        return $this;
    }

    /**
     * Get fonction
     *
     * @return \DreamCommunity\WebsiteBundle\Entity\Fonction 
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set userRole
     *
     * @param \DreamCommunity\WebsiteBundle\Entity\UserRole $userRole
     * @return RoleFunction
     */
    public function setUserRole(\DreamCommunity\WebsiteBundle\Entity\UserRole $userRole)
    {
        $this->userRole = $userRole;
    
        return $this;
    }

    /**
     * Get userRole
     *
     * @return \DreamCommunity\WebsiteBundle\Entity\UserRole 
     */
    public function getUserRole()
    {
        return $this->userRole;
    }
}