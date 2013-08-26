<?php

namespace DreamCommunity\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text')
            ->add('password', 'repeated',
                array('type' => 'password', 'invalid_message' => 'Le champ doit correspondre.',
                    'first_options'  => array('label' => 'Mot de passe'),
                    'second_options' => array('label' => 'Confirmer le mot de passe')))
            ->add('nom','text')
            ->add('description','textarea')
            ->add('email','text')
            ->add('roles', 'choice', array(
                'empty_value' => 'Choisissez un rôle',
                'empty_data'  => null,
                'multiple' => true,
                'choices'   => array(
                    'ROLE_SUPER_ADMIN' => 'Super Administrateur',
                    'ROLE_ADMIN' => 'Administrateur',
                    'ROLE_USER' => 'Utilisateur')))
            ->add('image','text')
            ->add('urlYoutube','text', array('required'  => false))
            ->add('urlTwitter','text', array('required'  => false))
            ->add('urlFacebook','text', array('required'  => false))
            ->add('urlOther','text', array('required'  => false))
        ;

        // On récupère la factory (usine)
        $factory = $builder->getFormFactory();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DreamCommunity\WebsiteBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'dreamcommunity_websitebundle_usertype';
    }
}