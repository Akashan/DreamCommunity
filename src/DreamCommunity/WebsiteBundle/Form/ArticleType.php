<?php

namespace DreamCommunity\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text')
            ->add('contenu','textarea', array(
                'attr' => array('cols' => '75', 'rows' => '15'),
            ))
            ->add('datePublication','date', array(
                'label' => 'Date de Publication',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array(
                    'class' => 'datepicker'
                )
            ))
            ->add('tags', 'text', array(
                'label' => "Tags (séparés par des virgules)",
            ))
        ;

        // On récupère la factory (usine)
        $factory = $builder->getFormFactory();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DreamCommunity\WebsiteBundle\Entity\Articles'
        ));
    }

    public function getName()
    {
        return 'dreamcommunity_websitebundle_articletype';
    }
}