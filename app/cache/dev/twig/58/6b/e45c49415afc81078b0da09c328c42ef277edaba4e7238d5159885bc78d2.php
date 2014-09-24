<?php

/* UsuarioBundle:User:show.html.twig */
class __TwigTemplate_586be45c49415afc81078b0da09c328c42ef277edaba4e7238d5159885bc78d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::administracion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
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
        echo "Consultar usuario";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    CONSULTAR USUARIO
";
    }

    // line 9
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 10
        echo "<ol class=\"breadcrumb\">
    <li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">INICIO</a></li>
    <li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("user");
        echo "\">LISTA DE USUARIOS</a></li>
    <li class=\"active\">CONSULTAR USUARIO</li>
</ol>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "
";
        // line 19
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"formShow\">
        <div class=\"contenedorform\">
            <div class=\"labelform\">Id:</div>
            <div class=\"widgetform\">";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "id"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Username:</div>
            <div class=\"widgetform\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "username"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Estatus:</div>
            <div class=\"widgetform\">
                ";
        // line 33
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "isActive") == 1)) {
            // line 34
            echo "                    Activo
                ";
        } elseif (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "isActive") == null)) {
            // line 36
            echo "                    Inactivo
                ";
        }
        // line 38
        echo "            </div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Nombres:</div>
            <div class=\"widgetform\">";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "primerNombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "segundoNombre"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Apellidos:</div>
            <div class=\"widgetform\">";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "primerApellido"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "segundoApellido"), "html", null, true);
        echo "</div>
        </div>

    </div>
<br>

<form action=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_delete", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('Seguro que desea eliminar')\">
    <a class=\"btn btn-default\" href=\"";
        // line 53
        echo $this->env->getExtension('routing')->getPath("user");
        echo "\">IR A LA LISTA</a> | 
    <a class=\"btn btn-default\" href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "id"))), "html", null, true);
        echo "\">IR A EDITAR</a> | 
    <button class=\"btn btn-danger\" type=\"submit\">BORRAR</button>
    ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
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
        return array (  141 => 56,  136 => 54,  132 => 53,  128 => 52,  117 => 46,  108 => 42,  102 => 38,  98 => 36,  94 => 34,  92 => 33,  84 => 28,  77 => 24,  69 => 19,  66 => 18,  63 => 17,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
