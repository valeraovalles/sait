<?php

/* UsuarioBundle:User:edit.html.twig */
class __TwigTemplate_ed651531fdea03806fadc631a718448f4643cc1ca84aa8382fa87a44fdd8e20e extends Twig_Template
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
        echo "Editar usuario";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    EDITAR USUARIO
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
    <li class=\"active\">EDITAR USUARIO</li>
</ol>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        $this->displayParentBlock("body", $context, $blocks);
        echo "

<form novalidate class=\"formulario\" action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_update", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'enctype');
        echo ">

    ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "_token"), 'widget');
        echo "
    ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "_token"), 'widget');
        echo "
 
     <div class=\"formShow\">
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "username"), 'errors');
        echo "</div>
            <div class=\"labelform\">Username:</div>
            <div class=\"widgetform\">";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "username"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "password"), 'errors');
        echo "</div>
            <div class=\"labelform\">Password:</div>
            <div class=\"widgetform\">";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "password"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "isActive"), 'errors');
        echo "</div>
            <div class=\"labelform\">Activo:</div>
            <div class=\"widgetform\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "isActive"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "fueradenomina"), 'errors');
        echo "</div>
            <div class=\"labelform\">Fuera de Nomina:</div>
            <div class=\"widgetform\">";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "fueradenomina"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "primerNombre"), 'errors');
        echo "</div>
            <div class=\"labelform\">Primer nombre:</div>
            <div class=\"widgetform\">";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "primerNombre"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "segundoNombre"), 'errors');
        echo "</div>
            <div class=\"labelform\">Segundo nombre:</div>
            <div class=\"widgetform\">";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "segundoNombre"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "primerApellido"), 'errors');
        echo "</div>
            <div class=\"labelform\">Primer apellido:</div>
            <div class=\"widgetform\">";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "primerApellido"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "segundoApellido"), 'errors');
        echo "</div>
            <div class=\"labelform\">Segundo apellido:</div>
            <div class=\"widgetform\">";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "segundoApellido"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "cedula"), 'errors');
        echo "</div>
            <div class=\"labelform\">Cédula:</div>
            <div class=\"widgetform\">";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "cedula"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 72
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "extension"), 'errors');
        echo "</div>
            <div class=\"labelform\">Extensión:</div>
            <div class=\"widgetform\">";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "extension"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "nivelorganizacional"), 'errors');
        echo "</div>
            <div class=\"labelform\">Dependencia:</div>
            <div class=\"widgetform\">";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form_perfil"]) ? $context["edit_form_perfil"] : $this->getContext($context, "edit_form_perfil")), "nivelorganizacional"), 'widget');
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"text-danger\">";
        // line 82
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "rol"), 'errors');
        echo "</div>
            <div class=\"labelform\">Rol:</div>
            <div class=\"widgetform\">";
        // line 84
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "rol"), 'widget');
        echo "</div>
        </div>
    </div>


<br>

<button class=\"btn btn-primary\" type=\"submit\">EDITAR</button> | 

        <a class=\"btn btn-default\" href=\"";
        // line 93
        echo $this->env->getExtension('routing')->getPath("user");
        echo "\">
            IR A LA LISTA
        </a> | 
        <a class=\"btn btn-default\" href=\"";
        // line 96
        echo $this->env->getExtension('routing')->getPath("rol_new");
        echo "\">
            IR A NUEVO ROL
        </a>

</form>

<form action=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("rol_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('Seguro que desea eliminar')\">
    ";
        // line 103
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
    <button class=\"btn btn-danger\" type=\"submit\">BORRAR</button>
</form>
<br>

";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:User:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 103,  242 => 102,  233 => 96,  227 => 93,  215 => 84,  210 => 82,  204 => 79,  199 => 77,  193 => 74,  188 => 72,  182 => 69,  177 => 67,  171 => 64,  166 => 62,  160 => 59,  155 => 57,  149 => 54,  144 => 52,  138 => 49,  133 => 47,  127 => 44,  122 => 42,  116 => 39,  111 => 37,  105 => 34,  100 => 32,  94 => 29,  89 => 27,  82 => 23,  78 => 22,  71 => 20,  66 => 18,  63 => 17,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
