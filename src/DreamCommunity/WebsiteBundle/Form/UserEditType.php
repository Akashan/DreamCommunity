<?php

namespace DreamCommunity\WebsiteBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserEditType extends UserType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // On fait appel à la méthode buildForm du parent, qui va ajouter tous les champs à $builder
        parent::buildForm($builder, $options);

        // On supprime celui qu'on ne veut pas dans le formulaire de modification
        $builder->remove('username');
        $builder->remove('password');
    }

    // On modifie cette méthode, car les deux formulaires doivent avoir un nom différent
    public function getName()
    {
        return 'dreamcommunity_websitebundle_useredittype';
    }
}