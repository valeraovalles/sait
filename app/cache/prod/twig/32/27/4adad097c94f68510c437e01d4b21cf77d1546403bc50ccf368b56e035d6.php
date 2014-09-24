<?php

/* ::sit.html.twig */
class __TwigTemplate_32274adad097c94f68510c437e01d4b21cf77d1546403bc50ccf368b56e035d6 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sit/sit.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/general.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/menu/css/menu.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/datatable.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/bootstrap3/css/bootstrap.min.css"), "html", null, true);
        echo "\">
";
    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        // line 12
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/datatable.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/general.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/bootstrap3/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 18
    public function block_menu($context, array $blocks = array())
    {
        // line 19
        echo "    ";
        $this->env->loadTemplate("SitBundle:Default:includes/menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "::sit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 19,  68 => 14,  64 => 13,  56 => 11,  50 => 8,  46 => 7,  42 => 6,  38 => 5,  33 => 4,  30 => 3,  377 => 145,  363 => 137,  353 => 135,  347 => 133,  341 => 131,  337 => 129,  335 => 128,  330 => 126,  319 => 118,  313 => 114,  307 => 112,  301 => 110,  299 => 109,  292 => 107,  288 => 106,  278 => 105,  271 => 104,  267 => 102,  256 => 98,  250 => 97,  246 => 96,  238 => 94,  225 => 84,  221 => 83,  217 => 82,  213 => 81,  210 => 80,  204 => 79,  201 => 78,  198 => 77,  195 => 76,  192 => 75,  189 => 74,  186 => 73,  183 => 72,  180 => 71,  177 => 70,  172 => 69,  164 => 68,  154 => 60,  150 => 59,  146 => 58,  138 => 53,  131 => 49,  124 => 45,  117 => 41,  109 => 36,  105 => 35,  99 => 34,  96 => 33,  90 => 30,  86 => 29,  82 => 28,  78 => 18,  74 => 25,  72 => 15,  62 => 17,  59 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
