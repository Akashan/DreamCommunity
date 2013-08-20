<?php

namespace DreamCommunity\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class KeywordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text') // Ici, explicitez le type du champ
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DreamCommunity\WebsiteBundle\Entity\Keyword'
        ));
    }

    public function getName()
    {
        return 'dreamcommunity_websitebundle_keywordtype';
    }
}