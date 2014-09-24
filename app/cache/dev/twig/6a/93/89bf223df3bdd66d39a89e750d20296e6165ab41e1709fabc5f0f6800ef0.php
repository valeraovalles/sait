<?php

/* TransporteBundle:Solicitudes:missolicitudesshow.html.twig */
class __TwigTemplate_6a9389bf223df3bdd66d39a89e750d20296e6165ab41e1709fabc5f0f6800ef0 extends Twig_Template
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
        echo "Detalle de Mis Solicitudes";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    DETALLE DE MIS SOLICITUDES
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
        echo $this->env->getExtension('routing')->getPath("missolicitudes");
        echo "\">LISTADO DE MIS SOLICITUDES</a></li>
  <li class=\"active\">DETALLE DE MIS SOLICITUDES</li>
</ol>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <div class=\"formShow\"> 
        <div class=\"contenedorform\">
            <div class=\"labelform\">Asistentes</div>
            <div class=\"widgetform\">
                ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["campo"]) ? $context["campo"] : $this->getContext($context, "campo")));
        foreach ($context['_seq'] as $context["_key"] => $context["asistente"]) {
            // line 23
            echo "                    ";
            echo twig_escape_filter($this->env, (isset($context["asistente"]) ? $context["asistente"] : $this->getContext($context, "asistente")), "html", null, true);
            echo ",
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['asistente'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "            </div>          
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Fecha de Solicitud</div>
            <div class=\"widgetform\">";
        // line 29
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaSolicitud"), "d-m-Y"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Fecha de Salida</div>
            <div class=\"widgetform\">";
        // line 33
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaSalida"), "d-m-Y"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Hora de Salida</div>
            <div class=\"widgetform\">";
        // line 37
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horaSalida"), "G:i:s"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Direccion Desde</div>
            <div class=\"widgetform\">";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "direccionDesde"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Direccion Hasta</div>
            <div class=\"widgetform\">";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "direccionHasta"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Equipos/Implementos</div>
            <div class=\"widgetform\">";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcionEquipos"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Motivo de la Solicitud</div>
            <div class=\"widgetform\">";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "datosInteresRazon"), "html", null, true);
        echo "</div>
        </div>
        ";
        // line 55
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "justificacion")) {
            // line 56
            echo "        <div class=\"contenedorform\">
            <div class=\"labelform\">Justificación</div>
            <div class=\"widgetform\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "justificacion"), "html", null, true);
            echo "</div>
        </div>
        ";
        }
        // line 61
        echo "        <div class=\"contenedorform\">
            <div class=\"labelform\">Estatus</div>
            <div class=\"widgetform\">
                ";
        // line 64
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "N")) {
            echo " <a class=\"label label-info\" href=\"#\">Nueva</a> ";
        }
        // line 65
        echo "                ";
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "AP")) {
            echo " <a class=\"label label-success\" href=\"#\">Aprobada</a> ";
        }
        // line 66
        echo "                ";
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "R")) {
            echo " <a class=\"label label-danger\" href=\"#\">Rechazada</a>";
        }
        // line 67
        echo "            </div>
        </div>
    </div> 
    <br>
    <a class=\"btn btn-default\" href=\"";
        // line 71
        echo $this->env->getExtension('routing')->getPath("missolicitudes");
        echo "\">IR A LA LISTA</a>
    <br><br>
";
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Solicitudes:missolicitudesshow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 71,  171 => 67,  166 => 66,  161 => 65,  157 => 64,  152 => 61,  146 => 58,  142 => 56,  140 => 55,  135 => 53,  128 => 49,  121 => 45,  114 => 41,  107 => 37,  100 => 33,  93 => 29,  87 => 25,  78 => 23,  74 => 22,  66 => 17,  63 => 16,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
