<?php

/* UsuarioBundle:User:show.html.twig */
class __TwigTemplate_5414b379ac8af9ed2d283b2bddfaee5d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::administracion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Inicio - Telesur";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    ADMINISTRACIÓN DE USUARIOS
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
";
        // line 11
        $this->displayParentBlock("body", $context, $blocks);
        echo "

<div class=\"titulo\">DATOS DE USUARIO</div>


";
        // line 16
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "started")) {
            // line 17
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 18
                echo "        <div class=\"Greenflash-notice\">
            ";
                // line 19
                echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
                echo "
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 23
        echo "

<br>
<table class=\"form-show\">
    <tbody>
        <tr>
            <th>Username:</th>
            <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "username"), "html", null, true);
        echo "</td>
        </tr>

        <tr>
            <th>Username:</th>
            <td>
                ";
        // line 36
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "isActive") == 1)) {
            // line 37
            echo "                    Activo
                ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "isActive") == null)) {
            // line 39
            echo "                    Inactivo
                ";
        }
        // line 41
        echo "            </td>
        </tr>
        <tr>
        <th>Nombres:</th>
            <td>";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "primerNombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "segundoNombre"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
        <th>Apellidos:</th>
            <td>";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "primerApellido"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "segundoApellido"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Cedula:</th>
            <td>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "cedula"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Id:</th>
            <td>";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "id"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>


<br>

<form action=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_delete", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('Seguro que desea eliminar')\">
    <a href=\"";
        // line 66
        echo $this->env->getExtension('routing')->getPath("user");
        echo "\">Volver</a>
    <button><a href=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "id"))), "html", null, true);
        echo "\">Editar</a></button>
    <button type=\"submit\">Borrar</button>
    ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "delete_form"), 'widget');
        echo "
</form>

<br>

";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:User:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 69,  152 => 66,  148 => 65,  137 => 57,  102 => 39,  65 => 18,  58 => 16,  184 => 77,  175 => 71,  170 => 69,  192 => 84,  188 => 83,  180 => 78,  146 => 57,  134 => 51,  127 => 47,  110 => 39,  77 => 26,  63 => 19,  100 => 12,  90 => 8,  59 => 29,  53 => 15,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 56,  140 => 55,  132 => 51,  128 => 25,  119 => 42,  107 => 36,  71 => 25,  177 => 65,  165 => 64,  160 => 61,  135 => 47,  126 => 45,  114 => 42,  84 => 28,  70 => 23,  67 => 16,  61 => 15,  87 => 30,  31 => 4,  38 => 5,  26 => 1,  93 => 28,  88 => 6,  78 => 23,  46 => 9,  44 => 9,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 71,  163 => 65,  158 => 63,  156 => 67,  151 => 59,  142 => 26,  138 => 28,  136 => 27,  121 => 49,  117 => 44,  105 => 40,  91 => 29,  62 => 14,  49 => 10,  21 => 2,  25 => 3,  94 => 9,  89 => 20,  85 => 25,  75 => 23,  68 => 19,  56 => 11,  27 => 4,  24 => 3,  19 => 1,  79 => 23,  72 => 20,  69 => 19,  47 => 10,  40 => 12,  37 => 11,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 53,  131 => 26,  123 => 47,  120 => 40,  115 => 41,  111 => 37,  108 => 14,  101 => 45,  98 => 37,  96 => 36,  83 => 29,  74 => 21,  66 => 15,  55 => 13,  52 => 10,  50 => 11,  43 => 8,  41 => 9,  35 => 4,  32 => 4,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 27,  144 => 53,  141 => 51,  133 => 55,  130 => 53,  125 => 44,  122 => 45,  116 => 16,  112 => 45,  109 => 41,  106 => 41,  103 => 35,  99 => 30,  95 => 34,  92 => 39,  86 => 27,  82 => 22,  80 => 5,  73 => 19,  64 => 17,  60 => 17,  57 => 25,  54 => 10,  51 => 14,  48 => 22,  45 => 17,  42 => 18,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
