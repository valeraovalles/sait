<?php

/* ::neto.html.twig */
class __TwigTemplate_64999bf9a83b205ba68bd77763aec0d570087d3c332f77aecccd47ac9e7b28ae extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/neto.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 8
    public function block_menu($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->env->loadTemplate("NetoBundle:Default:includes/menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "::neto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 9,  43 => 8,  32 => 4,  29 => 3,  107 => 61,  97 => 53,  87 => 29,  82 => 27,  75 => 23,  68 => 21,  62 => 18,  59 => 17,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
