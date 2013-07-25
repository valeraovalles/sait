<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_0c5ebc5a31429b22c92541fcf68a1b26 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "exception"), "message"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_code"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_text"), "html", null, true);
        echo ")
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        $this->env->loadTemplate("TwigBundle:Exception:exception.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 11,  43 => 8,  33 => 4,  45 => 13,  41 => 12,  30 => 3,  23 => 3,  19 => 1,  147 => 27,  142 => 26,  138 => 28,  136 => 27,  131 => 26,  128 => 25,  116 => 16,  112 => 15,  108 => 14,  103 => 13,  100 => 12,  94 => 9,  90 => 8,  86 => 7,  83 => 6,  80 => 5,  74 => 4,  59 => 29,  57 => 12,  52 => 23,  48 => 22,  42 => 18,  40 => 7,  37 => 11,  35 => 5,  31 => 4,  26 => 1,  122 => 23,  119 => 5,  102 => 47,  97 => 45,  93 => 43,  85 => 41,  81 => 40,  77 => 39,  71 => 38,  68 => 37,  64 => 36,  34 => 8,  32 => 5,  29 => 3,);
    }
}
