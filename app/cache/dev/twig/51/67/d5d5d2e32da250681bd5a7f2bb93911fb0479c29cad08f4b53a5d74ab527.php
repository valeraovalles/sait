<?php

/* ::nomina.html.twig */
class __TwigTemplate_5167d5d5d2e32da250681bd5a7f2bb93911fb0479c29cad08f4b53a5d74ab527 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
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
    public function block_menu($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->env->loadTemplate("NominaBundle:Default:includes/menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "::nomina.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  121 => 43,  116 => 41,  109 => 37,  104 => 35,  97 => 31,  92 => 29,  86 => 26,  79 => 24,  76 => 23,  73 => 22,  64 => 19,  61 => 18,  56 => 17,  54 => 16,  47 => 12,  44 => 11,  39 => 7,  36 => 6,  30 => 3,);
    }
}
