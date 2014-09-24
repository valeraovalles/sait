<?php

/* DistribucionBundle:Reportes:informativo.html.twig */
class __TwigTemplate_9a71e78c487ef5502957fda4aac9a6dcaefeeb9218ab3eda381e12a91279458a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::distribucion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::distribucion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Reporte Informativo";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    REPORTE INFORMATIVO
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
        echo $this->env->getExtension('routing')->getPath("distribucion_homepage");
        echo "\">DISTRIBUCIÓN INICIO</a></li>
  <li class=\"active\">REPORTE INFORMATIVO</li>
</ol>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <form class=\"formNewEditOperador\" novalidate action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("generar_reporte", array("tipo" => "informativo", "formato" => "xls")), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">

        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "

        <div class=\"formShow\" style=\"width:700px;\">
            <div class=\"contenedorform\">
                    ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "zona"), 'errors');
        echo "
                    <div class=\"labelform\" style=\"width:30%;\">Zona:</div>
                    <div class=\"widgetform\">";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "zona"), 'widget');
        echo "</div>
                </div>

                <div id=\"pais\"></div>
        </div>
    </form>

    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('#form_zona').change(function(){
                var dato = \$(\"#form_zona\").val();
                var ruta = \"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax", array("datos" => "variable", "mostrar" => "pais")), "html", null, true);
        echo "\";
                ruta = ruta.replace(\"variable\", dato);
                \$('#pais').load(ruta);
            });

        });
    </script>

    <br>
";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Reportes:informativo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 39,  90 => 28,  85 => 26,  78 => 22,  71 => 20,  66 => 18,  63 => 17,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
