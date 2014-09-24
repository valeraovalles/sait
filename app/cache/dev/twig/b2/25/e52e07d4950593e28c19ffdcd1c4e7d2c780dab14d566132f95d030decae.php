<?php

/* ::visita.html.twig */
class __TwigTemplate_b225e52e07d4950593e28c19ffdcd1c4e7d2c780dab14d566132f95d030decae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        echo "Control Visitas";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontendvisitas/cssvisita.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 10
    public function block_menu($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        $this->env->loadTemplate("FrontendVisitasBundle:Default:menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "::visita.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  50 => 10,  44 => 7,  39 => 6,  36 => 5,  30 => 3,  183 => 73,  179 => 72,  173 => 68,  162 => 62,  156 => 60,  154 => 59,  149 => 58,  144 => 55,  138 => 51,  133 => 49,  128 => 48,  123 => 46,  118 => 45,  116 => 44,  112 => 43,  108 => 42,  104 => 41,  100 => 40,  94 => 39,  90 => 38,  87 => 37,  83 => 36,  63 => 19,  60 => 18,  51 => 12,  48 => 11,  45 => 10,  40 => 7,  37 => 6,  31 => 4,);
    }
}
