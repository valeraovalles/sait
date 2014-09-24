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
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_edit", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-pencil\"></span></a>";
                }
                // line 69
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioactividad", array("idactividad" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-list\"></span></a>
                            <a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                // line 70
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "dep")), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-fire\"></span></a>
                            
                            ";
                // line 72
                if ((!(null === $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tiemporeal")))) {
                    // line 73
                    echo "                                <span class=\"label label-danger\" style=\"color:white;\">PAUSADA</span>
                            ";
                }
                // line 75
                echo "
                        </div>
                        
                        <div class=\"descripcionact\">";
                // line 78
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>

                            
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
                // line 88
                if ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemposobrante", array(), "array", true, true)) {
                    // line 89
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, verde indica que se culmino antes del tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-success\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemposobrante", array(), "array"), "html", null, true);
                    echo "<br></span></div>
                        ";
                } elseif ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemporetardo", array(), "array", true, true)) {
                    // line 91
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, rojo indica que no se culmino en el tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-danger\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemporetardo", array(), "array"), "html", null, true);
                    echo "</span></div>
                        ";
                }
                // line 93
                echo "                    </div>                   
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
                    // line 131
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
                    // line 140
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span style=\"color:black;\" class=\"label label-danger\">ACTIVIDAD RETRADASA</span></div>
                        ";
                }
                // line 142
                echo "                    </div>                                       
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        echo "                </div>
            </td>
            
            ";
        // line 148
        echo "            <td>
                <div class=\"scrollact\">
                ";
        // line 150
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") == 3)) {
                echo "                    
                    <div class=\"tarjetaact img-rounded\">
                        <div class=\"responsableact bg-info\">";
                // line 152
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerApellido")), "html", null, true);
                echo "</div>
                        <div class=\"accionact\">
                            <a href=\"";
                // line 154
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioactividad", array("idactividad" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-list\"></span></a>
                        </div>
                        
                        <div class=\"descripcionact\">";
                // line 157
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>
                        
                        <div class=\"row\">
                          <div class=\"col-md-3\">";
                // line 160
                if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN")) {
                    echo "<a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "izq")), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a>";
                }
                echo "</div>
                          <div class=\"col-md-6\"><span class=\"bg-info diasact\">";
                // line 161
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
                // line 162
                if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN")) {
                    echo "<a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "cul")), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a>";
                }
                echo "</div>
                        </div>
                        
                        ";
                // line 165
                if ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemposobrante", array(), "array", true, true)) {
                    // line 166
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, verde indica que se culmino antes del tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-success\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemposobrante", array(), "array"), "html", null, true);
                    echo "<br></span></div>
                        ";
                } elseif ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemporetardo", array(), "array", true, true)) {
                    // line 168
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, rojo indica que no se culmino en el tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-danger\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemporetardo", array(), "array"), "html", null, true);
                    echo "</span></div>
                        ";
                }
                // line 170
                echo "                        
                        
                        
                    </div>      
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 174
        echo "             
                </div>
            </td>
            
            ";
        // line 179
        echo "            <td>
                <div class=\"scrollact\">
                ";
        // line 181
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") == 4)) {
                // line 182
                echo "                    
                    <div class=\"tarjetaact img-rounded\">
                        <div class=\"responsableact bg-success\">";
                // line 184
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerApellido")), "html", null, true);
                echo "</div>
                        
                        <div class=\"descripcionact\">";
                // line 186
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>
                        
                        <div class=\"row\">
                          <div class=\"col-md-3\"><a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                // line 189
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "izq")), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a></div>
                          <div class=\"col-md-6\"><span class=\"bg-info diasact\">";
                // line 190
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
                // line 193
                if ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemposobrante", array(), "array", true, true)) {
                    // line 194
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, verde indica que se culmino antes del tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-success\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemposobrante", array(), "array"), "html", null, true);
                    echo "<br></span></div>
                        ";
                } elseif ($this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : null), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array", false, true), "tiemporetardo", array(), "array", true, true)) {
                    // line 196
                    echo "                            <div style=\"margin-top: 10px;margin-bottom: 10px;\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tiempo utilizado para la actividad en días|horas|minutos|segundos, rojo indica que no se culmino en el tiempo estimado.\" style=\"color:black; cursor:pointer;\" class=\"label label-danger\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["duracionactividad"]) ? $context["duracionactividad"] : $this->getContext($context, "duracionactividad")), $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), array(), "array"), "tiemporetardo", array(), "array"), "html", null, true);
                    echo "</span></div>
                        ";
                }
                // line 198
                echo "                    </div>                   
                    
                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 201
        echo "                </div>
            </td>
            
            ";
        // line 205
        echo "            <td>
                <div class=\"scrollact\">
                ";
        // line 207
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "ubicacion") == 5)) {
                // line 208
                echo "                    
                    <div class=\"tarjetaact img-rounded\">
                        <div class=\"responsableact bg-danger\">";
                // line 210
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "primerApellido")), "html", null, true);
                echo "</div>
                        <div class=\"accionact\">
                            <a href=\"";
                // line 212
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_show", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-eye-open\"></span></a>
                            <a href=\"";
                // line 213
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioactividad", array("idactividad" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-list\"></span></a>
                            <a onclick=\"return confirm('¿Seguro que desea mover la actividad?')\" href=\"";
                // line 214
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad_ubicacion", array("id" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"), "direccion" => "nuev")), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-ok\"></span></a>
                        </div>
                        
                        <div class=\"descripcionact\">";
                // line 217
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</div>
                        
                        <div class=\"row\">
                          <div class=\"col-md-6\"><span class=\"bg-info diasact\">";
                // line 220
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
        // line 225
        echo "                </div>
            </td>
        </tr>
    </table>
    
    <a class=\"btn btn-default\" href=\"";
        // line 230
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea", array("idproyecto" => $this->getAttribute($this->getAttribute((isset($context["tarea"]) ? $context["tarea"] : $this->getContext($context, "tarea")), "proyecto"), "id"))), "html", null, true);
        echo "\">
        IR A LA LISTA DE TAREAS
    </a> | 
    
    <a class=\"btn btn-primary\" href=\"";
        // line 234
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
        return array (  581 => 234,  574 => 230,  567 => 225,  547 => 220,  541 => 217,  535 => 214,  531 => 213,  527 => 212,  520 => 210,  516 => 208,  511 => 207,  507 => 205,  502 => 201,  493 => 198,  487 => 196,  481 => 194,  479 => 193,  465 => 190,  461 => 189,  455 => 186,  448 => 184,  444 => 182,  439 => 181,  435 => 179,  429 => 174,  418 => 170,  412 => 168,  406 => 166,  404 => 165,  394 => 162,  382 => 161,  374 => 160,  368 => 157,  362 => 154,  355 => 152,  347 => 150,  343 => 148,  338 => 144,  330 => 142,  326 => 140,  314 => 131,  304 => 124,  300 => 123,  296 => 122,  292 => 120,  290 => 119,  283 => 115,  271 => 114,  267 => 113,  261 => 110,  255 => 107,  251 => 106,  244 => 104,  240 => 102,  235 => 101,  231 => 99,  226 => 95,  218 => 93,  212 => 91,  206 => 89,  204 => 88,  193 => 84,  181 => 83,  173 => 78,  168 => 75,  164 => 73,  162 => 72,  157 => 70,  152 => 69,  146 => 68,  142 => 67,  135 => 65,  131 => 63,  126 => 62,  122 => 60,  83 => 23,  78 => 21,  75 => 20,  67 => 15,  63 => 14,  59 => 13,  56 => 12,  53 => 11,  47 => 8,  43 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
