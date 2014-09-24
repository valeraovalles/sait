<?php

/* TransporteBundle:Solicitudes:show.html.twig */
class __TwigTemplate_699a8274be2f84d0cb1000617307ec446516210537aa88c70d0724849c0c149d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::transporte.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::transporte.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Detalle de Solicitud";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    DETALLE DE SOLICITUD
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
        echo $this->env->getExtension('routing')->getPath("solicitudes");
        echo "\">LISTADO DE MIS SOLICITUDES</a></li>
  <li class=\"active\">DETALLE DE SOLICITUD</li>
</ol>
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <div class=\"formShow\"> 
        <div class=\"contenedorform\">
            <div class=\"labelform\">Asistentes</div>
            <div class=\"widgetform\">
                ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["campo"]) ? $context["campo"] : $this->getContext($context, "campo")));
        foreach ($context['_seq'] as $context["_key"] => $context["asistente"]) {
            // line 25
            echo "                    ";
            echo twig_escape_filter($this->env, (isset($context["asistente"]) ? $context["asistente"] : $this->getContext($context, "asistente")), "html", null, true);
            echo ",
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['asistente'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "            </div>          
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Fecha de Solicitud</div>
            <div class=\"widgetform\">";
        // line 31
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaSolicitud"), "d-m-Y"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Fecha de Salida</div>
            <div class=\"widgetform\">";
        // line 35
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaSalida"), "d-m-Y"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Hora de Salida</div>
            <div class=\"widgetform\">";
        // line 39
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horaSalida"), "G:i:s"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Direccion Desde</div>
            <div class=\"widgetform\">";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "direccionDesde"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Direccion Hasta</div>
            <div class=\"widgetform\">";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "direccionHasta"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Equipos/Implementos</div>
            <div class=\"widgetform\">";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcionEquipos"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Motivo de la Solicitud</div>
            <div class=\"widgetform\">";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "datosInteresRazon"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Estatus Actual</div>
            <div class=\"widgetform\">
                ";
        // line 60
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "N")) {
            // line 61
            echo "                    <td><a class=\"label label-info\" href=\"#\">Nueva</a></td>
                ";
        } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "AP")) {
            // line 63
            echo "                    <td><a class=\"label label-success\" href=\"#\">Aprobada</a></td>
                ";
        } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "R")) {
            // line 65
            echo "                    <td><a class=\"label label-danger\" href=\"#\">Rechazada</a></td>
                ";
        }
        // line 67
        echo "            </div>
        </div>
        ";
        // line 69
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "justificacion")) {
            // line 70
            echo "            <div class=\"contenedorform\">
                <div class=\"labelform\">Justificación</div>
                <div class=\"widgetform\">";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "justificacion"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 74
        echo "        
        ";
        // line 75
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "N")) {
            // line 76
            echo "            <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("solicitudes_update", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" method=\"post\" ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
            echo ">";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
            echo "<br>
                <div class=\"contenedorform\">
                    <div class=\"labelform\" style=\"width:35%;\">Administrar:</div>
                    <div class=\"widgetform\">";
            // line 79
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "estatus"), 'widget');
            echo "</div>
                </div>
                <div id=\"muestra\"></div>
            </form>
        ";
        }
        // line 84
        echo "    </div>
    <br>
    <a class=\"btn btn-default\" href=\"";
        // line 86
        echo $this->env->getExtension('routing')->getPath("solicitudes");
        echo "\">IR A LA LISTA</a><br><br>

    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('#form_estatus').change(function(){
                var dato = \$(\"#form_estatus\").val();
                var ruta = \"";
        // line 92
        echo $this->env->getExtension('routing')->getPath("ajaxapruebarechaza", array("datos" => "variable"));
        echo "\";
                ruta = ruta.replace(\"variable\", dato);
                \$('#muestra').load(ruta);
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Solicitudes:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 92,  201 => 86,  197 => 84,  189 => 79,  178 => 76,  176 => 75,  173 => 74,  167 => 72,  163 => 70,  161 => 69,  157 => 67,  153 => 65,  149 => 63,  145 => 61,  143 => 60,  135 => 55,  128 => 51,  121 => 47,  114 => 43,  107 => 39,  100 => 35,  93 => 31,  87 => 27,  78 => 25,  74 => 24,  66 => 19,  63 => 18,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
