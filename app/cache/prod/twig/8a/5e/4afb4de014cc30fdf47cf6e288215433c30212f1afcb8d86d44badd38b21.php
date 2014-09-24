<?php

/* ProyectoBundle:Proyecto:index.html.twig */
class __TwigTemplate_8a5e4afb4de014cc30fdf47cf6e288215433c30212f1afcb8d86d44badd38b21 extends Twig_Template
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
        echo "    <h3>LISTA DE PROYECTOS</h3>
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
  <li class=\"active\">LISTA DE PROYECTOS</li>
</ol>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <meta content=\"120\" http-equiv=\"REFRESH\"> </meta>

    

    <div class=\"panel-group\" id=\"accordion\" style=\"width: 80%;\">
  <div class=\"panel panel-default\">
    <div class=\"panel-heading\">
      <h4 class=\"panel-title\">
        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\">
          ACTIVIDADES ACTUALMENTE EN PROCESO
        </a>
      </h4>
    </div>
    <div id=\"collapseOne\" class=\"panel-collapse collapse in\">
      <div class=\"panel-body\">
        ";
        // line 35
        echo "        <table class=\"table table-bordered\">
            <tr>
                <th width=\"20%\">RESPONSABLE</th>
                <th width=\"20%\">PROYECTO</th>
                <th width=\"20%\">TAREA</th>
                <th width=\"40%\">ACTIVIDAD</th>
            </tr>
        ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["integrantes"]) ? $context["integrantes"] : $this->getContext($context, "integrantes")));
        foreach ($context['_seq'] as $context["_key"] => $context["int"]) {
            // line 43
            echo "            ";
            $context["x"] = 0;
            // line 44
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["actividades"]) ? $context["actividades"] : $this->getContext($context, "actividades")));
            foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
                if (($this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "id") == $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "id"))) {
                    // line 45
                    echo "                ";
                    $context["x"] = 1;
                    // line 46
                    echo "                <tr>
                    <td>";
                    // line 47
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "primerNombre")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "primerApellido")), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 48
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "proyecto"), "nombre")), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 49
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "nombre")), "html", null, true);
                    echo "</td>
                    <td><a href=\"";
                    // line 50
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad", array("idtarea" => $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "id"))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                    echo "</a></td>
                </tr>
            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "            ";
            if (((isset($context["x"]) ? $context["x"] : $this->getContext($context, "x")) == 0)) {
                // line 54
                echo "                <tr>
                    <td>";
                // line 55
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "primerNombre")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "primerApellido")), "html", null, true);
                echo "</td>
                    <td colspan=\"3\">Sin actividades en proceso</td>
                </tr>
            ";
            }
            // line 59
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['int'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "        </table>
      </div>
    </div>
  </div>
  ";
        // line 65
        if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN")) {
            // line 66
            echo "  <div class=\"panel panel-default\">
    <div class=\"panel-heading\">
      <h4 class=\"panel-title\">
        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\">
          ACTIVIDADES POR REVISAR
        </a>
      </h4>
    </div>
    <div id=\"collapseTwo\" class=\"panel-collapse collapse\">
      <div class=\"panel-body\">
        ";
            // line 77
            echo "          <table class=\"table table-bordered\">
              <tr>
                  <th style=\"text-align: center\" colspan=\"4\">ACTIVIDADES POR REVISAR</th>
              </tr>
              <tr>
                  <th width=\"20%\">RESPONSABLE</th>
                  <th width=\"20%\">PROYECTO</th>
                  <th width=\"20%\">TAREA</th>
                  <th width=\"40%\">ACTIVIDAD</th>
              </tr>
          ";
            // line 87
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["integrantes"]) ? $context["integrantes"] : $this->getContext($context, "integrantes")));
            foreach ($context['_seq'] as $context["_key"] => $context["int"]) {
                // line 88
                echo "              ";
                $context["x"] = 0;
                // line 89
                echo "              ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["revision"]) ? $context["revision"] : $this->getContext($context, "revision")));
                foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
                    if (($this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "id") == $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "id"))) {
                        // line 90
                        echo "                  ";
                        $context["x"] = 1;
                        // line 91
                        echo "                  <tr>
                      <td>";
                        // line 92
                        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "primerNombre")), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "primerApellido")), "html", null, true);
                        echo "</td>
                      <td>";
                        // line 93
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "proyecto"), "nombre")), "html", null, true);
                        echo "</td>
                      <td>";
                        // line 94
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "nombre")), "html", null, true);
                        echo "</td>
                      <td><a href=\"";
                        // line 95
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad", array("idtarea" => $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "id"))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                        echo "</a></td>
                  </tr>
              ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 98
                echo "
              ";
                // line 99
                if (((isset($context["x"]) ? $context["x"] : $this->getContext($context, "x")) == 0)) {
                    // line 100
                    echo "                  <tr>
                      <td>";
                    // line 101
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "primerNombre")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["int"]) ? $context["int"] : $this->getContext($context, "int")), "primerApellido")), "html", null, true);
                    echo "</td>
                      <td colspan=\"3\">Sin actividades por revisar</td>
                  </tr>
              ";
                }
                // line 105
                echo "
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['int'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 107
            echo "          </table>
      </div>
    </div>
  </div>
  ";
        }
        // line 112
        echo "  <div class=\"panel panel-default\">
    <div class=\"panel-heading\">
      <h4 class=\"panel-title\">
        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse3\">
          MIS ACTIVIDADES PENDIENTES
        </a>
      </h4>
    </div>
    <div id=\"collapse3\" class=\"panel-collapse collapse\">
      <div class=\"panel-body\">
        ";
        // line 123
        echo "          <table class=\"table table-bordered\">
              <thead>
              <tr>
                  <th width=\"20%\">PROYECTO</th>
                  <th width=\"20%\">TAREA</th>
                  <th width=\"10%\">FIN TAREA</th>
                  <th width=\"50%\">ACTIVIDAD</th>
              </tr>
              </thead>
              <tbody>
              ";
        // line 133
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actpendiente"]) ? $context["actpendiente"] : $this->getContext($context, "actpendiente")));
        foreach ($context['_seq'] as $context["_key"] => $context["act"]) {
            if (($this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "responsable"), "id") == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))) {
                // line 134
                echo "                  ";
                $context["x"] = 1;
                // line 135
                echo "                  <tr>
                      <td>";
                // line 136
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "proyecto"), "nombre")), "html", null, true);
                echo "</td>
                      <td>";
                // line 137
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "nombre")), "html", null, true);
                echo "</td>
                      <td>";
                // line 138
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "fechafinestimada"), "d-m-Y"), "html", null, true);
                echo "</td>
                      <td><a href=\"";
                // line 139
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad", array("idtarea" => $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
                echo "</a></td>
                  </tr>
              ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['act'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 142
        echo "              </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

          <br><br>
    <table id=\"tabladatatable\" class=\"table table-hover\">
        <thead>
            <tr>
                <th style=\"display:none;\">Id</th>
                <th style=\"width: 20%\">Nombre</th>
                <th style=\"width: 20%\">Descripcion</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Estatus</th>
                <th>Completado</th>
                <th>Responsables</th>
                <th style=\"width: 17%\">Acciones</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 165
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 166
            echo "            <tr>
                <td style=\"display:none;\">";
            // line 167
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</td>
                <td><a style=\"font-size: 14px;color:black;\" href=\"";
            // line 168
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("proyecto_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre")), "html", null, true);
            echo "</a></td>
                <td width=\"15%\" style=\"text-align: justify;\"><span style=\"cursor:pointer;\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
            // line 169
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion")), 0, 30), "html", null, true);
            echo "...</span></td>
                <td align=\"center\">
                    ";
            // line 171
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechainicio")) {
                // line 172
                echo "                        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechainicio"), "d-m-Y"), "html", null, true);
                echo "
                    ";
            } else {
                // line 174
                echo "                        <span class=\"label label-info\">POR DEFINIR</span>
                    ";
            }
            // line 176
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 178
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafin")) {
                // line 179
                echo "                        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechafin"), "d-m-Y"), "html", null, true);
                echo "
                    ";
            } else {
                // line 181
                echo "                        <span class=\"label label-info\">POR DEFINIR</span>
                    ";
            }
            // line 183
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 185
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1)) {
                // line 186
                echo "                        <span class=\"label label-danger\">SIN INICIAR</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 2)) {
                // line 188
                echo "                        <span class=\"label label-warning\">EN PROGRESO</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 3)) {
                // line 190
                echo "                        <span class=\"label label-success\">CULMINADO</span>
                    ";
            }
            // line 192
            echo "                </td>
                <td align=\"center\">
                    ";
            // line 194
            if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje") == 0) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1))) {
                // line 195
                echo "                        <span class=\"label label-info\">N/A</span>
                    ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje") == 0)) {
                // line 197
                echo "                        <span class=\"label label-info\">SIN AVANCE</span>
                    ";
            } else {
                // line 199
                echo "                        <br><div class=\"progress\">
                          <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
                // line 200
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje"), "html", null, true);
                echo "%;color:black;font-weight:bold;\">
                            ";
                // line 201
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "porcentaje"), "html", null, true);
                echo "%
                          </div>
                        </div>
                    ";
            }
            // line 205
            echo "                </td>
                <td>
                    ";
            // line 207
            if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "responsable")))) {
                // line 208
                echo "                        ";
                $context["cont"] = 0;
                // line 209
                echo "                        ";
                $context["largo"] = twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "responsable"));
                // line 210
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "responsable"));
                foreach ($context['_seq'] as $context["_key"] => $context["es"]) {
                    echo " 
                            ";
                    // line 211
                    $context["cont"] = ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1);
                    // line 212
                    echo "                                ";
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["es"]) ? $context["es"] : $this->getContext($context, "es")), "primerNombre")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["es"]) ? $context["es"] : $this->getContext($context, "es")), "primerApellido")), "html", null, true);
                    if (((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) == ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1))) {
                        echo " y";
                    } elseif ((((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) > 1) && ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) < ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1)))) {
                        echo ",";
                    } else {
                        echo ".";
                    }
                    // line 213
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['es'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 214
                echo "                            
                    ";
            } else {
                // line 216
                echo "                        Debe agregar un responsable
                    ";
            }
            // line 218
            echo "                </td>
                <td>
                    
                    <a style=\"color:black;\" href=\"";
            // line 221
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("proyecto_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-search\"></span></a>
                    <a style=\"color:black;\" href=\"";
            // line 222
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("proyecto_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-edit\"></span></a>
                    <a style=\"color:black;\" href=\"";
            // line 223
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioproyecto", array("proyecto" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Comentarios del Proyecto\"><b class=\"glyphicon glyphicon-align-justify\"></b></a>
                    <a style=\"color:black;\" href=\"";
            // line 224
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoproyecto", array("proyecto" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Documentos del proyecto\"><b class=\"glyphicon glyphicon-cloud-upload\"></b></a> 
                    <a style=\"color:black;\" href=\"";
            // line 225
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea", array("idproyecto" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
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
        // line 229
        echo "        </tbody>
    </table>

    <br><br>
    ";
        // line 233
        if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_ADMIN")) {
            // line 234
            echo "    <a class=\"btn btn-default\" href=\"";
            echo $this->env->getExtension('routing')->getPath("proyecto_new");
            echo "\">NUEVO PROYECTO</a>
    ";
        }
        // line 236
        echo "    <br><br>


                
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
        return "ProyectoBundle:Proyecto:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  549 => 236,  543 => 234,  541 => 233,  535 => 229,  519 => 225,  515 => 224,  511 => 223,  507 => 222,  503 => 221,  498 => 218,  494 => 216,  490 => 214,  484 => 213,  472 => 212,  470 => 211,  463 => 210,  460 => 209,  457 => 208,  455 => 207,  451 => 205,  444 => 201,  440 => 200,  437 => 199,  433 => 197,  429 => 195,  427 => 194,  423 => 192,  419 => 190,  415 => 188,  411 => 186,  409 => 185,  405 => 183,  401 => 181,  395 => 179,  393 => 178,  389 => 176,  385 => 174,  379 => 172,  377 => 171,  370 => 169,  364 => 168,  360 => 167,  357 => 166,  353 => 165,  328 => 142,  316 => 139,  312 => 138,  308 => 137,  304 => 136,  301 => 135,  298 => 134,  293 => 133,  281 => 123,  269 => 112,  262 => 107,  255 => 105,  246 => 101,  243 => 100,  241 => 99,  238 => 98,  226 => 95,  222 => 94,  218 => 93,  212 => 92,  209 => 91,  206 => 90,  200 => 89,  197 => 88,  193 => 87,  181 => 77,  169 => 66,  167 => 65,  161 => 61,  154 => 59,  145 => 55,  142 => 54,  139 => 53,  127 => 50,  123 => 49,  119 => 48,  113 => 47,  110 => 46,  107 => 45,  101 => 44,  98 => 43,  94 => 42,  85 => 35,  66 => 18,  63 => 17,  55 => 12,  52 => 11,  49 => 10,  43 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
