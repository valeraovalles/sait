<?php

/* ::administracion.html.twig */
class __TwigTemplate_4ec123dcee49d0c09671db7b9f46b731 extends Twig_Template
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
        $this->env->loadTemplate("UsuarioBundle:Default:includes/menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "::administracion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  131 => 51,  106 => 31,  103 => 30,  96 => 25,  88 => 22,  75 => 16,  72 => 15,  56 => 14,  50 => 11,  47 => 10,  44 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
