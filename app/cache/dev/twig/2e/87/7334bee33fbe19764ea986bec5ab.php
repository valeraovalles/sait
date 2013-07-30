<?php

/* UsuarioBundle:Rol:show.html.twig */
class __TwigTemplate_2e877334bee33fbe19764ea986bec5ab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::administracion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::administracion.html.twig";
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
        $this->displayParentBlock("body", $context, $blocks);
        echo "
<div class=\"titulo\">ROL</div>

";
        // line 8
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) {
            // line 9
            echo "    <div class=\"flash-notice\">
        ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
            echo "
    </div>
";
        }
        // line 13
        echo "<br>

<table class=\"form-show\">
    <tbody>
        <tr>
            <th>Id</th>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Rol</th>
            <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "rol"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>

<br>

<table class=\"accion\">
    <tr>
        <td>
        <a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("rol");
        echo "\">
            Volver
        </a>
        </td>

        <td>
        <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("rol_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">
            Editar
        </a>
        </td>

        <td>
        <form action=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("rol_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('Seguro que desea eliminar')\">
            ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "delete_form"), 'widget');
        echo "
            <button type=\"submit\">Borrar</button>
        </form>
        </td>
    </tr>
</table>

<br>
";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:Rol:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 19,  100 => 12,  90 => 8,  59 => 29,  53 => 13,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 56,  140 => 55,  132 => 51,  128 => 25,  119 => 42,  107 => 36,  71 => 17,  177 => 65,  165 => 64,  160 => 61,  135 => 47,  126 => 45,  114 => 42,  84 => 28,  70 => 23,  67 => 18,  61 => 15,  87 => 20,  31 => 4,  38 => 5,  26 => 1,  93 => 28,  88 => 6,  78 => 21,  46 => 9,  44 => 8,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 71,  163 => 70,  158 => 67,  156 => 58,  151 => 57,  142 => 26,  138 => 28,  136 => 27,  121 => 46,  117 => 44,  105 => 46,  91 => 31,  62 => 23,  49 => 10,  21 => 2,  25 => 3,  94 => 9,  89 => 20,  85 => 25,  75 => 23,  68 => 14,  56 => 9,  27 => 4,  24 => 3,  19 => 1,  79 => 18,  72 => 20,  69 => 19,  47 => 10,  40 => 12,  37 => 11,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 50,  131 => 26,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 14,  101 => 45,  98 => 37,  96 => 31,  83 => 33,  74 => 21,  66 => 15,  55 => 13,  52 => 23,  50 => 10,  43 => 8,  41 => 9,  35 => 4,  32 => 4,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 27,  144 => 53,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 23,  116 => 16,  112 => 15,  109 => 41,  106 => 36,  103 => 13,  99 => 30,  95 => 34,  92 => 39,  86 => 7,  82 => 22,  80 => 5,  73 => 19,  64 => 14,  60 => 6,  57 => 25,  54 => 10,  51 => 14,  48 => 22,  45 => 17,  42 => 18,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
