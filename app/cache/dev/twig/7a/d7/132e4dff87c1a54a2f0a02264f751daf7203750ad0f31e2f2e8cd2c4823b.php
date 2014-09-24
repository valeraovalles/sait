<?php

/* ProyectoBundle:Documento:new.html.twig */
class __TwigTemplate_7ad7132e4dff87c1a54a2f0a02264f751daf7203750ad0f31e2f2e8cd2c4823b extends Twig_Template
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
        echo "Nuevo Documento";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    NUEVO DOCUMENTO
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
        echo $this->env->getExtension('routing')->getPath("proyecto_homepage");
        echo "\">LISTA DE PROYECTOS</a></li>
  <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoproyecto", array("proyecto" => (isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")))), "html", null, true);
        echo "\">LISTA DE DOCUMENTO</a></li>
  <li class=\"active\">NUEVO DOCUMENTO</li>
</ol>
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    ";
        // line 20
        if (($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'errors') || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file"), 'errors'))) {
            // line 21
            echo "    <div class=\"alert alert-danger errores\" style=\"width:70%;\">
        <div><b>Alerta! Ha ocurrido un error en el formulario:</b><br><br></div>
        <div>";
            // line 23
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'errors');
            echo "</div>
        <div>";
            // line 24
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file"), 'errors');
            echo "</div>
    </div>
    ";
        }
        // line 26
        echo " 

    <form novalidate action=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoproyecto_create", array("proyecto" => (isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
\t";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "

\t\t<div class=\"formShow\" style=\"width:85%;\">
\t\t\t<div class=\"contenedorform\">
\t\t\t\t<div class=\"labelform\">Proyecto:</div>
                <div class=\"widgetform\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["proyect"]) ? $context["proyect"] : $this->getContext($context, "proyect")), "nombre"), "html", null, true);
        echo "</div>
\t\t\t</div>
\t\t    <div class=\"contenedorform\">
                <div class=\"labelform\">Archivo:</div>
                <div class=\"widgetform\">";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file"), 'widget');
        echo "</div>
            </div>
\t\t    <div class=\"contenedorform\">
\t\t        <div class=\"labelform\">Descripci&oacute;n del Documento:</div>
\t\t        <div class=\"widgetform\">";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcion"), 'widget', array("attr" => array("style" => "width:100%;height:100px;")));
        echo "</div>
\t\t    </div>
\t\t</div>
\t\t<input type=\"submit\" value=\"SUBIR DOCUMENTO\" class=\"btn btn-primary\"> | 
\t\t<a class=\"btn btn-default\" href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoproyecto", array("proyecto" => (isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")))), "html", null, true);
        echo "\">VOLVER A LA LISTA</a>

\t</form>
        <br><br>
";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Documento:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 46,  122 => 42,  115 => 38,  108 => 34,  100 => 29,  94 => 28,  90 => 26,  84 => 24,  80 => 23,  76 => 21,  74 => 20,  70 => 19,  67 => 18,  59 => 13,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
