<?php

namespace DreamCommunity\WebsiteBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class ArticleEditType extends ArticleType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // On fait appel à la méthode buildForm du parent, qui va ajouter tous les champs à $builder
        parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'dreamcommunity_websitebundle_articleedittype';
    }
}