<?php

/* ProyectoBundle:Proyecto:general.html.twig */
class __TwigTemplate_9d9db046bf439866aed7dbbc9d578bb835fe783831fb6188b1e315743a99e52d extends Twig_Template
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
        echo "Proyecto";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>LISTA DE PROYECTOS GENERAL</h1>
    ";
        // line 7
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["perfil"]) ? $context["perfil"] : $this->getContext($context, "perfil")), "nivelorganizacional"), "descripcion")), "html", null, true);
        echo "
";
    }

    // line 10
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 11
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">PRINCIPAL TELESUR</a></li>
  ";
        // line 14
        echo "  <li class=\"active\">LISTA DE PROYECTOS GENERAL</li>
</ol>
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <meta content=\"120\" http-equiv=\"REFRESH\"> </meta>
    
    <table class=\"table tablaactividad\">
        <tr>
            ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["niveles"]) ? $context["niveles"] : $this->getContext($context, "niveles")));
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 25
            echo "                    <th style=\"text-align: center;\" width=\"25%\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")), "descripcion"), "html", null, true);
            echo "</th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "        </tr>
        
        <tr>
            ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["niveles"]) ? $context["niveles"] : $this->getContext($context, "niveles")));
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 31
            echo "                <td style=\"text-align: center;\">
                    <div class=\"scrollact\">
                    ";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["proyectos"]) ? $context["proyectos"] : $this->getContext($context, "proyectos")));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 34
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "nivelorganizacional"));
                foreach ($context['_seq'] as $context["_key"] => $context["no"]) {
                    if (($this->getAttribute((isset($context["no"]) ? $context["no"] : $this->getContext($context, "no")), "id") == $this->getAttribute((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")), "id"))) {
                        // line 35
                        echo "                        <a style=\"text-decoration: none;color:black;\" href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea_general", array("idproyecto" => $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "id"))), "html", null, true);
                        echo "\">
                        <div class=\"tarjetaact img-rounded\">
                            <div class=\"responsableact bg-primary\">";
                        // line 37
                        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "nombre")), "html", null, true);
                        echo "</div>
                            
                            ";
                        // line 39
                        if ((($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "fechainicio") != null) || ($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "fechafin") != null))) {
                            // line 40
                            echo "                            <div class=\"bf-info\" style=\"font-size:10px;font-weight: bold; \">
                                ";
                            // line 41
                            if ($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "fechainicio")) {
                                // line 42
                                echo "                                    I: ";
                                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "fechainicio"), "d-m-Y"), "html", null, true);
                                echo "
                                ";
                            }
                            // line 44
                            echo "                                ";
                            if ($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "fechafin")) {
                                // line 45
                                echo "                                    | F: ";
                                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "fechafin"), "d-m-Y"), "html", null, true);
                                echo "
                                ";
                            }
                            // line 47
                            echo "                            </div>
                            ";
                        }
                        // line 49
                        echo "                            
                            <div class=\"descripcionact\">";
                        // line 50
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "descripcion"), "html", null, true);
                        echo "</div>
                            
                            ";
                        // line 53
                        echo "                            <div align=\"center\" style=\"margin-top:5px;\">
                                ";
                        // line 54
                        if (($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "estatus") == 1)) {
                            // line 55
                            echo "                                    <div class=\"label label-danger\">SIN INICIAR</div>
                                ";
                        } elseif (($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "estatus") == 2)) {
                            // line 57
                            echo "                                    <div class=\"label label-warning\">EN PROGRESO</div>
                                ";
                        } elseif (($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "estatus") == 3)) {
                            // line 59
                            echo "                                    <div class=\"label label-success\">CULMINADO</div>
                                ";
                        }
                        // line 61
                        echo "                            </div>
                            
                            ";
                        // line 64
                        echo "                            <div align=\"center\">
                                ";
                        // line 65
                        if (($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "porcentaje") != 0)) {
                            // line 66
                            echo "                                    <div class=\"progress\" style=\"height:5px;margin:0;margin-top:5px;\">
                                      <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
                            // line 67
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "porcentaje"), "html", null, true);
                            echo "%;color:black;font-weight:bold;\"></div>
                                    </div>
                                ";
                        }
                        // line 70
                        echo "                            </div>
                        </div>
                        </a>
                    ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['no'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 73
                echo "        
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "                    </div>
                </td>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "        </tr>
        
    </table>
    
    
    <a class=\"btn btn-primary\" href=\"";
        // line 83
        echo $this->env->getExtension('routing')->getPath("proyecto_newgeneral");
        echo "\">CREAR NUEVO PROYECTO</a> |     
    <a class=\"btn btn-info\" href=\"";
        // line 84
        echo $this->env->getExtension('routing')->getPath("sit_homepage");
        echo "\">SOLICITAR REQUERIMIENTOS (SIT)</a><br><br>
    <button type=\"button\" class=\"btn btn-default\" data-toggle=\"collapse\" data-target=\"#demo\">BUSCAR PROYECTOS</button>
    <br>

<div id=\"demo\" class=\"collapse out\">
    <table id=\"tabladatatable\" class=\"table table-hover\">
        <thead>
            <tr>
                <th style=\"display:none;\">Id</th>
                <th style=\"width: 15%\">Nombre</th>
                <th>Fecha inicio</th>
                <th>Fec. fin</th>
                <th>Estatus</th>
                <th>Completado</th>
                <th>Unidad</th>
                <th style=\"width: 15%\">Acciones</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 103
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 104
            echo "            <tr>
                <td style=\"display:none;\">";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</td>
                <td><a style=\"color:black;\" href=\"";
            // line 106
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("proyecto_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre")), "html", null, true);
            echo "</a></td>
                <td align=\"center\">
                    ";
            // line 108
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechainicio")) {
                // line 109
                echo "                        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechainicio"), "d-m-Y"), "html", null, true);
                echo "
                    ";
            } else {
                // line 111
                echo "                        <span class=\"label label-info\">POR DEFINIR</span>
                    ";
            }
            // line 113
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 115
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafin")) {
                // line 116
                echo "                        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafin"), "d-m-Y"), "html", null, true);
                echo "
                    ";
            } else {
                // line 118
                echo "                        <span class=\"label label-info\">POR DEFINIR</span>
                    ";
            }
            // line 120
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 122
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1)) {
                // line 123
                echo "                        <span class=\"label label-danger\">SIN INICIAR</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 2)) {
                // line 125
                echo "                        <span class=\"label label-warning\">EN PROGRESO</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 3)) {
                // line 127
                echo "                        <span class=\"label label-success\">CULMINADO</span>
                    ";
            }
            // line 129
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 131
            if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje") == 0) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1))) {
                // line 132
                echo "                        <span class=\"label label-info\">N/A</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje") == 0)) {
                // line 134
                echo "                        <span class=\"label label-info\">SIN AVANCE</span>
                    ";
            } else {
                // line 136
                echo "                        <br><div class=\"progress\">
                          <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
                // line 137
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje"), "html", null, true);
                echo "%;color:black;font-weight:bold;\">
                            ";
                // line 138
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje"), "html", null, true);
                echo "%
                          </div>
                        </div>
                    ";
            }
            // line 142
            echo "                </td>
                
                <td>
                    ";
            // line 145
            if ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "nivelorganizacional", array(), "any", false, true), 0, array(), "array", true, true)) {
                // line 146
                echo "                        ";
                $context["cont"] = 0;
                // line 147
                echo "                        ";
                $context["largo"] = twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nivelorganizacional"));
                // line 148
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nivelorganizacional"));
                foreach ($context['_seq'] as $context["_key"] => $context["es"]) {
                    echo " 
                            ";
                    // line 149
                    $context["cont"] = ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1);
                    // line 150
                    echo "                                ";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["es"]) ? $context["es"] : $this->getContext($context, "es")), "descripcion")), "html", null, true);
                    if (((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) == ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1))) {
                        echo " y";
                    } elseif ((((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) > 1) && ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) < ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1)))) {
                        echo ",";
                    } else {
                        echo ".";
                    }
                    // line 151
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['es'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 152
                echo "                            
                    ";
            } else {
                // line 154
                echo "                        Debe agregar un responsable
                    ";
            }
            // line 156
            echo "                    
                </td>
                <td>
                    
                    <a style=\"color:black;\" href=\"";
            // line 160
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("proyecto_show_general", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-search\"></span></a>
                    <a style=\"color:black;\" href=\"";
            // line 161
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea_general", array("idproyecto" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">TAREAS  <span class=\"badge\">";
            if ($this->getAttribute((isset($context["totaltarea"]) ? $context["totaltarea"] : null), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["totaltarea"]) ? $context["totaltarea"] : $this->getContext($context, "totaltarea")), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), array(), "array"), "html", null, true);
            } else {
                echo "0";
            }
            echo "</span></a> 
                    
                    
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 167
        echo "        </tbody>
    </table>
