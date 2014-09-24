<?php

/* TransporteBundle:Solicitudes:missolicitudesindex.html.twig */
class __TwigTemplate_e2f679d7b9e2a3fb00748a89b515acb4bd2d71b2c8432602e44c718d2efcadef extends Twig_Template
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
        echo "Mis Solicitudes";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    MIS SOLICITUDES
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
    <li class=\"active\">MIS SOLICITUDES </li>
</ol>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <table id=\"tabladatatable\">
        <div align=\"center\" id=\"leyenda\"></div>
        <thead>
            <tr>
                <th>Id</th>                
                <th>Fecha de Solicitud</th>
                <th>Fecha de Salida</th>
                <th>Hora de Salida</th>
                <th>Direccion - Desde</th>        
                <th>Direccion - Hasta</th>        
                <th>Estatus</th>
                <th>Acci&oacute;n</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 35
            echo "            <tr>
                <td><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("showmissolicitudes", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</a></td>            
                <td>";
            // line 37
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaSolicitud")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaSolicitud"), "d-m-Y"), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 38
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaSalida")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaSalida"), "d-m-Y"), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horaSalida"), "G:i:s"), "html", null, true);
            echo "</td>
                <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "direccionDesde"), "html", null, true);
            echo "</td>
                <td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "direccionHasta"), "html", null, true);
            echo "</td>     
                ";
            // line 42
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "N")) {
                // line 43
                echo "                    <td><a class=\"label label-info\" href=\"#\">Nueva</a></td>
                ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "AP")) {
                // line 45
                echo "                    <td><a class=\"label label-success\" href=\"#\">Aprobada</a></td>
                ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == "R")) {
                // line 47
                echo "                    <td><a class=\"label label-danger\" href=\"#\">Rechazada</a></td>
                ";
            }
            // line 49
            echo "                <td>
                    <a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("showmissolicitudes", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-eye-open\"></a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "        </tbody>
    </table>
    <br><br><br>
    <a class=\"btn btn-default\" href=\"";
        // line 57
        echo $this->env->getExtension('routing')->getPath("solicitudes_new");
        echo "\">Nueva Solicitud</a>
    <br><br>
    <script type=\"text/javascript\">
    \$(document).ready(function(){
       \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
            \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
            \"aaSorting\": [[0,'asc'],[1,'asc']],
        } );
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Solicitudes:missolicitudesindex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 57,  146 => 54,  136 => 50,  133 => 49,  129 => 47,  125 => 45,  121 => 43,  119 => 42,  115 => 41,  111 => 40,  107 => 39,  101 => 38,  95 => 37,  89 => 36,  86 => 35,  82 => 34,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
