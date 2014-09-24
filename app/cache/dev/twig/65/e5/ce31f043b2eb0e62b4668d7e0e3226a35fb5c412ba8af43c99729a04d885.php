<?php

/* NetoBundle:Ajax:ajaxneto.html.twig */
class __TwigTemplate_65e5ce31f043b2eb0e62b4668d7e0e3226a35fb5c412ba8af43c99729a04d885 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (((((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "periodo") && ($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), 0, array(), "array") != "s")) && ($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), 0, array(), "array") != "a"))) {
            // line 2
            echo "    <div class=\"contenedorform\">
        <div>";
            // line 3
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "periodo"), 'errors');
            echo "</div>
        <div class=\"labelform\">Periodo:</div>
        <div class=\"widgetform\">";
            // line 5
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "periodo"), 'widget');
            echo "</div>
    </div>
    <div id=\"anio\"></div>
";
        }
        // line 9
        echo "
";
        // line 10
        if ((((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "periodo") && ($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), 0, array(), "array") == "a"))) {
            // line 11
            echo "    <div class=\"contenedorform\">
        <div>";
            // line 12
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "aniosaguinaldos"), 'errors');
            echo "</div>
        <div class=\"labelform\">Año:</div>
        <div class=\"widgetform\">";
            // line 14
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "aniosaguinaldos"), 'widget');
            echo "</div>
    </div>
    <div id=\"boton\"></div>
";
        }
        // line 18
        echo "
";
        // line 19
        if ((((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "anio") && ($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), 0, array(), "array") != "s"))) {
            // line 20
            echo "    <div class=\"contenedorform\">
        <div>";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "anios"), 'errors');
            echo "</div>
        <div class=\"labelform\">Año:</div>
        <div class=\"widgetform\">";
            // line 23
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "anios"), 'widget');
            echo "</div>
    </div>
    <div id=\"mes\"></div>
";
        }
        // line 27
        echo "
";
        // line 28
        if ((((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "mes") && ($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), 0, array(), "array") != "s"))) {
            // line 29
            echo "    <div class=\"contenedorform\">
        <div>";
            // line 30
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "meses"), 'errors');
            echo "</div>
        <div class=\"labelform\">Mes:</div>
        <div class=\"widgetform\">";
            // line 32
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "meses"), 'widget');
            echo "</div>
    </div>
";
        }
        // line 35
        echo "

";
        // line 37
        if (($this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), 0, array(), "array") == "s")) {
        }
        // line 38
        echo "

<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$('#form_periodo').change(function(){
            \$('#botonx').hide();
            var dato = \$(\"#form_periodo\").val();
            var ruta = \"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax_neto", array("datos" => "variable", "mostrar" => "anio")), "html", null, true);
        echo "\";
            ruta = ruta.replace(\"variable\", dato);
            \$('#anio').load(ruta);
        });

        \$('#form_anios').change(function(){
            \$('#botonx').hide();
            var dato = \$(\"#form_anios\").val();
            var ruta = \"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax_neto", array("datos" => "variable", "mostrar" => "mes")), "html", null, true);
        echo "\";
            ruta = ruta.replace(\"variable\", dato);
            \$('#mes').load(ruta);
        });

        \$('#form_meses').change(function(){
            \$('#botonx').show();
        });

        \$('#form_aniosaguinaldos').change(function(){
             \$('#botonx').show();
        });
    });
</script>";
    }

    public function getTemplateName()
    {
        return "NetoBundle:Ajax:ajaxneto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 53,  111 => 45,  102 => 38,  99 => 37,  95 => 35,  89 => 32,  84 => 30,  81 => 29,  79 => 28,  76 => 27,  69 => 23,  64 => 21,  61 => 20,  59 => 19,  56 => 18,  49 => 14,  44 => 12,  41 => 11,  39 => 10,  36 => 9,  29 => 5,  24 => 3,  21 => 2,  19 => 1,);
    }
}
