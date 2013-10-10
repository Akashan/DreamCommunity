<?php
namespace DreamCommunity\WebsiteBundle\Controller;

use DreamCommunity\WebsiteBundle\Entity\Articles;
use DreamCommunity\WebsiteBundle\Entity\User;
use DreamCommunity\WebsiteBundle\Entity\Video;
use DreamCommunity\WebsiteBundle\Form\ArticleEditType;
use DreamCommunity\WebsiteBundle\Form\ArticleType;
use DreamCommunity\WebsiteBundle\Form\UserType;
use DreamCommunity\WebsiteBundle\Form\UserEditType;
use DreamCommunity\WebsiteBundle\Form\VideoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\SecurityExtraBundle\Annotation\Secure;

class WebsiteController extends Controller
{
    public function indexAction($page)
    {
        /*$user = new User;

        $encoder = $this->get('security.encoder_factory')->getEncoder($user);
        $encodedPass = $encoder->encodePassword("Aze021Ail!", $user->getSalt());

        // Le nom d'utilisateur et le mot de passe sont identiques
        $user->setUsername("Akashan");
        $user->setPassword($encodedPass);
        $user->setDescription("moi");
        $user->setImage("");
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

        if($page < 1)
            $page = 1;

        $nbEltParPage = 10;

        if($this->container->getParameter('articles.nbElementParPage'))
            $nbEltParPage = $this->container->getParameter('articles.nbElementParPage');

        $liste = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Articles')
            ->getArticles($nbEltParPage, $page);

        return $this->render('DreamCommunityWebsiteBundle:Website:index.html.twig', array(
            'liste_articles'   => $liste,
            'page'       => $page,
            'nombrePage' => ceil(count($liste)/$nbEltParPage)
        ));
    }
    public function articleAction($id)
    {
        $user = $this->getUser();

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Articles');

        $article = $repository->find($id);

        $str = $article->getContenu();
        // On récupère le service
        $autoLinker = $this->container->get('dc_autolinker');
        $article->setContenu($autoLinker->auto_link_text($str));

        return $this->render('DreamCommunityWebsiteBundle:Website:article.html.twig', array('article' => $article, 'user' => $user));
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

        $str = $membre->getDescription();
        // On récupère le service
        $autoLinker = $this->container->get('dc_autolinker');
        $membre->setDescription($autoLinker->auto_link_text($str));

        return $this->render('DreamCommunityWebsiteBundle:Website:membre.html.twig', array('membre' => $membre));
    }
    public function videosAction($page)
    {
        if($page < 1)
            $page = 1;

        $nbEltParPage = 10;

        if($this->container->getParameter('videos.nbElementParPage'))
            $nbEltParPage = $this->container->getParameter('videos.nbElementParPage');

        $liste = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Video')
            ->getVideos($nbEltParPage, $page); // 3 articles par page : c'est totalement arbitraire !

        /*foreach($liste as $video){

            $urlVideo = $video->getUrlVideo();

            $video->setMiniature("http://i.ytimg.com/vi/".$urlVideo."/mqdefault.jpg");

        }*/

        // On ajoute ici les variables page et nb_page à la vue
        return $this->render('DreamCommunityWebsiteBundle:Website:videos.html.twig', array(
            'liste_videos'   => $liste,
            'page'       => $page,
            'nombrePage' => ceil(count($liste)/$nbEltParPage)
        ));
    }
    public function videoAction($id)
    {
        $user = $this->getUser();

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Video');

        $video = $repository->find($id);

        $str = $video->getDescription();
        // On récupère le service
        $autoLinker = $this->container->get('dc_autolinker');
        $video->setDescription($autoLinker->auto_link_text($str));

        $urlVideo = $video->getUrlVideo();

        $video->setMiniature("http://i.ytimg.com/vi/".$urlVideo."/mqdefault.jpg");

        return $this->render('DreamCommunityWebsiteBundle:Website:video.html.twig', array('video' => $video, 'user' => $user));
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

    /**
     * @Secure(roles="ROLE_SUPER_ADMIN, ROLE_ADMIN")
     */
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
                $video->setNbVue(0);
                $video->setIsDeleted(false);

                $video->setUser($this->getUser());
                // On enregistre notre objet $article dans la base de données
                $em = $this->getDoctrine()->getManager();

                $em->persist($video);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Video ajoutée');

                // On redirige vers la page de visualisation de l'article nouvellement créé
                return $this->redirect($this->generateUrl('dream_community_website_video', array('id' => $video->getId())));
            }
        }

        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau

        return $this->render('DreamCommunityWebsiteBundle:Website:ajoutVideo.html.twig', array(
            'form' => $form->createView(),
            'formName' => "AJOUTVID"
        ));
    }
    /**
     * @Secure(roles="ROLE_SUPER_ADMIN, ROLE_ADMIN")
     */
    public function modifVideoAction($id){

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Video');

        $video = $repository->find($id);

        // On utiliser le ArticleEditType
        $form = $this->createForm(new VideoType(), $video);

        $request = $this->getRequest();

        if( $request->get('cancel') == 'Cancel' )
            return $this->redirect($this->generateUrl('dream_community_website_video', array('id' => $video->getId())));

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {

                // On enregistre l'article
                $em = $this->getDoctrine()->getManager();
                $em->persist($video);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Vidéo modifiée');

                return $this->redirect($this->generateUrl('dream_community_website_video', array('id' => $video->getId())));
            }
        }

        return $this->render('DreamCommunityWebsiteBundle:Website:modifVideo.html.twig', array(
            'form'    => $form->createView(),
            'video' => $video,
            'formName' => "MODIFVID"
        ));
    }
    /**
     * @Secure(roles="ROLE_SUPER_ADMIN, ROLE_ADMIN")
     */
    public function supprimVideoAction($id){
        return $this->render('DreamCommunityWebsiteBundle:Website:supprimVideo.html.twig', array());
    }

    /**
     * @Secure(roles="ROLE_SUPER_ADMIN, ROLE_ADMIN")
     */
    public function vueProfilAction(){
        $user = $this->getUser();

        if (null === $user) {
            // Ici, l'utilisateur est anonyme ou l'URL n'est pas derrière un pare-feu
            return $this->render('DreamCommunityWebsiteBundle:Website:index.html.twig', array());
        } else {

            $str = $user->getDescription();
            // On récupère le service
            $autoLinker = $this->container->get('dc_autolinker');
            $user->setDescription($autoLinker->auto_link_text($str));


            return $this->render('DreamCommunityWebsiteBundle:Website:vueProfil.html.twig', array('membre' => $user));
        }
    }
    /**
     * @Secure(roles="ROLE_SUPER_ADMIN, ROLE_ADMIN")
     */
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
    /**
     * @Secure(roles="ROLE_SUPER_ADMIN, ROLE_ADMIN")
     */
    public function mesVideosAction(){
        return $this->render('DreamCommunityWebsiteBundle:Website:mesVideos.html.twig', array());
    }

    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
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
                $this->get('session')->getFlashBag()->add('info', 'Membre ajouté');

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
    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
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
                $this->get('session')->getFlashBag()->add('info', 'Membre modifié');

                return $this->redirect($this->generateUrl('dream_community_website_membre', array('id' => $user->getId())));
            }
        }

        return $this->render('DreamCommunityWebsiteBundle:Website:modifMembre.html.twig', array(
            'form'    => $form->createView(),
            'user' => $user
        ));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ajoutArticleAction()
    {
        $article = new Articles();

        // On crée le formulaire grâce à l'ArticleType
        $form = $this->createForm(new ArticleType(), $article);

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

                $article->setDateCreation(new \DateTime());
                $article->setNbVue(0);
                $article->setIsDeleted(false);

                $article->setUser($this->getUser());
                // On enregistre notre objet $article dans la base de données
                $em = $this->getDoctrine()->getManager();

                $em->persist($article);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Article ajouté');

                // On redirige vers la page de visualisation de l'article nouvellement créé
                return $this->redirect($this->generateUrl('dream_community_website_accueil', array('id' => $article->getId())));
            }
        }

        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau

        return $this->render('DreamCommunityWebsiteBundle:Website:ajoutArticle.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function modifArticleAction($id)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Articles');

        $article = $repository->find($id);

        // On utiliser le ArticleEditType
        $form = $this->createForm(new ArticleEditType(), $article);

        $request = $this->getRequest();

        if( $request->get('cancel') == 'Cancel' )
            return $this->redirect($this->generateUrl('dream_community_website_accueil', array()));

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                // On enregistre l'article
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();

                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Article modifié');

                return $this->redirect($this->generateUrl('dream_community_website_accueil', array()));
            }
        }

        return $this->render('DreamCommunityWebsiteBundle:Website:modifArticle.html.twig', array(
            'form'    => $form->createView(),
            'article' => $article
        ));
    }

    public function menuAdminAction(){
        return $this->render('DreamCommunityWebsiteBundle:Website:menuAdmin.html.twig');
    }
    public function menuAction($nb)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Video');

        $liste = $repository->findBy(array('isDeleted' => false), array('datePublication' => 'desc', 'id' => 'desc'), 5, 0);

        return $this->render('DreamCommunityWebsiteBundle:Website:menu.html.twig', array(
            'liste_videos' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
        ));
    }
    public function menuArticlesAction($nb)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('DreamCommunityWebsiteBundle:Articles');

        $liste = $repository->findBy(array('isDeleted' => false), array('datePublication' => 'desc', 'id' => 'desc'), 5, 0);

        return $this->render('DreamCommunityWebsiteBundle:Website:menuArticles.html.twig', array(
            'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
        ));
    }

}