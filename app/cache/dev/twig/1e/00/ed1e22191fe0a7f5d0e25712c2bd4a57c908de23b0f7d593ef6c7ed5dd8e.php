<?php

/* ProyectoBundle:Tarea:index.html.twig */
class __TwigTemplate_1e00ed1e22191fe0a7f5d0e25712c2bd4a57c908de23b0f7d593ef6c7ed5dd8e extends Twig_Template
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
        echo "Tarea";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>LISTA DE TAREAS</h1>
    <h4>
    ";
        // line 8
        $context["cont"] = 0;
        // line 9
        echo "    ";
        $context["largo"] = twig_length_filter($this->env, $this->getAttribute((isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")), "nivelorganizacional"));
        // line 10
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")), "nivelorganizacional"));
        foreach ($context['_seq'] as $context["_key"] => $context["es"]) {
            echo " 
        ";
            // line 11
            $context["cont"] = ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1);
            // line 12
            echo "            ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["es"]) ? $context["es"] : $this->getContext($context, "es")), "descripcion")), "html", null, true);
            if (((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) == ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1))) {
                echo " y";
            } elseif ((((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) > 1) && ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) < ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1)))) {
                echo ",";
            } else {
                echo ".";
            }
            // line 13
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['es'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "    </h4>
    
    PROYECTO (";
        // line 16
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")), "nombre")), "html", null, true);
        echo ")<br>
";
    }

    // line 19
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 20
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">PRINCIPAL TELESUR</a></li>
  <li><a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("proyecto");
        echo "\">LISTA DE PROYECTOS</a></li>
  <li class=\"active\">LISTA DE TAREAS</li>
</ol>
";
    }

    // line 27
    public function block_body($context, array $blocks = array())
    {
        // line 28
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <table id=\"tabladatatable\" class=\"table table-hover\">
        <thead>
            <tr>
                <th style=\"width: 15%\">Nombre</th>
                <th style=\"width: 15%\">Descripcion</th>
                <th>Fecha inicio</th>
                <th>Fecha fin (e)</th>
                <th>Fecha fin real</th>
                <th>Estatus</th>
                <th>Completado</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 45
            echo "            <tr>
                <td><a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "idproyecto" => $this->getAttribute((isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
            echo "</a></td>
                <td width=\"10%\" style=\"text-align: justify;\"><span style=\"cursor:pointer;\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion")), 0, 10), "html", null, true);
            echo "...</span></td>
                <td align=\"center\">";
            // line 48
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechainicio")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechainicio"), "d-m-Y"), "html", null, true);
            }
            echo "</td>
                <td align=\"center\">
                    ";
            // line 50
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinestimada")) {
                // line 51
                echo "                        
                        
                        
                        <div ";
                // line 54
                if (((twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinestimada"), "d-m-Y") < twig_date_format_filter($this->env, "now", "d-m-Y")) && (null === $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinreal")))) {
                    echo "class=\"label label-danger\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinestimada"), "d-m-Y"), "html", null, true);
                echo "</div>
                        
                        
                                      
                        
                    ";
            } else {
                // line 60
                echo "                        <span class=\"label label-info\">POR DEFINIR</span>
                    ";
            }
            // line 62
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 64
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinreal")) {
                // line 65
                echo "                        <div ";
                if (((twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinestimada"), "d-m-Y") < twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinreal"), "d-m-Y")) && (!(null === $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinreal"))))) {
                    echo "class=\"label label-danger\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafinreal"), "d-m-Y"), "html", null, true);
                echo "</div>
                    ";
            } else {
                // line 67
                echo "                        <span class=\"label label-info\">POR DEFINIR</span>
                    ";
            }
            // line 69
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 71
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1)) {
                // line 72
                echo "                        <span class=\"label label-danger\">SIN INICIAR</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 2)) {
                // line 74
                echo "                        <span class=\"label label-warning\">EN PROGRESO</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 3)) {
                // line 76
                echo "                        <span class=\"label label-success\">CULMINADO</span>
                    ";
            }
            // line 78
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 80
            if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje") == 0) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1))) {
                // line 81
                echo "                        <span class=\"label label-info\">N/A</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje") == 0)) {
                // line 83
                echo "                        <span class=\"label label-info\">SIN AVANCE</span>
                    ";
            } else {
                // line 85
                echo "                        <br><div class=\"progress\">
                          <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje"), "html", null, true);
                echo "%;color:black;font-weight:bold;\">
                            ";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje"), "html", null, true);
                echo "%
                          </div>
                        </div>
                    ";
            }
            // line 91
            echo "                </td>
                <td align=\"center\">
                        <a href=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-search\"></span></a>
                        <a href=\"";
            // line 94
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-edit\"></span></a>
                        <a href=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad", array("idtarea" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">
                            <span class=\"label label-primary\">";
            // line 96
            if ($this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : null), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array", false, true), 1, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : $this->getContext($context, "totalact")), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array"), 1, array(), "array"), "html", null, true);
            } else {
                echo "0";
            }
            echo "</span>
                            <span class=\"label label-warning\">";
            // line 97
            if ($this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : null), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array", false, true), 2, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : $this->getContext($context, "totalact")), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array"), 2, array(), "array"), "html", null, true);
            } else {
                echo "0";
            }
            echo "</span>
                            <span class=\"label label-info\">";
            // line 98
            if ($this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : null), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array", false, true), 3, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : $this->getContext($context, "totalact")), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array"), 3, array(), "array"), "html", null, true);
            } else {
                echo "0";
            }
            echo "</span>
                            <span class=\"label label-success\">";
            // line 99
            if ($this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : null), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array", false, true), 4, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : $this->getContext($context, "totalact")), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array"), 4, array(), "array"), "html", null, true);
            } else {
                echo "0";
            }
            echo "</span>
                            <span class=\"label label-warning\">";
            // line 100
            if ($this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : null), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array", false, true), 5, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["totalact"]) ? $context["totalact"] : $this->getContext($context, "totalact")), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array"), 5, array(), "array"), "html", null, true);
            } else {
                echo "0";
            }
            echo "</span>
                        </a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "        </tbody>
    </table>

    <br><br><a class=\"btn btn-default\" href=\"";
        // line 108
        echo $this->env->getExtension('routing')->getPath("proyecto");
        echo "\">LISTA DE PROYECTOS</a> | <a class=\"btn btn-primary\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea_new", array("idproyecto" => $this->getAttribute((isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")), "id"))), "html", null, true);
        echo "\">NUEVA TAREA</a><br><br>
                
    <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('span').tooltip()
            
           \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[0,'desc']],
            } );
        })
    </script>
    
    ";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Tarea:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  308 => 108,  303 => 105,  288 => 100,  280 => 99,  272 => 98,  264 => 97,  256 => 96,  252 => 95,  248 => 94,  244 => 93,  240 => 91,  233 => 87,  229 => 86,  226 => 85,  222 => 83,  218 => 81,  216 => 80,  212 => 78,  208 => 76,  204 => 74,  200 => 72,  198 => 71,  194 => 69,  190 => 67,  180 => 65,  178 => 64,  174 => 62,  170 => 60,  157 => 54,  152 => 51,  150 => 50,  143 => 48,  137 => 47,  131 => 46,  128 => 45,  124 => 44,  105 => 28,  102 => 27,  94 => 22,  90 => 21,  87 => 20,  84 => 19,  78 => 16,  74 => 14,  68 => 13,  58 => 12,  56 => 11,  49 => 10,  46 => 9,  44 => 8,  40 => 6,  37 => 5,  31 => 3,);
    }
}
