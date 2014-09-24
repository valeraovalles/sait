<?php

/* ::base.html.twig */
class __TwigTemplate_42a0840411f8a8a2fca08fbf3a86ed2f24ad51f570bfb938d3e0f73984c27511 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'menu' => array($this, 'block_menu'),
            'body' => array($this, 'block_body'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'titulo' => array($this, 'block_titulo'),
            'mensaje' => array($this, 'block_mensaje'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <link rel=\"shortcut icon\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo "            
        ";
        // line 18
        $this->displayBlock('javascripts', $context, $blocks);
        // line 26
        echo "

    </head>

    <body>
        <div align='center'>
            <div class=\"contenedorprincipal\">
            <div id='banner'><img width=\"100%\" src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/banner_original.jpg"), "html", null, true);
        echo "\"></div>
                ";
        // line 34
        $this->displayBlock('menu', $context, $blocks);
        // line 35
        echo "
                ";
        // line 36
        $this->displayBlock('body', $context, $blocks);
        // line 55
        echo "
                <footer>
                    <div class=\"pie\">
                        La Nueva Televisión del Sur C.A. (TVSUR) TeleSUR © | Todo el contenido de esta página es exclusivo para el uso interno del canal. RIF. G-20004500-0 
                    </div>
                </footer>
            </div>

        <div>
            <script>\$('#usuario').popover();</script>             
    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Telesur";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/general.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/menu/css/menu.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/datatable.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
            <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/bootstrap3/css/bootstrap-theme.min.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/bootstrap3/css/bootstrap.min.css"), "html", null, true);
        echo "\">

            <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/datepiker/css/redmond/jquery-ui-1.10.4.custom.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/datepiker/css/redmond/jquery-ui-1.10.4.custom.min.css"), "html", null, true);
        echo "\">
        ";
    }

    // line 18
    public function block_javascripts($context, array $blocks = array())
    {
        // line 19
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/datatable.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/bootstrap3/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/datepiker/js/jquery-ui-1.10.4.custom.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/datepiker/js/jquery-ui-datepicker-es.js"), "html", null, true);
        echo "\"></script>

        ";
    }

    // line 34
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 36
    public function block_body($context, array $blocks = array())
    {
        // line 37
        echo "                    <div class=\"ubicacion\">";
        $this->displayBlock('ubicacion', $context, $blocks);
        echo "</div>
                    <div class=\"titulo\">";
        // line 38
        $this->displayBlock('titulo', $context, $blocks);
        echo "</div>

                    ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 41
            echo "                        <div class=\"alert alert-success\">
                            ";
            // line 42
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "
                    ";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "alert"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 47
            echo "                        <div class=\"alert alert-danger\">
                            ";
            // line 48
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "
                    ";
        // line 52
        $this->displayBlock('mensaje', $context, $blocks);
        // line 53
        echo "                    
                ";
    }

    // line 37
    public function block_ubicacion($context, array $blocks = array())
    {
        echo " ";
    }

    // line 38
    public function block_titulo($context, array $blocks = array())
    {
    }

    // line 52
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
        return array (  225 => 52,  220 => 38,  214 => 37,  209 => 53,  207 => 52,  204 => 51,  195 => 48,  192 => 47,  188 => 46,  185 => 45,  176 => 42,  173 => 41,  169 => 40,  164 => 38,  159 => 37,  156 => 36,  151 => 34,  144 => 23,  140 => 22,  136 => 21,  132 => 20,  127 => 19,  124 => 18,  118 => 15,  114 => 14,  109 => 12,  105 => 11,  101 => 10,  97 => 9,  92 => 8,  89 => 7,  68 => 55,  66 => 36,  63 => 35,  61 => 34,  57 => 33,  41 => 7,  36 => 5,  27 => 1,  51 => 9,  46 => 18,  43 => 17,  32 => 4,  29 => 2,  217 => 33,  211 => 31,  208 => 30,  205 => 29,  187 => 125,  134 => 74,  102 => 45,  95 => 40,  86 => 37,  83 => 5,  79 => 35,  76 => 34,  74 => 29,  54 => 14,  48 => 26,  45 => 9,  40 => 6,  37 => 4,  31 => 3,);
    }
}
