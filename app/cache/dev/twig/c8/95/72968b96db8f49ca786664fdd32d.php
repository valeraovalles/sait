<?php

/* ::licencias.html.twig */
class __TwigTemplate_c89572968b96db8f49ca786664fdd32d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
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
    public function block_menu($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->env->loadTemplate("LicenciasBundle:Default:includes/menu.html.twig")->display($context);
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Inicio - Telesur";
    }

    // line 9
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 10
        echo "    PÁGINA PRINCIPAL DE LICENCIAS
";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "::licencias.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 14,  53 => 13,  48 => 10,  45 => 9,  34 => 4,  31 => 3,  157 => 54,  151 => 53,  146 => 50,  137 => 46,  130 => 45,  124 => 44,  120 => 43,  113 => 41,  110 => 40,  106 => 38,  102 => 36,  98 => 34,  96 => 33,  90 => 32,  84 => 31,  80 => 30,  74 => 29,  71 => 28,  67 => 27,  47 => 10,  44 => 9,  39 => 7,  36 => 5,  30 => 3,);
    }
}
