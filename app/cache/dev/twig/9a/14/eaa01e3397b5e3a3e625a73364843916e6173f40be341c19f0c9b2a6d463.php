<?php

/* ::telesur.html.twig */
class __TwigTemplate_9a14eaa01e3397b5e3a3e625a73364843916e6173f40be341c19f0c9b2a6d463 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
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
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/general.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/menu/css/menu.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/datatable.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/bootstrap3/css/bootstrap.min.css"), "html", null, true);
        echo "\">
";
    }

    // line 10
    public function block_javascripts($context, array $blocks = array())
    {
        // line 11
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/datatable.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/general.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/bootstrap3/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 17
    public function block_menu($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        $this->env->loadTemplate("UsuarioBundle:Default:includes/menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "::telesur.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 18,  74 => 17,  68 => 14,  64 => 13,  60 => 12,  55 => 11,  52 => 10,  46 => 7,  42 => 6,  38 => 5,  33 => 4,  30 => 3,  148 => 57,  143 => 54,  135 => 51,  131 => 49,  127 => 47,  125 => 46,  117 => 44,  114 => 43,  110 => 41,  104 => 39,  102 => 38,  97 => 36,  93 => 35,  89 => 34,  86 => 33,  82 => 32,  65 => 18,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
