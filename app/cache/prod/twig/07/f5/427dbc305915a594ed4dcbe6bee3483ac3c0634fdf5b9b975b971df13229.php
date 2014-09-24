<?php

/* ::proyecto.html.twig */
class __TwigTemplate_07f5427dbc305915a594ed4dcbe6bee3483ac3c0634fdf5b9b975b971df13229 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'menu' => array($this, 'block_menu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/proyecto/css/proyecto.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/proyecto/css/tablaactividad.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 10
    public function block_menu($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        $this->env->loadTemplate("ProyectoBundle:Default:includes/menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "::proyecto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 11,  47 => 10,  41 => 6,  32 => 4,  29 => 3,  549 => 236,  543 => 234,  541 => 233,  535 => 229,  519 => 225,  515 => 224,  511 => 223,  507 => 222,  503 => 221,  498 => 218,  494 => 216,  490 => 214,  484 => 213,  472 => 212,  470 => 211,  463 => 210,  460 => 209,  457 => 208,  455 => 207,  451 => 205,  444 => 201,  440 => 200,  437 => 199,  433 => 197,  429 => 195,  427 => 194,  423 => 192,  419 => 190,  415 => 188,  411 => 186,  409 => 185,  405 => 183,  401 => 181,  395 => 179,  393 => 178,  389 => 176,  385 => 174,  379 => 172,  377 => 171,  370 => 169,  364 => 168,  360 => 167,  357 => 166,  353 => 165,  328 => 142,  316 => 139,  312 => 138,  308 => 137,  304 => 136,  301 => 135,  298 => 134,  293 => 133,  281 => 123,  269 => 112,  262 => 107,  255 => 105,  246 => 101,  243 => 100,  241 => 99,  238 => 98,  226 => 95,  222 => 94,  218 => 93,  212 => 92,  209 => 91,  206 => 90,  200 => 89,  197 => 88,  193 => 87,  181 => 77,  169 => 66,  167 => 65,  161 => 61,  154 => 59,  145 => 55,  142 => 54,  139 => 53,  127 => 50,  123 => 49,  119 => 48,  113 => 47,  110 => 46,  107 => 45,  101 => 44,  98 => 43,  94 => 42,  85 => 35,  66 => 18,  63 => 17,  55 => 12,  52 => 11,  49 => 10,  43 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
