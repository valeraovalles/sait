<?php

/* ::base.html.twig */
class __TwigTemplate_34d28584e852efeeb24da6d6ce0505df extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
            'menu' => array($this, 'block_menu'),
            'mensaje' => array($this, 'block_mensaje'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 5
        $this->displayBlock('javascripts', $context, $blocks);
        // line 11
        echo "
        ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 18
        echo "    </head>

    <body>
        <div align='center'>
            <div id='banner'><img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/banner.jpg"), "html", null, true);
        echo "\">
            <div class=\"titulo-banner\">UBICACIÓN ACTUAL: ";
        // line 23
        $this->displayBlock('titulobanner', $context, $blocks);
        echo "</div>
            <div id=\"contenedor\">
                ";
        // line 25
        $this->displayBlock('body', $context, $blocks);
        // line 29
        echo "
                <footer>
                    <div class=\"pie\">
                        La Nueva Televisión del Sur C.A. (TVSUR) TeleSUR © | Todo el contenido de esta página es exclusivo para el uso interno del canal. RIF. G-20004500-0 
                    </div>
                </footer>
            </div>
        </div>
            <script>\$('#usuario').popover();</script>             
    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Telesur";
    }

    // line 5
    public function block_javascripts($context, array $blocks = array())
    {
        // line 6
        echo "            <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
            <script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/datatable.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/general.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/twitter-bootstrap/docs/assets/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 13
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/general.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/menu/css/menu.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/datatable.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
            <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/twitter-bootstrap/docs/assets/css/bootstrap.css"), "html", null, true);
        echo "\">
        ";
    }

    // line 23
    public function block_titulobanner($context, array $blocks = array())
    {
        echo " ";
    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        // line 26
        echo "                    <div class=\"menu\">";
        $this->displayBlock('menu', $context, $blocks);
        echo "</div>
                    ";
        // line 27
        $this->displayBlock('mensaje', $context, $blocks);
        // line 28
        echo "                ";
    }

    // line 26
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 27
    public function block_mensaje($context, array $blocks = array())
    {
        echo "  ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 27,  142 => 26,  138 => 28,  136 => 27,  131 => 26,  122 => 23,  112 => 15,  108 => 14,  103 => 13,  100 => 12,  94 => 9,  90 => 8,  86 => 7,  83 => 6,  74 => 4,  59 => 29,  57 => 25,  52 => 23,  42 => 18,  40 => 12,  37 => 11,  35 => 5,  31 => 4,  26 => 1,  182 => 71,  179 => 70,  173 => 86,  165 => 80,  163 => 70,  153 => 63,  145 => 58,  140 => 56,  133 => 52,  128 => 25,  121 => 46,  116 => 16,  109 => 40,  104 => 38,  97 => 34,  92 => 32,  85 => 28,  80 => 5,  73 => 22,  68 => 20,  60 => 15,  56 => 14,  48 => 22,  39 => 6,  36 => 5,  30 => 3,);
    }
}
