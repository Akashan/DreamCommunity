<?php
namespace DreamCommunity\WebsiteBundle\Controller;

use DreamCommunity\WebsiteBundle\Entity\User;
use DreamCommunity\WebsiteBundle\Entity\Video;
use DreamCommunity\WebsiteBundle\Form\UserType;
use DreamCommunity\WebsiteBundle\Form\UserEditType;
use DreamCommunity\WebsiteBundle\Form\VideoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class WebsiteController extends Controller
{
    public function indexAction($id)
    {
        /*$user = new User;

        $encoder = $this->get('security.encoder_factory')->getEncoder($user);
        $encodedPass = $encoder->encodePassword("Aze021Ail!", $user->getSalt());

        // Le nom d'utilisateur et le mot de passe sont identiques
        $user->setUsername("Akashan");
        $user->setPassword($encodedPass);
        $user->setDescription("moi");
        $user->setImage("xxx");
        $user->setEmail("akashan31@gmail.com");
        $user->setIsDeleted(false);
        $user->setIsValidated(true);
        $user->setNbVue(0);
        $user->setNom("Akashan");

        $user->setLastLogin(new \Datetime());

        // Le sel et les rôles sont vides pour l'instant
        $user->setSalt('');
        $user->setRoles(array('ROLE_SUPER_ADMIN'));

        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        // Étape 1 : On « persiste » l'entité
        $em->persist($user);

        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();*/

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

        return $this->render('DreamCommunityWebsiteBundle:Website:membre.html.twig', array('membre' => $membre));
    }
    public function videosAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Video');

        $liste = $repository->findBy(array(), array('datePublication' => 'desc', 'id' => 'desc'));

        return $this->render('DreamCommunityWebsiteBundle:Website:videos.html.twig', array('liste_videos' => $liste));
    }
    public function videoAction($id)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Video');

        $video = $repository->find($id);

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
        $video = new Video;

        // On crée le formulaire grâce à l'ArticleType
        $form = $this->createForm(new VideoType(), $video);

        // On récupère la requête
        $request = $this->getRequest();

        if( $request->get('cancel') == 'Cancel' )
            return $this->redirect($this->generateUrl('dream_community_website_accueil'));

        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {

                $video->setDateCreation(new \DateTime());
                $video->setMiniature("");
                $video->setNbVue(0);
                $video->setIsDeleted(false);

                $video->setUser($this->getUser());
                // On enregistre notre objet $article dans la base de données
                $em = $this->getDoctrine()->getManager();

                $em->persist($video);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Membre bien ajouté');

                // On redirige vers la page de visualisation de l'article nouvellement créé
                return $this->redirect($this->generateUrl('dream_community_website_video', array('id' => $video->getId())));
            }
        }

        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau

        return $this->render('DreamCommunityWebsiteBundle:Website:ajoutVideo.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function modifVideoAction($id){
        return $this->render('DreamCommunityWebsiteBundle:Website:modifVideo.html.twig', array());
    }
    public function supprimVideoAction($id){
        return $this->render('DreamCommunityWebsiteBundle:Website:supprimVideo.html.twig', array());
    }

    public function vueProfilAction(){
        $user = $this->getUser();

        if (null === $user) {
            // Ici, l'utilisateur est anonyme ou l'URL n'est pas derrière un pare-feu
            return $this->render('DreamCommunityWebsiteBundle:Website:index.html.twig', array());
        } else {
            return $this->render('DreamCommunityWebsiteBundle:Website:vueProfil.html.twig', array('membre' => $user));
        }
    }
    public function modifierProfilAction(){
        $user = $this->getUser();

        // On utiliser le ArticleEditType
        $form = $this->createForm(new UserEditType(), $user);

        $request = $this->getRequest();

        if( $request->get('cancel') == 'Cancel' )
            return $this->redirect($this->generateUrl('dream_community_website_vue_profil'));

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                // On enregistre l'article
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Profil modifié');

                return $this->redirect($this->generateUrl('dream_community_website_vue_profil'));
            }
        }

        return $this->render('DreamCommunityWebsiteBundle:Website:modifProfil.html.twig', array(
            'form'    => $form->createView(),
            'user' => $user
        ));
    }
    public function mesVideosAction(){
        return $this->render('DreamCommunityWebsiteBundle:Website:mesVideos.html.twig', array());
    }

    public function ajoutMembreAction(){
        $user = new User;

        // On crée le formulaire grâce à l'ArticleType
        $form = $this->createForm(new UserType(), $user);

        // On récupère la requête
        $request = $this->getRequest();

        if( $request->get('cancel') == 'Cancel' )
            return $this->redirect($this->generateUrl('dream_community_website_accueil'));

        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $article dans la base de données
                $em = $this->getDoctrine()->getManager();

                $encoder = $this->get('security.encoder_factory')->getEncoder($user);
                $encodedPass = $encoder->encodePassword($user->getPassword(), $user->getSalt());

                $user->setPassword($encodedPass);
                $user->setNbVue(0);
                $user->setIsValidated(1);
                $user->setIsDeleted(0);
                $user->setSalt("");

                $em->persist($user);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Membre bien ajouté');

                // On redirige vers la page de visualisation de l'article nouvellement créé
                return $this->redirect($this->generateUrl('dream_community_website_membre', array('id' => $user->getId())));
            }
        }

        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau

        return $this->render('DreamCommunityWebsiteBundle:Website:ajoutMembre.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function modifMembreAction($id){
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:User');

        $user = $repository->find($id);

        // On utiliser le ArticleEditType
        $form = $this->createForm(new UserEditType(), $user);

        $request = $this->getRequest();

        if( $request->get('cancel') == 'Cancel' )
            return $this->redirect($this->generateUrl('dream_community_website_membre', array('id' => $user->getId())));

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                // On enregistre l'article
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Membre bien modifié');

                return $this->redirect($this->generateUrl('dream_community_website_membre', array('id' => $user->getId())));
            }
        }

        return $this->render('DreamCommunityWebsiteBundle:Website:modifMembre.html.twig', array(
            'form'    => $form->createView(),
            'user' => $user
        ));
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