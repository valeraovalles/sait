<?php

/* ::administracion.html.twig */
class __TwigTemplate_e29b77a046da9cc4a68f934bf7b754c6c0a07bb76c67441f8d3af25dd636975f extends Twig_Template
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
        return array (  28 => 3,  469 => 209,  464 => 206,  460 => 205,  433 => 180,  426 => 174,  418 => 171,  415 => 170,  413 => 169,  410 => 168,  402 => 165,  399 => 164,  397 => 163,  394 => 162,  386 => 159,  383 => 158,  381 => 157,  378 => 156,  370 => 153,  367 => 152,  365 => 151,  362 => 150,  359 => 142,  357 => 137,  349 => 133,  346 => 132,  343 => 130,  335 => 127,  332 => 126,  330 => 125,  327 => 124,  324 => 118,  316 => 115,  313 => 114,  311 => 113,  308 => 112,  302 => 104,  298 => 102,  290 => 99,  287 => 98,  285 => 97,  277 => 94,  273 => 92,  265 => 89,  262 => 88,  260 => 87,  257 => 86,  249 => 83,  246 => 82,  244 => 81,  241 => 80,  233 => 77,  230 => 76,  228 => 75,  225 => 74,  217 => 71,  214 => 70,  212 => 69,  209 => 68,  201 => 65,  198 => 64,  196 => 63,  193 => 62,  185 => 59,  182 => 58,  180 => 57,  176 => 55,  168 => 53,  165 => 52,  163 => 51,  155 => 48,  151 => 46,  142 => 42,  139 => 41,  137 => 40,  132 => 37,  128 => 35,  123 => 33,  119 => 32,  114 => 31,  110 => 29,  99 => 28,  97 => 27,  93 => 26,  89 => 25,  83 => 24,  77 => 23,  72 => 21,  65 => 17,  62 => 16,  59 => 15,  52 => 10,  49 => 9,  40 => 6,  37 => 5,  31 => 4,);
    }
}
