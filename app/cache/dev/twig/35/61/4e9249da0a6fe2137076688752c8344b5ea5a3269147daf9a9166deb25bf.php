<?php

/* NetoBundle:Default:index.html.twig */
class __TwigTemplate_35614e9249da0a6fe2137076688752c8344b5ea5a3269147daf9a9166deb25bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::neto.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::neto.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Recibo de pago";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    SELECCIONE LOS PARÁMETROS
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
  <li class=\"active\">RECIBO DE PAGO</li>
</ol>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    

    <form novalidate action=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("generarrecibo");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">

        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "

        <div class=\"formShow\">
            <div class=\"contenedorform\">
                <div>";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipnom"), 'errors');
        echo "</div>
                <div class=\"labelform\">Tipo:</div>
                <div class=\"widgetform\">";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipnom"), 'widget');
        echo "</div>
            </div>
            
            <div id=\"periodo\"></div>
        </div>

        <input id=\"botonx\" type=\"submit\" value=\"GENERAR RECIBO\" class=\"btn btn-primary\" style=\"display:none;\">
        ";
        // line 53
        echo "
    </form>

    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('#form_tipnom').change(function(){
                \$('#botonx').hide();
                var dato = \$(\"#form_tipnom\").val();
                var ruta = \"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax_neto", array("datos" => "variable", "mostrar" => "periodo")), "html", null, true);
        echo "\";
                ruta = ruta.replace(\"variable\", dato);
                \$('#periodo').load(ruta);
            });
        });
    </script>


";
    }

    public function getTemplateName()
    {
        return "NetoBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 61,  97 => 53,  87 => 29,  82 => 27,  75 => 23,  68 => 21,  62 => 18,  59 => 17,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
