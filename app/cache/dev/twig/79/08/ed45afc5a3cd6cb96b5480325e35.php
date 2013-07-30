<?php

/* UsuarioBundle:Perfil:show.html.twig */
class __TwigTemplate_7908ed45afc5a3cd6cb96b5480325e35 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Inicio - Telesur";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "<h1>Perfil</h1>

<table class=\"record_properties\">
    <tbody>
        <tr>
            <th>Id</th>
            <td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Primernombre</th>
            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "primerNombre"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Segundonombre</th>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "segundoNombre"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Primerapellido</th>
            <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "primerApellido"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Segundoapellido</th>
            <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "segundoApellido"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Cedula</th>
            <td>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "cedula"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("perfil");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("perfil_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">
            Edit
        </a>
    </li>
    <li>
        <form action=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("perfil_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\">
            ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "delete_form"), 'widget');
        echo "
            <button type=\"submit\">Delete</button>
        </form>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:Perfil:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 31,  161 => 69,  152 => 66,  148 => 65,  137 => 57,  102 => 39,  65 => 18,  58 => 16,  184 => 77,  175 => 71,  170 => 69,  192 => 84,  188 => 83,  180 => 78,  146 => 57,  134 => 51,  127 => 47,  110 => 39,  77 => 26,  63 => 19,  100 => 12,  90 => 8,  59 => 29,  53 => 15,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 56,  140 => 55,  132 => 51,  128 => 25,  119 => 42,  107 => 48,  71 => 26,  177 => 65,  165 => 64,  160 => 61,  135 => 47,  126 => 45,  114 => 43,  84 => 28,  70 => 23,  67 => 23,  61 => 15,  87 => 31,  31 => 4,  38 => 5,  26 => 1,  93 => 28,  88 => 6,  78 => 28,  46 => 11,  44 => 9,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 71,  163 => 65,  158 => 63,  156 => 67,  151 => 59,  142 => 26,  138 => 28,  136 => 27,  121 => 48,  117 => 44,  105 => 40,  91 => 38,  62 => 14,  49 => 8,  21 => 2,  25 => 3,  94 => 9,  89 => 20,  85 => 30,  75 => 23,  68 => 21,  56 => 11,  27 => 4,  24 => 3,  19 => 1,  79 => 23,  72 => 22,  69 => 19,  47 => 10,  40 => 12,  37 => 11,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 53,  131 => 26,  123 => 47,  120 => 40,  115 => 41,  111 => 49,  108 => 14,  101 => 45,  98 => 37,  96 => 36,  83 => 29,  74 => 27,  66 => 15,  55 => 13,  52 => 10,  50 => 11,  43 => 8,  41 => 9,  35 => 4,  32 => 4,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 27,  144 => 53,  141 => 51,  133 => 55,  130 => 53,  125 => 44,  122 => 45,  116 => 16,  112 => 45,  109 => 41,  106 => 41,  103 => 38,  99 => 43,  95 => 35,  92 => 39,  86 => 27,  82 => 22,  80 => 5,  73 => 19,  64 => 17,  60 => 19,  57 => 25,  54 => 10,  51 => 14,  48 => 22,  45 => 17,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
