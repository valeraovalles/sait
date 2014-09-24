<?php

/* ::distribucion.html.twig */
class __TwigTemplate_dbc9d33b39682b597fd211b0ad9fea97531677312ed5d81db8836add77e15a5f extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/distribucion/css/distribucion.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 8
    public function block_menu($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->env->loadTemplate("DistribucionBundle:Default:includes/menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "::distribucion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  37 => 5,  29 => 3,  222 => 77,  219 => 76,  210 => 69,  192 => 65,  184 => 64,  173 => 62,  164 => 58,  157 => 56,  154 => 55,  150 => 53,  143 => 51,  137 => 49,  133 => 48,  127 => 47,  124 => 46,  121 => 45,  117 => 44,  112 => 43,  110 => 42,  107 => 41,  90 => 40,  63 => 17,  60 => 16,  52 => 11,  49 => 10,  46 => 9,  41 => 6,  38 => 5,  32 => 4,);
    }
}
