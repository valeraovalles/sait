<?php

/* UsuarioBundle:User:new.html.twig */
class __TwigTemplate_940f82205a87e34374e7a17963e3fe60 extends Twig_Template
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

    // line 6
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 7
        echo "    ADMINISTRACIÓN DE USUARIOS
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "

<div class=\"titulo\">CREACIÓN DE USUARIO</div>
<form novalidate action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("user_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form_perfil"), 'enctype');
;
        echo ">

";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "
";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "_token"), 'widget');
        echo "
 
<div class=\"form-contenedor\">
    ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "username"), 'errors');
        echo "
    <div class=\"labels\">Username:</div>
    <div class=\"widgets\">";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "username"), 'widget');
        echo "</div>
</div>

<div class=\"form-contenedor\">
    ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "password"), 'errors');
        echo "
    <div class=\"labels\">password:</div>
    <div class=\"widgets\">";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "password"), 'widget');
        echo "</div>
</div>

<div class=\"form-contenedor\">
    ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "isActive"), 'errors');
        echo "
    <div class=\"labels\">Activo:</div>
    <div class=\"widgets\">";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "isActive"), 'widget');
        echo "</div>
</div>

<div class=\"form-contenedor\">
    ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "primerNombre"), 'errors');
        echo "
    <div class=\"labels\">Nombre 1:</div>
    <div class=\"widgets\">";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "primerNombre"), 'widget');
        echo "</div>
</div>

<div class=\"form-contenedor\">
    ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "segundoNombre"), 'errors');
        echo "
    <div class=\"labels\">Nombre 2:</div>
    <div class=\"widgets\">";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "segundoNombre"), 'widget');
        echo "</div>
</div>

<div class=\"form-contenedor\">
    ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "primerApellido"), 'errors');
        echo "
    <div class=\"labels\">Apellido 1:</div>
    <div class=\"widgets\">";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "primerApellido"), 'widget');
        echo "</div>
</div>

<div class=\"form-contenedor\">
    ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "segundoApellido"), 'errors');
        echo "
    <div class=\"labels\">Apellido 2:</div>
    <div class=\"widgets\">";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "segundoApellido"), 'widget');
        echo "</div>
</div>

<div class=\"form-contenedor\">
    ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "cedula"), 'errors');
        echo "
    <div class=\"labels\">Cedula:</div>
    <div class=\"widgets\">";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form_perfil"), "cedula"), 'widget');
        echo "</div>
</div>

<div class=\"form-contenedor\">
    ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "rol"), 'errors');
        echo "
    <div class=\"labels\">Rol:</div>
    <div class=\"widgets\">";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "rol"), 'widget');
        echo "</div>
</div>

<br>

    <button type=\"submit\">Create</button>
    <a href=\"";
        // line 77
        echo $this->env->getExtension('routing')->getPath("user");
        echo "\">Volver</a>
</form>

<br>

";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:User:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 77,  175 => 71,  170 => 69,  192 => 84,  188 => 83,  180 => 78,  146 => 57,  134 => 51,  127 => 47,  110 => 39,  77 => 26,  63 => 19,  100 => 12,  90 => 8,  59 => 29,  53 => 15,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 56,  140 => 55,  132 => 51,  128 => 25,  119 => 42,  107 => 36,  71 => 25,  177 => 65,  165 => 64,  160 => 61,  135 => 47,  126 => 45,  114 => 42,  84 => 28,  70 => 23,  67 => 16,  61 => 15,  87 => 30,  31 => 4,  38 => 5,  26 => 1,  93 => 28,  88 => 6,  78 => 21,  46 => 9,  44 => 11,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 71,  163 => 65,  158 => 63,  156 => 58,  151 => 59,  142 => 26,  138 => 28,  136 => 27,  121 => 46,  117 => 44,  105 => 40,  91 => 29,  62 => 14,  49 => 10,  21 => 2,  25 => 3,  94 => 9,  89 => 20,  85 => 25,  75 => 23,  68 => 18,  56 => 11,  27 => 4,  24 => 3,  19 => 1,  79 => 23,  72 => 20,  69 => 19,  47 => 12,  40 => 12,  37 => 11,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 53,  131 => 26,  123 => 47,  120 => 40,  115 => 41,  111 => 37,  108 => 14,  101 => 45,  98 => 33,  96 => 31,  83 => 29,  74 => 21,  66 => 15,  55 => 13,  52 => 10,  50 => 10,  43 => 8,  41 => 9,  35 => 4,  32 => 4,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 27,  144 => 53,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 45,  116 => 16,  112 => 15,  109 => 41,  106 => 36,  103 => 35,  99 => 30,  95 => 34,  92 => 39,  86 => 27,  82 => 22,  80 => 5,  73 => 19,  64 => 17,  60 => 6,  57 => 25,  54 => 10,  51 => 14,  48 => 22,  45 => 17,  42 => 18,  39 => 7,  36 => 6,  33 => 4,  30 => 3,);
    }
}
