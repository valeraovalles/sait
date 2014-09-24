<?php

/* ProyectoBundle:Actividad:new.html.twig */
class __TwigTemplate_704b4506022e3b63c6b77f457a57873fc3d2feba48919813431dea7fc2dd8af5 extends Twig_Template
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
        echo "Nueva Actividad";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    NUEVA ACTIVIDAD
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
  <li class=\"active\">NUEVA ACTIVIDAD</li>
</ol>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    ";
        // line 19
        if ((($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'errors') || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tiempoestimado"), 'errors')) || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "responsable"), 'errors'))) {
            // line 20
            echo "    <div class=\"alert alert-danger errores\" style=\"width:70%;\">
        <div><b>Alerta! Ha ocurrido un error en el formulario:</b><br><br></div>
        <div>";
            // line 22
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'errors');
            echo "</div>        
        <div>";
            // line 23
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tiempoestimado"), 'errors');
            echo "</div>
        <div>";
            // line 24
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "responsable"), 'errors');
            echo "</div>
    </div>
    ";
        }
        // line 26
        echo "    
    
     <form novalidate action=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_create", array("idtarea" => $this->getAttribute((isset($context["tarea"]) ? $context["tarea"] : $this->getContext($context, "tarea")), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "

        <div class=\"formShow\">
            <div class=\"contenedorform\">
                <div class=\"labelform\">Descripcion:</div>
                <div class=\"widgetform\">";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'widget');
        echo "</div>
            </div>
            <div class=\"contenedorform\">
                <div class=\"labelform\">Tipo tiempo:</div>
                <div class=\"widgetform\">";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipotiempo"), 'widget');
        echo "</div>
            </div>
            <div class=\"contenedorform\">
                <div class=\"labelform\">Tiempo estimado:</div>
                <div class=\"widgetform\">";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tiempoestimado"), 'widget');
        echo "</div>
            </div>
            
            <div class=\"contenedorform\" ";
        // line 45
        if ((!$this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN"))) {
            echo " style=\"display:none;\"";
        }
        echo ">
                <div class=\"labelform\">Responsable:</div>
                <div class=\"widgetform\">";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "responsable"), 'widget');
        echo "</div>
            </div>
            
        </div>
        <a class=\"btn btn-default\" href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad", array("idtarea" => $this->getAttribute((isset($context["tarea"]) ? $context["tarea"] : $this->getContext($context, "tarea")), "id"))), "html", null, true);
        echo "\">
            VOLVER A LA LISTA
        </a> | 
        <input type=\"submit\" class=\"btn btn-primary\" value=\"CREAR ACTIVIDAD\">
        <br><br>
     </form>
     
     <script type=\"text/javascript\">
        \$(document).ready(function(){
            \$('#frontend_proyectobundle_actividad_responsable > option[value=\"";
        // line 60
        echo twig_escape_filter($this->env, (isset($context["idusuario"]) ? $context["idusuario"] : $this->getContext($context, "idusuario")), "html", null, true);
        echo "\"]').attr('selected', 'selected');
        });
     </script>

";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Actividad:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 60,  139 => 51,  132 => 47,  125 => 45,  119 => 42,  112 => 38,  105 => 34,  97 => 29,  91 => 28,  87 => 26,  81 => 24,  77 => 23,  73 => 22,  69 => 20,  67 => 19,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
