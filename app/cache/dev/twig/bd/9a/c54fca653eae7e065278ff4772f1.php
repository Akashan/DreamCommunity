<?php

/* DreamCommunityWebsiteBundle:Website:index.html.twig */
class __TwigTemplate_bd9ac54fca653eae7e065278ff4772f1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("DreamCommunityWebsiteBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'dream_page_title' => array($this, 'block_dream_page_title'),
            'dream_contenu' => array($this, 'block_dream_contenu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DreamCommunityWebsiteBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    Accueil - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_dream_page_title($context, array $blocks = array())
    {
        // line 8
        echo "Dream Community
";
    }

    // line 11
    public function block_dream_contenu($context, array $blocks = array())
    {
        // line 12
        echo "    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer turpis lorem, aliquam eu augue aliquet, tempor luctus nisl. Nam nisi dui, scelerisque vitae molestie bibendum, facilisis eu leo. Proin tincidunt convallis leo, id placerat nulla euismod vel. Duis dignissim quam eros, ac tempus turpis tincidunt quis. Praesent aliquet, nisl at vulputate luctus, justo nibh lobortis mi, posuere mollis mauris lectus dapibus sem. Nulla ornare, massa vitae auctor tincidunt, sapien sapien feugiat neque, nec gravida nisl risus dictum nibh. Quisque tristique velit quis eros pretium varius. Curabitur tempus eros ipsum, eget rutrum tortor vulputate ut. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam viverra sagittis rutrum.</p>
    <p>Nullam interdum ligula quis enim iaculis, faucibus venenatis lacus pretium. Proin eu sem at nulla rhoncus rhoncus sed in purus. Aliquam vestibulum condimentum nibh, quis scelerisque quam mollis in. Aliquam pharetra lectus risus, non posuere sem consectetur eu. Ut sit amet tincidunt sem, vitae varius lacus. Mauris sit amet lorem sed orci accumsan accumsan ac sodales eros. Cras fermentum nec dolor eget vehicula. Aenean sed congue magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum lobortis pulvinar nibh, vel tempor eros lacinia sed. Suspendisse in libero et nibh sodales hendrerit in sed risus. Integer a lectus a libero mollis pulvinar vitae et libero. Maecenas nec bibendum arcu, ut convallis lacus. Fusce in posuere justo, eget lacinia libero.</p>
    <p>Vivamus sit amet odio et lacus tristique porttitor. Donec ac vehicula mi, et volutpat augue. Pellentesque et nulla turpis. Cras quis suscipit ante. Ut ut elementum libero. In hac habitasse platea dictumst. Aliquam a tempus ligula. Donec pharetra elit non nulla iaculis pharetra euismod et orci. Donec pellentesque eros sed massa ultricies fringilla. Vivamus vitae orci sed nunc aliquet faucibus. Sed interdum sollicitudin pretium. Maecenas et leo velit. In hac habitasse platea dictumst. Maecenas ligula mi, imperdiet at urna ac, rutrum pellentesque arcu. Ut lectus dui, accumsan quis massa eu, dictum mollis risus.</p>
    <p>Nulla elementum semper lacus vitae porta. Suspendisse laoreet nisi id est ultrices, id tempor dui faucibus. Morbi viverra, massa sit amet venenatis ultrices, eros augue accumsan metus, sit amet euismod metus quam sed turpis. Aliquam viverra tempus erat vitae commodo. Cras neque massa, posuere non nulla in, varius mollis est. Donec pellentesque massa sapien, at bibendum lorem viverra eu. Nam molestie placerat purus, non pretium mauris iaculis vel. Duis ut euismod leo, eget interdum diam. Aenean porttitor mollis dapibus. Maecenas elit sapien, commodo vitae ipsum nec, condimentum condimentum enim. Phasellus consectetur pretium sapien, at sagittis quam pellentesque vel. Morbi vitae volutpat massa, ac accumsan enim. Maecenas tempor libero sed tempor tempus.</p>
    <p>Sed sagittis vitae purus id scelerisque. Pellentesque viverra nibh orci, id vestibulum mi commodo ut. Maecenas ut convallis velit. Maecenas eu interdum nisl, id egestas nunc. Ut congue sapien libero, eget varius lacus volutpat lobortis. Integer ullamcorper lorem mauris, vel tempus felis consectetur nec. Maecenas eleifend diam eget magna vulputate porta. Aenean molestie a justo et porta. Nulla a sapien ut lectus suscipit ullamcorper. Morbi at congue lectus. Proin nec ultrices sem. Duis egestas, elit sed dapibus consectetur, justo mi elementum dui, vel pellentesque felis turpis nec neque. Phasellus in massa ac felis condimentum pulvinar.</p>
";
    }

    public function getTemplateName()
    {
        return "DreamCommunityWebsiteBundle:Website:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 12,  48 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}