</div>
                
    <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('span').tooltip()
            
           \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[0,'desc']],
            } );
        })
    </script>
    <br><br><br>
    ";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Proyecto:general.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  416 => 167,  398 => 161,  394 => 160,  388 => 156,  384 => 154,  380 => 152,  374 => 151,  364 => 150,  362 => 149,  355 => 148,  352 => 147,  349 => 146,  347 => 145,  342 => 142,  335 => 138,  331 => 137,  328 => 136,  324 => 134,  320 => 132,  318 => 131,  314 => 129,  310 => 127,  306 => 125,  302 => 123,  300 => 122,  296 => 120,  292 => 118,  286 => 116,  284 => 115,  280 => 113,  276 => 111,  270 => 109,  268 => 108,  261 => 106,  257 => 105,  254 => 104,  250 => 103,  228 => 84,  224 => 83,  217 => 78,  209 => 75,  202 => 73,  192 => 70,  186 => 67,  183 => 66,  181 => 65,  178 => 64,  174 => 61,  170 => 59,  166 => 57,  162 => 55,  160 => 54,  157 => 53,  152 => 50,  149 => 49,  145 => 47,  139 => 45,  136 => 44,  130 => 42,  128 => 41,  125 => 40,  123 => 39,  118 => 37,  112 => 35,  106 => 34,  102 => 33,  98 => 31,  94 => 30,  89 => 27,  80 => 25,  76 => 24,  68 => 19,  65 => 18,  59 => 14,  55 => 12,  52 => 11,  49 => 10,  43 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
