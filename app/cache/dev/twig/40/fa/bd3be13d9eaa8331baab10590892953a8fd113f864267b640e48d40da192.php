<?php

/* ProyectoBundle:Actividad:index.html.twig */
class __TwigTemplate_40fabd3be13d9eaa8331baab10590892953a8fd113f864267b640e48d40da192 extends Twig_Template
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
        echo "Actividad";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>LISTA DE ACTIVIDADES</h1>
    <h4>PROYECTO: ";
        // line 7
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tarea"]) ? $context["tarea"] : $this->getContext($context, "tarea")), "proyecto"), "nombre")), "html", null, true);
        echo "</h4>
    <h4>TAREA: ";
        // line 8
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["tarea"]) ? $context["tarea"] : $this->getContext($context, "tarea")), "nombre")), "html", null, true);
        echo "</h4>
";
    }

    // line 11
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 12
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">PRINCIPAL TELESUR</a></li>
  <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("proyecto");
        echo "\">LISTA DE PROYECTOS</a></li>
  <li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea", array("idproyecto" => $this->getAttribute($this->getAttribute((isset($context["tarea"]) ? $context["tarea"] : $this->getContext($context, "tarea")), "proyecto"), "id"))), "html", null, true);
        echo "\">LISTA DE TAREAS</a></li>
  <li class=\"active\">LISTA DE ACTIVIDADES</li>
