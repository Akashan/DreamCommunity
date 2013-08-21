<?php

namespace DreamCommunity\WebsiteBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * VideoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VideoRepository extends EntityRepository
{
    public function getVideos($nombreParPage, $page)
    {
        // On déplace la vérification du numéro de page dans cette méthode
        if ($page < 1) {
            throw new \InvalidArgumentException('L\'argument $page ne peut être inférieur à 1 (valeur : "'.$page.'").');
        }

        // La construction de la requête reste inchangée
        $query = $this->createQueryBuilder('a')
            ->where('a.isDeleted = :isdel')
            ->setParameter(':isdel', false)
            ->orderBy('a.datePublication', 'DESC')
            ->getQuery();

        // On définit l'article à partir duquel commencer la liste
        $query->setFirstResult(($page-1) * $nombreParPage)
            // Ainsi que le nombre de vidéos à afficher
            ->setMaxResults($nombreParPage);

        // Enfin, on retourne l'objet Paginator correspondant à la requête construite
        // (n'oubliez pas le use correspondant en début de fichier)
        return new Paginator($query);
    }
}
