<?php

/* ::licencias.html.twig */
class __TwigTemplate_24db9635a8623e52314cb85026602fce3b069dc16e1ba04b060d0aa4c15c42d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'stylesheets' => array($this, 'block_stylesheets'),
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

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/contenidos.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
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
        return array (  32 => 4,  29 => 3,  171 => 67,  166 => 64,  157 => 60,  150 => 59,  144 => 58,  140 => 57,  133 => 55,  130 => 54,  124 => 50,  118 => 46,  112 => 41,  110 => 40,  104 => 39,  98 => 38,  94 => 37,  88 => 36,  85 => 35,  81 => 34,  63 => 19,  60 => 18,  51 => 11,  48 => 10,  45 => 8,  40 => 7,  37 => 6,  31 => 3,);
    }
}
