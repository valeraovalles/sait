<?php

/* ProyectoBundle:Actividad:show.html.twig */
class __TwigTemplate_f9f672c091f7aaa877ad9f9a35cb7cbf919be03bb73bebcf1c920267b6c0065b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::proyecto.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::proyecto.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Consultar Actividad";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    CONSULTA ACTIVIDAD
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
        echo "\">PRINCIPAL TELESUR</a></li>
  <li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("proyecto");
        echo "\">LISTA DE PROYECTOS</a></li>
  <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea", array("idproyecto" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tarea"), "proyecto"), "id"))), "html", null, true);
        echo "\">LISTA DE TAREAS</a></li>
  <li class=\"active\">CONSULTA DE ACTIVIDAD</li>
</ol>
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        $this->displayParentBlock("body", $context, $blocks);
        echo "


    <div class=\"formShow\" >
        <div class=\"contenedorform\">
            <div class=\"labelform\">Descripcion:</div>
            <div class=\"widgetform\">";
        // line 25
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion")), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Tiempo estimado:</div>
            <div class=\"widgetform\">";
        // line 29
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tiempoestimado")), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">responsables:</div>
            <div class=\"widgetform\">";
        // line 33
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "responsable"), "primerNombre")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "Responsable"), "primerApellido")), "html", null, true);
        echo "</div>
        </div>
    </div>

        <a class=\"btn btn-default\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad", array("idtarea" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tarea"), "id"))), "html", null, true);
        echo "\">
            IR A LA LISTA
        </a>
        ";
        // line 40
        if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN")) {
            // line 41
            echo "        <BR><BR>
        ";
            // line 42
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_start', array("attr" => array("onsubmit" => "return confirm(\"¿Seguro que deseas eliminar?\")")));
            echo "
            ";
            // line 43
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'errors');
            echo "
            ";
            // line 44
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), "submit"), 'row', array("attr" => array("class" => "btn btn-danger")));
            echo "
        ";
            // line 45
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_end');
        } else {
            echo "<br><br>";
        }
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Actividad:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 45,  121 => 44,  117 => 43,  113 => 42,  110 => 41,  108 => 40,  102 => 37,  93 => 33,  86 => 29,  79 => 25,  70 => 19,  67 => 18,  59 => 13,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
