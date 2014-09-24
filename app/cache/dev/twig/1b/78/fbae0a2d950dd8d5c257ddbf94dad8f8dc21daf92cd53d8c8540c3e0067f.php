<?php

/* ProyectoBundle:Documento:show.html.twig */
class __TwigTemplate_1b78fbae0a2d950dd8d5c257ddbf94dad8f8dc21daf92cd53d8c8540c3e0067f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::proyecto.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
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
        echo "Proyecto - documento";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    DOCUMENTOS
";
    }

    // line 9
    public function block_titulo($context, array $blocks = array())
    {
        // line 10
        echo "    <h1>DOCUMENTO</h1>
";
    }

    // line 13
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 14
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">PRINCIPAL TELESUR</a></li>
  <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("proyecto_homepage");
        echo "\">LISTA DE PROYECTOS</a></li>
  <li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioproyecto", array("proyecto" => (isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")))), "html", null, true);
        echo "\">LISTA DE DOCUMENTOS</a></li>
  <li class=\"active\">DOCUMENTO</li>
</ol>
";
    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
        // line 23
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"formShow\" style=\"width:80%;\">
        <div class=\"contenedorform\">
            <div class=\"labelform\">Descripci&oacute;n:</div>
            <div class=\"widgetform\" style:\"width:100%;height:300px;\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion"), "html", null, true);
        echo "</div>
        </div>
        
        <div class=\"contenedorform\">
            <div class=\"labelform\">Archivo:</div>
            <div class=\"widgetform\">
                ";
        // line 34
        $context["extension"] = twig_split_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo"), ".");
        // line 35
        echo "
                ";
        // line 36
        if ((((($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "jpg") || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "jpeg")) || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "png")) || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "gif"))) {
            // line 37
            echo "                    <a data-toggle=\"modal\" href=\"#myModal\">
                        <img class=\"img-rounded\" src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/documentosproyectos/"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo"), "html", null, true);
            echo "\" width=\"150px\">
                    </a>
                ";
        } else {
            // line 41
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/documentosproyectos/"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo"), "html", null, true);
            echo "\">DESCARGA ARCHIVO ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array")), "html", null, true);
            echo "</a>
                ";
        }
        // line 43
        echo "            </div>
        </div>
    </div> 
    <a class=\"btn btn-default\" href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoproyecto", array("proyecto" => (isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")))), "html", null, true);
        echo "\">
        IR A LA LISTA
    </a> 

    <BR><BR>    
    ";
        // line 51
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_start', array("attr" => array("onsubmit" => "return confirm(\"¿Seguro que deseas eliminar el documento?\")")));
        echo "
        ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'errors');
        echo "
        ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), "submit"), 'row', array("attr" => array("class" => "btn btn-danger")));
        echo "
    ";
        // line 54
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_end');
        echo "

";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Documento:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 54,  144 => 53,  140 => 52,  136 => 51,  128 => 46,  123 => 43,  113 => 41,  106 => 38,  103 => 37,  101 => 36,  98 => 35,  96 => 34,  87 => 28,  79 => 23,  76 => 22,  68 => 17,  64 => 16,  60 => 15,  57 => 14,  54 => 13,  49 => 10,  46 => 9,  41 => 6,  38 => 5,  32 => 3,);
    }
}
