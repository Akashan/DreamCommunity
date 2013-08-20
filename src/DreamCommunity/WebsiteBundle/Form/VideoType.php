<?php

namespace DreamCommunity\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('urlVideo','text', array(
                'label' => "Code vidéo (ex : EUSglyLH_yc)"
            ))
            ->add('titre','text')
            ->add('description','textarea')
            ->add('datePublication','date',array(
                'input'  => 'datetime',
                'empty_value' => array('year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'),
                'format' => 'dd MM yyyy',
                'years' => range(date('Y'), date('Y')+2),
                'widget' => 'choice'
            ))
            ->add('keywords', 'collection', array(
                'type' => new KeywordType(),
                'allow_add' => true,
                'allow_delete' => true,
            ))
        ;

        // On récupère la factory (usine)
        $factory = $builder->getFormFactory();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DreamCommunity\WebsiteBundle\Entity\Video'
        ));
    }

    public function getName()
    {
        return 'dreamcommunity_websitebundle_videotype';
    }
}