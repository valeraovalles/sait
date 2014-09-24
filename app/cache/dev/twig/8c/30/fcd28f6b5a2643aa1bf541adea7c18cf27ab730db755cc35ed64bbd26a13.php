<?php

/* SitBundle:Ticket:index.html.twig */
class __TwigTemplate_8c30fcd28f6b5a2643aa1bf541adea7c18cf27ab730db755cc35ed64bbd26a13 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::sit.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::sit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Listado";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    LISTADO DE TICKETS ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "
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
  <li class=\"active\">LISTADO DE TICKETS</li>
</ol>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <meta http-equiv=\"refresh\" content=\"180\"> 

    ";
        // line 21
        if (((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")) == null)) {
            // line 22
            echo "
         <div class=\"alert alert-error\">NO EXISTEN TICKETS</div>

    ";
        } else {
            // line 26
            echo "
    <table id=\"tabladatatable\" class=\"table table-striped table-bordered\" style=\"font-size: 12px;\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha S.</th>
                <th>Hora S.</th>
                <th>Solicitante</th>
                <th>Solicitud</th>
                <th>Asignado a</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        ";
            // line 41
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 42
                echo "            <tr>
                <td><a href=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ticket_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
                echo "</a></td>
                <td>";
                // line 44
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechasolicitud")) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechasolicitud"), "Y-m-d"), "html", null, true);
                }
                echo "</td>
                <td>";
                // line 45
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horasolicitud"), "G:i:s"), "html", null, true);
                echo "</td>
                <td>";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "solicitante"), "primernombre"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "solicitante"), "primerapellido"), "html", null, true);
                echo "</td>
                <td><span style=\"cursor:pointer;font-weight:bold;\" title=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "solicitud"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "solicitud"), 0, 15), "html", null, true);
                echo "</span></td>
                ";
                // line 48
                if ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "user", array(), "any", false, true), 0, array(), "array", true, true)) {
                    // line 49
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"));
                    foreach ($context['_seq'] as $context["_key"] => $context["asig"]) {
                        // line 50
                        echo "                    <td>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["asig"]) ? $context["asig"] : $this->getContext($context, "asig")), "primernombre"), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["asig"]) ? $context["asig"] : $this->getContext($context, "asig")), "primerapellido"), "html", null, true);
                        echo "</td>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['asig'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 52
                    echo "                ";
                } else {
                    // line 53
                    echo "                <td>N/A</td>
                ";
                }
                // line 55
                echo "                <td>
                    ";
                // line 56
                if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1)) {
                    echo "<span class=\"label label-danger\"><span style=\"display:none;\">1-</span>Nuevo</span>
                    ";
                } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 2)) {
                    // line 57
                    echo "<span class=\"label label-info\"><span style=\"display:none;\">3-</span>Asignado</span>
                    ";
                } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 3)) {
                    // line 58
                    echo "<span class=\"label label-warning\"><span style=\"display:none;\">4-</span>Re-Asignado</span>
                    ";
                } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 4)) {
                    // line 59
                    echo "<span class=\"label label-success\"><span style=\"display:none;\">5-</span>Culminado</span>
                    ";
                } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 5)) {
                    // line 60
                    echo "<span class=\"label label-warning\"><span style=\"display:none;\">2-</span>Seguimiento</span>
                    ";
                } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 6)) {
                    // line 61
                    echo "<span class=\"label label-success\"><span style=\"display:none;\">6-</span>Culminado Seguimiento</span>
                    ";
                }
                // line 63
                echo "
                </td>
                <td>
                    ";
                // line 66
                if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1) || ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 4))) {
                    // line 67
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ticket_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-search\"></span></a>
                    ";
                } else {
                    // line 69
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sit_seguimientoprincipal", array("idticket" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-search\"></span></a>
                    ";
                }
                // line 71
                echo "
                </td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "        </tbody>
    </table>

    <br><br><br>
    <div><span class=\"label label-danger\">Nuevos:</span> <b>";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["contador"]) ? $context["contador"] : $this->getContext($context, "contador")), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 0, array(), "array"), "unidad"), "id"), array(), "array"), "nuevo"), "html", null, true);
            echo "</b> | <span class=\"label label-info\">Asignados:</span> <b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["contador"]) ? $context["contador"] : $this->getContext($context, "contador")), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 0, array(), "array"), "unidad"), "id"), array(), "array"), "asignado"), "html", null, true);
            echo "</b> | <span class=\"label label-success\">Cerrados total:</span>  <b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["contador"]) ? $context["contador"] : $this->getContext($context, "contador")), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 0, array(), "array"), "unidad"), "id"), array(), "array"), "cerrado"), "html", null, true);
            echo " | <span class=\"label label-warning\">Seguimiento:</span>  <b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["contador"]) ? $context["contador"] : $this->getContext($context, "contador")), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 0, array(), "array"), "unidad"), "id"), array(), "array"), "seguimiento"), "html", null, true);
            echo "</b></div>

    <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[6,'asc'],[1,'desc'],[2,'desc']],
            } );
        })
    </script>

    ";
        }
        // line 91
        echo "
    <BR>
    ";
    }

    public function getTemplateName()
    {
        return "SitBundle:Ticket:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 91,  218 => 79,  212 => 75,  203 => 71,  197 => 69,  191 => 67,  189 => 66,  184 => 63,  180 => 61,  176 => 60,  172 => 59,  168 => 58,  164 => 57,  159 => 56,  156 => 55,  152 => 53,  149 => 52,  138 => 50,  133 => 49,  131 => 48,  125 => 47,  119 => 46,  115 => 45,  109 => 44,  103 => 43,  100 => 42,  96 => 41,  79 => 26,  73 => 22,  71 => 21,  64 => 17,  61 => 16,  53 => 11,  50 => 10,  47 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
