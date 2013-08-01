<?php

/* DreamCommunityWebsiteBundle::layout.html.twig */
class __TwigTemplate_e3baf5fd525fdc42381fb0036b69760f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'dream_page_title' => array($this, 'block_dream_page_title'),
            'dream_contenu' => array($this, 'block_dream_contenu'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "    <style>
        html, body {
            height: 100%;
        }
        footer {
            color: #666;
            background: #222;
            padding: 17px 0 18px 0;
            border-top: 1px solid #000;
        }
        footer a {
            color: #999;
        }
        footer a:hover {
            color: #efefef;
        }
        .wrapper {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            margin-bottom: -63px;
        }

        .push {
            height: 63px;
        }
            /* not required for sticky footer; just pushes hero down a bit */
        .wrapper > .container {
            padding-top: 0px;
        }
    </style>
</head>
<body>
<div class=\"wrapper\">
    <nav class=\"navbar navbar-inverse navbar-static-top\">
        <div class=\"navbar-inner\">
            <div class=\"container\">
                <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </a>
                <a class=\"brand\" href=\"#\">Dream Community</a>
                <div class=\"nav-collapse\">
                    <ul class=\"nav\">
                        <li> <a href=\"";
        // line 57
        echo $this->env->getExtension('routing')->getPath("dream_community_website_accueil");
        echo "\"><i class=\"icon-home icon-white\"></i> Accueil</a> </li>
                        <li> <a href=\"";
        // line 58
        echo $this->env->getExtension('routing')->getPath("dream_community_website_membres");
        echo "\">Membres</a> </li>
                        <li> <a href=\"";
        // line 59
        echo $this->env->getExtension('routing')->getPath("dream_community_website_videos");
        echo "\">Vidéos</a> </li>
                        <!--<li> <a href=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("dream_community_website_forum");
        echo "\">Forum</a> </li>-->
                        <li> <a href=\"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("dream_community_website_contacts");
        echo "\">Contacts</a> </li>
                        <li> <a href=\"";
        // line 62
        echo $this->env->getExtension('routing')->getPath("dream_community_website_liens");
        echo "\">Liens</a> </li>
                    </ul>
                    <form class=\"navbar-search pull-right\" action=\"\">
                        <input type=\"text\" class=\"search-query span2\" placeholder=\"Search\">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class=\"container\">
        <div class=\"row-fluid\">
            <div class=\"span12\">
                <h2>";
        // line 74
        $this->displayBlock('dream_page_title', $context, $blocks);
        echo "</h2>
            </div>
        </div>
        <div class=\"row-fluid\">
            <div id=\"menu\" class=\"span3\">
                ";
        // line 79
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("DreamCommunityWebsiteBundle:Website:menu", array("nb" => 3)));
        echo "
            </div>
            <div id=\"content\" class=\"span9\">
                ";
        // line 82
        $this->displayBlock('dream_contenu', $context, $blocks);
        // line 85
        echo "            </div>
        </div>
        <div class=\"push\"><!--//--></div>
    </div>
</div>
<footer>
    <div class=\"container\">
        <p class=\"muted credit\">Tous droit réservés</p>
    </div>
</footer>

";
        // line 96
        $this->displayBlock('javascripts', $context, $blocks);
        // line 105
        echo "
</body>
</html>";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Dream Community";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    ";
    }

    // line 74
    public function block_dream_page_title($context, array $blocks = array())
    {
    }

    // line 82
    public function block_dream_contenu($context, array $blocks = array())
    {
        // line 83
        echo "
                ";
    }

    // line 96
    public function block_javascripts($context, array $blocks = array())
    {
        // line 97
        echo "    ";
        // line 98
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        var x = \$(location).attr('href').replace( 'http://localhost:8000' , \"\"); // Step 1
        \$('a[href=\"' + x + '\"]').parent().addClass('active');
    </script>
";
    }

    public function getTemplateName()
    {
        return "DreamCommunityWebsiteBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 99,  191 => 98,  189 => 97,  186 => 96,  181 => 83,  178 => 82,  173 => 74,  166 => 10,  163 => 9,  157 => 7,  151 => 105,  149 => 96,  136 => 85,  134 => 82,  128 => 79,  120 => 74,  105 => 62,  101 => 61,  97 => 60,  93 => 59,  89 => 58,  85 => 57,  38 => 12,  36 => 9,  31 => 7,  24 => 2,);
    }
}
