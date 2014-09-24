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
        // line 40
        echo "


    </head>

    <body>
        <div align='center'>
            <div class=\"contenedorprincipal\">
            <div id='banner'><img width=\"100%\" src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/banner_original.jpg"), "html", null, true);
        echo "\"></div>
                ";
        // line 49
        $this->displayBlock('menu', $context, $blocks);
        // line 50
        echo "
                ";
        // line 51
        $this->displayBlock('body', $context, $blocks);
        // line 70
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
            <!-- Piwik -->
            <script type=\"text/javascript\">
              var _paq = _paq || [];
              _paq.push(['trackPageView']);
              _paq.push(['enableLinkTracking']);
              (function() {
                var u=((\"https:\" == document.location.protocol) ? \"https\" : \"http\") + \"://10.10.4.237/piwik/\";
                _paq.push(['setTrackerUrl', u+'piwik.php']);
                _paq.push(['setSiteId', 1]);
                var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
                g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
              })();
            </script>
            <noscript><p><img src=\"http://10.10.4.237/piwik/piwik.php?idsite=1\" style=\"border:0;\" alt=\"\" /></p></noscript>
            <!-- End Piwik Code -->
        ";
    }

    // line 49
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 51
    public function block_body($context, array $blocks = array())
    {
        // line 52
        echo "                    <div class=\"ubicacion\">";
        $this->displayBlock('ubicacion', $context, $blocks);
        echo "</div>
                    <div class=\"titulo\">";
        // line 53
        $this->displayBlock('titulo', $context, $blocks);
        echo "</div>

                    ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 56
            echo "                        <div class=\"alert alert-success\">
                            ";
            // line 57
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
                    ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "alert"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 62
            echo "                        <div class=\"alert alert-danger\">
                            ";
            // line 63
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "
                    ";
        // line 67
        $this->displayBlock('mensaje', $context, $blocks);
        // line 68
        echo "                    
                ";
    }

    // line 52
    public function block_ubicacion($context, array $blocks = array())
    {
        echo " ";
    }

    // line 53
    public function block_titulo($context, array $blocks = array())
    {
    }

    // line 67
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
        return array (  240 => 67,  235 => 53,  229 => 52,  224 => 68,  222 => 67,  219 => 66,  210 => 63,  207 => 62,  203 => 61,  200 => 60,  191 => 57,  188 => 56,  184 => 55,  179 => 53,  174 => 52,  171 => 51,  166 => 49,  145 => 23,  141 => 22,  137 => 21,  133 => 20,  128 => 19,  125 => 18,  119 => 15,  115 => 14,  110 => 12,  106 => 11,  102 => 10,  98 => 9,  93 => 8,  90 => 7,  84 => 5,  69 => 70,  67 => 51,  64 => 50,  62 => 49,  58 => 48,  48 => 40,  46 => 18,  43 => 17,  41 => 7,  36 => 5,  32 => 4,  27 => 1,);
    }
}
