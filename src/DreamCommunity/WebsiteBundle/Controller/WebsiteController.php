<?php
namespace DreamCommunity\WebsiteBundle\Controller;

use DreamCommunity\WebsiteBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class WebsiteController extends Controller
{
    public function indexAction($id)
    {
        return $this->render('DreamCommunityWebsiteBundle:Website:index.html.twig', array());
    }
    public function membresAction()
    {
        return $this->render('DreamCommunityWebsiteBundle:Website:membres.html.twig', array());
    }
    public function membreAction($id)
    {
        $membre = new User();
        $membre->setNom("Akashan");
        $membre->setUrlYoutube("yt");
        $membre->setUrlOther("other");
        $membre->setImage("twitter.png");
        $membre->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique diam non blandit pellentesque. Curabitur et mi vel arcu ultrices accumsan. In mollis libero nec purus facilisis scelerisque. Fusce vel metus vitae ipsum mattis vehicula. Sed sagittis egestas nibh, vitae consectetur ipsum mattis porttitor. Etiam nec elit eu orci condimentum tempor. Suspendisse eleifend mi justo, at fermentum lectus lacinia vel.");

        return $this->render('DreamCommunityWebsiteBundle:Website:membre.html.twig', array( 'membre' => $membre));
    }
    public function videosAction()
    {
        return $this->render('DreamCommunityWebsiteBundle:Website:videos.html.twig', array());
    }
    public function videoAction($id)
    {
        return $this->render('DreamCommunityWebsiteBundle:Website:video.html.twig', array());
    }
    public function forumAction()
    {
        return $this->render('DreamCommunityWebsiteBundle:Website:forum.html.twig', array());
    }
    public function contactsAction()
    {
        return $this->render('DreamCommunityWebsiteBundle:Website:contacts.html.twig', array());
    }
    public function liensAction()
    {
        return $this->render('DreamCommunityWebsiteBundle:Website:liens.html.twig', array());
    }

    public function menuAction($nb)
    {
        // On fixe en dur une liste ici, bien entendu par la suite on la récupérera depuis la BDD !
        $liste = array(
            array('id' => 2, 'titre' => 'Mon dernier weekend !', 'auteur' => 'moi'),
            array('id' => 5, 'titre' => 'Sortie de Symfony2.1', 'auteur' => 'moi'),
            array('id' => 9, 'titre' => 'Petit test', 'auteur' => 'moi')
        );

        return $this->render('DreamCommunityWebsiteBundle:Website:menu.html.twig', array(
            'liste_videos' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
        ));
    }
}