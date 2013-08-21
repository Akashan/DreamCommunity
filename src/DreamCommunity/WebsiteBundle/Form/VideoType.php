<?php

namespace DreamCommunity\WebsiteBundle\Form;

use DateTimeZone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('urlVideo','text', array(
                'label' => "Code vidéo (ex : EUSglyLH_yc)",
            ))
            ->add('titre','text')
            ->add('miniature','text')
            ->add('description','textarea', array(
                'attr' => array('cols' => '75', 'rows' => '15'),
            ))
            ->add('datePublication','date',array(
                'input'  => 'datetime',
                'empty_value' => array('year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'),
                'format' => 'dd MM yyyy',
                'years' => range(date('Y'), date('Y')+2),
                'widget' => 'choice',
                'data' => new \DateTime('now', new DateTimeZone('Europe/Paris'))
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
            'data_class' => 'DreamCommunity\WebsiteBundle\Entity\Video'
        ));
    }

    public function getName()
    {
        return 'dreamcommunity_websitebundle_videotype';
    }
}