</ol>
";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/jquery-countdown/js/jquery.countdown.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>

    <style type=\"text/css\">
      br { clear: both; }
      .cntSeparator {
        font-size: 5px;
        margin: 5px 2px;
        color: #000;
      }
      .desc div {
        float: left;
        font-family: Arial;
        width: 10px;
        margin-right: 20px;
        
        font-size: 5px;
        font-weight: bold;
        color: #000;
      }
      .desc{
          padding-left: 5px;
      }
    </style>


  
    
    <table class=\"table tablaactividad\">
        <tr>
            <th class=\"bg-primary\">NUEVA / PAUSADA</th>
            <th class=\"bg-warning\">EN PROCESO</th>
            <th class=\"bg-info\">EN REVISIÓN</th>
            <th class=\"bg-success\">CULMINADO</th>
            <th class=\"bg-danger\">DEPENDENCIA</th>
        </tr>
        <tr>
            ";
        // line 60
        echo "            <td>
                <div class=\"scrollact\">
                ";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") == 1)) {
                // line 63
                echo "                    
                    <div class=\"tarjetaact img-rounded\">
                        <div class=\"responsableact bg-primary\">";
                // line 65
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerApellido")), "html", null, true);
                echo "</div>
                        <div class=\"accionact\">
                            <a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_show", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-eye-open\"></span></a>
                            ";
                // line 68
                if (($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN") || ($this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "id") == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id")))) {
                    if ((null === $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tiemporeal"))) {
                        echo "<a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_edit", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                        echo "\"><span class=\"glyphicon glyphicon-pencil\"></span></a>";
                    }
                }
                // line 69
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioactividad", array("idactividad" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-list\"></span></a>
                            <a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                // line 70
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "dep")), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-fire\"></span></a>
                            

                        </div>
                        
                        <div class=\"descripcionact\">";
                // line 75
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>

                        ";
                // line 77
                if ((!(null === $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tiemporeal")))) {
                    // line 78
                    echo "                            <div class=\"label label-danger\" style=\"color:white;\">PAUSADA</div><br><br>
                        ";
                }
                // line 80
                echo "                            
                        <div class=\"row\">
                          <div class=\"col-md-3\"></div>
                          <div class=\"col-md-6\"><span class=\"bg-info diasact\">";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tiempoestimado"), "html", null, true);
                echo " ";
                if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 1)) {
                    echo "DÍA(S)";
                } elseif (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 2)) {
                    echo "HORA(S)";
                } else {
                    echo "MINUTO(S)";
                }
                echo "</span></div>
                          <div class=\"col-md-3\">";
                // line 84
                if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") != 4)) {
                    echo "<a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "der")), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a>";
                }
                echo "</div>
                        </div>
                        
                        ";
                // line 87
                if ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemposobrante", array(), "array", true, true)) {
                    // line 88
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, verde indica que se culmino antes del tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-success\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemposobrante", array(), "array"), "html", null, true);
                    echo "<br></span></div>
                        ";
                } elseif ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemporetardo", array(), "array", true, true)) {
                    // line 90
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, rojo indica que no se culmino en el tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-danger\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemporetardo", array(), "array"), "html", null, true);
                    echo "</span></div>
                        ";
                }
                // line 92
                echo "
                    </div>                   
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "                </div>
            </td>
            
            ";
        // line 99
        echo "            <td>
                <div class=\"scrollact\">
                ";
        // line 101
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") == 2)) {
                // line 102
                echo "                    
                    <div class=\"tarjetaact img-rounded\">
                        <div class=\"responsableact bg-warning\">";
                // line 104
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerApellido")), "html", null, true);
                echo "</div>
                        <div class=\"accionact\">
                            <a href=\"";
                // line 106
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_show", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-eye-open\"></span></a>
                            <a href=\"";
                // line 107
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioactividad", array("idactividad" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-list\"></span></a>
                        </div>
                        
                        <div class=\"descripcionact\">";
                // line 110
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>
                        
                        <div class=\"row\">
                          <div class=\"col-md-3\"><a onclick=\"return confirm('La actividad será colocada en pausa, ¿Seguro que desea moverla?')\" href=\"";
                // line 113
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "izq")), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a></div>
                          <div class=\"col-md-6\"><span class=\"bg-info diasact\">";
                // line 114
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tiempoestimado"), "html", null, true);
                echo " ";
                if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 1)) {
                    echo "DÍA(S)";
                } elseif (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 2)) {
                    echo "HORA(S)";
                } else {
                    echo "MINUTO(S)";
                }
                echo "</span></div>
                          <div class=\"col-md-3\"><a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                // line 115
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "der")), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a></div>
                        </div>
                        
                            
                        ";
                // line 119
                if (($this->getAttribute((isset($context["cuentaregresiva"]) ? $context["cuentaregresiva"] : $this->getContext($context, "cuentaregresiva")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array") != "0")) {
                    // line 120
                    echo "                        <script type=\"text/javascript\">
                          \$(function(){
                            \$('#counter";
                    // line 122
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "html", null, true);
                    echo "').countdown({
                              image: '";
                    // line 123
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/jquery-countdown/img/digits.png"), "html", null, true);
                    echo "',
                              startTime: '";
                    // line 124
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cuentaregresiva"]) ? $context["cuentaregresiva"] : $this->getContext($context, "cuentaregresiva")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "html", null, true);
                    echo "'
                            });
                          });
                        </script>
                        
                        <div style=\"padding-left: 42px;padding-top: 10px;margin-bottom: 10px;\">
                            <div id=\"counter";
                    // line 130
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "html", null, true);
                    echo "\"></div>
                            <div class=\"desc\">
                                <div>Días</div>
                                <div>Horas</div>
                                <div>Minutos</div>
                                <div>Segundos</div>
                            </div>
                        </div>
                        ";
                } else {
                    // line 139
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span style=\"color:black;\" class=\"label label-danger\">ACTIVIDAD RETRADASA</span></div>
                        ";
                }
                // line 141
                echo "                        
                        
                    </div>                                       
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        echo "                </div>
            </td>
            
            ";
        // line 149
        echo "            <td>
                <div class=\"scrollact\">
                ";
        // line 151
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") == 3)) {
                echo "                    
                    <div class=\"tarjetaact img-rounded\">
                        <div class=\"responsableact bg-info\">";
                // line 153
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerApellido")), "html", null, true);
                echo "</div>
                        <div class=\"accionact\">
                            <a href=\"";
                // line 155
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioactividad", array("idactividad" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-list\"></span></a>
                        </div>
                        
                        <div class=\"descripcionact\">";
                // line 158
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>
                        
                        <div class=\"row\">
                          <div class=\"col-md-3\">";
                // line 161
                if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN")) {
                    echo "<a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "izq")), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a>";
                }
                echo "</div>
                          <div class=\"col-md-6\"><span class=\"bg-info diasact\">";
                // line 162
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tiempoestimado"), "html", null, true);
                echo " ";
                if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 1)) {
                    echo "DÍA(S)";
                } elseif (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 2)) {
                    echo "HORA(S)";
                } else {
                    echo "MINUTO(S)";
                }
                echo "</span></div>
                          <div class=\"col-md-3\">";
                // line 163
                if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN")) {
                    echo "<a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "cul")), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a>";
                }
                echo "</div>
                        </div>
                        
                        ";
                // line 166
                if ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemposobrante", array(), "array", true, true)) {
                    // line 167
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, verde indica que se culmino antes del tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-success\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemposobrante", array(), "array"), "html", null, true);
                    echo "<br></span></div>
                        ";
                } elseif ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemporetardo", array(), "array", true, true)) {
                    // line 169
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, rojo indica que no se culmino en el tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-danger\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemporetardo", array(), "array"), "html", null, true);
                    echo "</span></div>
                        ";
                }
                // line 171
                echo "                        
                        
                        
                    </div>      
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "             
                </div>
            </td>
            
            ";
        // line 180
        echo "            <td>
                <div class=\"scrollact\">
                ";
        // line 182
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") == 4)) {
                // line 183
                echo "                    
                    <div class=\"tarjetaact img-rounded\">
                        <div class=\"responsableact bg-success\">";
                // line 185
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerApellido")), "html", null, true);
                echo "</div>
                        
                        <div class=\"descripcionact\">";
                // line 187
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>
                        
                        <div class=\"row\">
                          <div class=\"col-md-3\"><a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                // line 190
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "izq")), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a></div>
                          <div class=\"col-md-6\"><span class=\"bg-info diasact\">";
                // line 191
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tiempoestimado"), "html", null, true);
                echo " ";
                if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 1)) {
                    echo "DÍA(S)";
                } elseif (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 2)) {
                    echo "HORA(S)";
                } else {
                    echo "MINUTO(S)";
                }
                echo "</span></div>
                        </div>
                        
                        ";
                // line 194
                if ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemposobrante", array(), "array", true, true)) {
                    // line 195
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, verde indica que se culmino antes del tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-success\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemposobrante", array(), "array"), "html", null, true);
                    echo "<br></span></div>
                        ";
                } elseif ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemporetardo", array(), "array", true, true)) {
                    // line 197
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, rojo indica que no se culmino en el tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-danger\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemporetardo", array(), "array"), "html", null, true);
                    echo "</span></div>
                        ";
                }
                // line 199
                echo "                    </div>                   
                    
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 202
        echo "                </div>
            </td>
            
            ";
        // line 206
        echo "            <td>
                <div class=\"scrollact\">
                ";
        // line 208
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") == 5)) {
                // line 209
                echo "                    
                    <div class=\"tarjetaact img-rounded\">
                        <div class=\"responsableact bg-danger\">";
                // line 211
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerApellido")), "html", null, true);
                echo "</div>
                        <div class=\"accionact\">
                            <a href=\"";
                // line 213
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_show", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-eye-open\"></span></a>
                            <a href=\"";
                // line 214
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioactividad", array("idactividad" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-list\"></span></a>
                            <a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                // line 215
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "nuev")), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-ok\"></span></a>
                        </div>
                        
                        <div class=\"descripcionact\">";
                // line 218
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>
                        
                        <div class=\"row\">
                          <div class=\"col-md-6\"><span class=\"bg-info diasact\">";
                // line 221
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tiempoestimado"), "html", null, true);
                echo " ";
                if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 1)) {
                    echo "DÍA(S)";
                } elseif (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tipotiempo") == 2)) {
                    echo "HORA(S)";
                } else {
                    echo "MINUTO(S)";
                }
                echo "</span></div>
                        </div>
                    </div>                   
                    
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 226
        echo "                </div>
            </td>
        </tr>
    </table>
    
    <a class=\"btn btn-default\" href=\"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea", array("idproyecto" => $this->getAttribute($this->getAttribute((isset($context["tarea"]) ? $context["tarea"] : $this->getContext($context, "tarea")), "proyecto"), "id"))), "html", null, true);
        echo "\">
        IR A LA LISTA DE TAREAS
    </a> | 
    
    <a class=\"btn btn-primary\" href=\"";
        // line 235
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_new", array("idtarea" => $this->getAttribute((isset($context["tarea"]) ? $context["tarea"] : $this->getContext($context, "tarea")), "id"))), "html", null, true);
        echo "\">
        CREAR NUEVA ACTIVIDAD
    </a><br><br>
 
    <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('span').tooltip()
        })
    </script>
    
    ";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Actividad:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  584 => 235,  577 => 231,  570 => 226,  550 => 221,  544 => 218,  538 => 215,  534 => 214,  530 => 213,  523 => 211,  519 => 209,  514 => 208,  510 => 206,  505 => 202,  496 => 199,  490 => 197,  484 => 195,  482 => 194,  468 => 191,  464 => 190,  458 => 187,  451 => 185,  447 => 183,  442 => 182,  438 => 180,  432 => 175,  421 => 171,  415 => 169,  409 => 167,  407 => 166,  397 => 163,  385 => 162,  377 => 161,  371 => 158,  365 => 155,  358 => 153,  350 => 151,  346 => 149,  341 => 145,  331 => 141,  327 => 139,  315 => 130,  306 => 124,  302 => 123,  298 => 122,  294 => 120,  292 => 119,  285 => 115,  273 => 114,  269 => 113,  263 => 110,  257 => 107,  253 => 106,  246 => 104,  242 => 102,  237 => 101,  233 => 99,  228 => 95,  219 => 92,  213 => 90,  207 => 88,  205 => 87,  195 => 84,  183 => 83,  178 => 80,  174 => 78,  172 => 77,  167 => 75,  159 => 70,  154 => 69,  146 => 68,  142 => 67,  135 => 65,  131 => 63,  126 => 62,  122 => 60,  83 => 23,  78 => 21,  75 => 20,  67 => 15,  63 => 14,  59 => 13,  56 => 12,  53 => 11,  47 => 8,  43 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
