<?php

/* DistribucionBundle:Ajax:ajax.html.twig */
class __TwigTemplate_f69e220c237fbfb634f1846d05e8c1c4c00c2e5e90efc15784e9684b8c224e9e extends Twig_Template
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
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "pais")) {
            // line 2
            echo "    <div class=\"contenedorform\">
        <div class=\"labelform\" style=\"width:30%\">Pais:</div>
        <div class=\"widgetform\">";
            // line 4
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pais"), 'widget', array("attr" => array("style" => "width:70%;height:200px;")));
            echo "</div>
    </div>
    <div id=\"tipooperador\"></div>
";
        }
        // line 8
        echo "
";
        // line 9
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "tipooperador")) {
            // line 10
            echo "    <div class=\"contenedorform\">
        <div class=\"labelform\" style=\"width:30%\">Tipo Operador:</div>
\t\t<div class=\"widgetform\">";
            // line 12
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipooperador"), 'widget', array("attr" => array("style" => "width:70%;height:80px;")));
            echo "</div>
    </div>
    <div id=\"operador\"></div>
";
        }
        // line 16
        echo "
";
        // line 17
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "operador")) {
            // line 18
            echo "    <div class=\"contenedorform\">
        <div class=\"labelform\" style=\"width:30%\">Operador:</div>
        <div class=\"widgetform\">";
            // line 20
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "operador"), 'widget', array("attr" => array("style" => "width:70%;")));
            echo "</div>
    </div>
    <div id=\"fechadesde\"></div>
";
        }
        // line 24
        echo "


";
        // line 27
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "fechadesde")) {
            // line 28
            echo "    <div class=\"contenedorform\">
        <div class=\"labelform\" style=\"width:30%\">Fecha desde:</div>
        <div class=\"widgetform\">";
            // line 30
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechadesde"), 'widget', array("attr" => array("style" => "width:40%;")));
            echo "</div>
    </div>
    <div id=\"fechahasta\"></div>
";
        }
        // line 34
        echo "
";
        // line 35
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "fechahasta")) {
            // line 36
            echo "    <div class=\"contenedorform\">
        <div class=\"labelform\" style=\"width:30%\">Fecha hasta:</div>
        <div class=\"widgetform\">";
            // line 38
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechahasta"), 'widget', array("attr" => array("style" => "width:40%;")));
            echo "</div>
    </div>
    <div id=\"formato\"></div>
";
        }
        // line 42
        echo "

";
        // line 44
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "formato")) {
            // line 45
            echo "    <div class=\"contenedorform\">
        <div class=\"labelform\" style=\"width:30%\">Formato:</div>
        <div class=\"widgetform\">";
            // line 47
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "formato"), 'widget', array("attr" => array("style" => "width:40%;")));
            echo "</div>
    </div>
    <div id=\"botones\"></div>
";
        }
        // line 51
        echo "
";
        // line 52
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "botones")) {
            // line 53
            echo "        <br>
        <button class=\"btn btn-primary\" type=\"submit\">GENERAR</button> | 

        <a class=\"btn btn-default\" href=\"";
            // line 56
            echo $this->env->getExtension('routing')->getPath("distribucion_homepage");
            echo "\">IR AL INICIO</a>
";
        }
        // line 58
        echo "
";
        // line 59
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "aniomes")) {
            // line 60
            echo "    <div class=\"contenedorform\">
        <div class=\"labelform\">Fecha hasta:</div>
        <div class=\"widgetform\">";
            // line 62
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
            echo "</div>
    </div>
    <div id=\"formato\"></div>
";
        }
        // line 66
        echo "
<script type=\"text/javascript\">
    \$(document).ready(function () {

        \$('#form_tipooperador').change(function(){
            var dato = \$(\"#form_pais\").val()+\"-\"+\$(\"#form_tipooperador\").val();
            var ruta = \"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax", array("datos" => "variable", "mostrar" => "operador")), "html", null, true);
        echo "\";
            ruta = ruta.replace(\"variable\", dato);
            \$('#operador').load(ruta);
        });

        \$('#form_operador').change(function(){
            var dato = \$(\"#form_operador\").val();
            var ruta = \"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax", array("datos" => "variable", "mostrar" => "fechadesde")), "html", null, true);
        echo "\";
            ruta = ruta.replace(\"variable\", dato);
            \$('#fechadesde').load(ruta);
        });
        
        \$('#form_pais').click(function(){
            var dato = \$(\"#form_pais\").val();
            var ruta = \"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax", array("datos" => "variable", "mostrar" => "tipooperador")), "html", null, true);
        echo "\";
            ruta = ruta.replace(\"variable\", dato);
            \$('#tipooperador').load(ruta);
        });

        \$('#form_fechadesde').change(function(){
            var dato = \$(\"#form_operador\").val();
            var ruta = \"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax", array("datos" => "variable", "mostrar" => "fechahasta")), "html", null, true);
        echo "\";
            ruta = ruta.replace(\"variable\", dato);
            \$('#fechahasta').load(ruta);
        });

        \$('#form_fechahasta').change(function(){
            var dato = \$(\"#form_operador\").val();
            var ruta = \"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax", array("datos" => "variable", "mostrar" => "formato")), "html", null, true);
        echo "\";
            ruta = ruta.replace(\"variable\", dato);
            \$('#formato').load(ruta);
        });

        \$('#form_formato').change(function(){
            var dato = \$(\"#form_formato\").val();
            var ruta = \"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax", array("datos" => "variable", "mostrar" => "botones")), "html", null, true);
        echo "\";
            ruta = ruta.replace(\"variable\", dato);
            \$('#botones').load(ruta);
        });
    });
</script>

  <script>
      \$(function() {
        \$( \"#form_fechadesde\" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: \"dd-mm-yy\",
        });
        \$( \"#form_fechahasta\" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: \"dd-mm-yy\",
        });
      });
  </script>";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Ajax:ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 107,  194 => 100,  184 => 93,  174 => 86,  164 => 79,  154 => 72,  146 => 66,  139 => 62,  135 => 60,  133 => 59,  130 => 58,  125 => 56,  120 => 53,  118 => 52,  115 => 51,  108 => 47,  104 => 45,  102 => 44,  98 => 42,  91 => 38,  87 => 36,  85 => 35,  82 => 34,  75 => 30,  71 => 28,  69 => 27,  64 => 24,  57 => 20,  53 => 18,  51 => 17,  48 => 16,  41 => 12,  37 => 10,  35 => 9,  32 => 8,  25 => 4,  21 => 2,  19 => 1,);
    }
}
