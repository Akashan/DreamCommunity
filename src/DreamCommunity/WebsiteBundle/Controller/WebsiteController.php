<?php
namespace DreamCommunity\WebsiteBundle\Controller;

use DreamCommunity\WebsiteBundle\Entity\User;
use DreamCommunity\WebsiteBundle\Entity\Video;
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
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:User');

        $listeMembres = $repository->findAll();

        return $this->render('DreamCommunityWebsiteBundle:Website:membres.html.twig', array('membres' => $listeMembres));
    }
    public function membreAction($id)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:User');

        $membre = $repository->find($id);

        return $this->render('DreamCommunityWebsiteBundle:Website:membre.html.twig', array( 'membre' => $membre));
    }
    public function videosAction()
    {
        $user = new User();
        $user->setNom("moi");

        $liste = array();

        for($i = 0; $i <= 10; $i++)
        {
            $video = new Video();
            $video->setTitre("Titre de ma vidéo");
            $video->setMiniature("sldkjf");
            $video->setUser($user);

            $liste[] = $video;
        }

        return $this->render('DreamCommunityWebsiteBundle:Website:videos.html.twig', array('liste_videos' => $liste));
    }
    public function videoAction($id)
    {
        $user = new User();
        $user->setNom("moi");

        $video = new Video();
        $video->setTitre("Titre de ma vidéo");
        $video->setMiniature("sldkjf");
        $video->setUser($user);

        return $this->render('DreamCommunityWebsiteBundle:Website:video.html.twig', array('video' => $video));
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

    public function ajoutVideoAction(){
        return $this->render('DreamCommunityWebsiteBundle:Website:ajoutVideo.html.twig', array());
    }
    public function modifVideoAction($id){
        return $this->render('DreamCommunityWebsiteBundle:Website:modifVideo.html.twig', array());
    }
    public function supprimVideoAction($id){
        return $this->render('DreamCommunityWebsiteBundle:Website:supprimVideo.html.twig', array());
    }

    public function vueProfilAction(){
        return $this->render('DreamCommunityWebsiteBundle:Website:vueProfil.html.twig', array());
    }
    public function modifierProfilAction(){
        return $this->render('DreamCommunityWebsiteBundle:Website:modifProfil.html.twig', array());
    }
    public function mesVideosAction(){
        return $this->render('DreamCommunityWebsiteBundle:Website:mesVideos.html.twig', array());
    }

    public function menuAdminAction(){
        return $this->render('DreamCommunityWebsiteBundle:Website:menuAdmin.html.twig');
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