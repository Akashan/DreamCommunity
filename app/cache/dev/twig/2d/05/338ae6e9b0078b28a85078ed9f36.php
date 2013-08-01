<?php

/* DreamCommunityWebsiteBundle:Website:menu.html.twig */
class __TwigTemplate_2d05338ae6e9b0078b28a85078ed9f36 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h5>Dernières Vidéos</h5>
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_videos"]) ? $context["liste_videos"] : $this->getContext($context, "liste_videos")));
        foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
            // line 3
            echo "    <p style=\"font-size:12px;\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dream_community_website_video", array("id" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "titre"), "html", null, true);
            echo "</a><br>
    <span class=\"pull-left\" style=\"font-size:10px;margin-top:-10px;\">Par ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "auteur"), "html", null, true);
            echo ".</span></p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "DreamCommunityWebsiteBundle:Website:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
