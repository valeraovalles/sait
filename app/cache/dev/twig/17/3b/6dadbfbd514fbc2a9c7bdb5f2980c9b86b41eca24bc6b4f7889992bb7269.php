<?php

/* SitBundle:Ticket:show.html.twig */
class __TwigTemplate_173b6dadbfbd514fbc2a9c7bdb5f2980c9b86b41eca24bc6b4f7889992bb7269 extends Twig_Template
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
        echo "Gestionar Ticket";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    GESTIONAR TICKET  ";
        if ((isset($context["usuarioticket"]) ? $context["usuarioticket"] : $this->getContext($context, "usuarioticket"))) {
            // line 7
            echo "        <br>

        <h5>";
            // line 9
            if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") != 4) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") != 6))) {
                echo "ASIGNADO A";
            } else {
                echo "CERRADO POR";
            }
            echo " ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuarioticket"]) ? $context["usuarioticket"] : $this->getContext($context, "usuarioticket")), "primernombre")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuarioticket"]) ? $context["usuarioticket"] : $this->getContext($context, "usuarioticket")), "primerapellido")), "html", null, true);
            echo "</h5>
        ";
        } else {
            // line 11
            echo "            <div class=\"bg-info\">TICKET SIN ASIGNAR</div>
        ";
        }
    }

    // line 15
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 16
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">INICIO</a></li>
  <li><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("ticket");
        echo "\">LISTADO DE TICKETS</a></li>
  <li class=\"active\">GESTIONAR TICKET</li>
</ol>
";
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        // line 24
        $this->displayParentBlock("body", $context, $blocks);
        echo "

";
        // line 26
        if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") != 4) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") != 6))) {
            // line 27
            echo "<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ticket_asigreasig", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" method=\"post\">
<div class=\"row\">
  <div class=\"col-md-7\">
";
        }
        // line 31
        echo "    <div class=\"formShow\" style=\"width:90%;\">
        ";
        // line 32
        if ((isset($context["reasignado"]) ? $context["reasignado"] : $this->getContext($context, "reasignado"))) {
            // line 33
            echo "        <div class=\"contenedorform\">
            <div class=\"labelform\">Reasignado por:</div>
            <div class=\"widgetform\"><span class=\"label label-warning\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reasignado"]) ? $context["reasignado"] : $this->getContext($context, "reasignado")), 0, array(), "array"), "user"), "primernombre"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["reasignado"]) ? $context["reasignado"] : $this->getContext($context, "reasignado")), 0, array(), "array"), "user"), "primerapellido"), "html", null, true);
            echo "</span></div>
        </div>
        ";
        }
        // line 38
        echo "        <div class=\"contenedorform\">
            <div class=\"labelform\">Solicitante:</div>
            <div class=\"widgetform\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "solicitante"), "primernombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "solicitante"), "primerapellido"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Extensión:</div>
            <div class=\"widgetform\">";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["datossolicitante"]) ? $context["datossolicitante"] : $this->getContext($context, "datossolicitante")), "extension"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"contenedorform\">
            <div class=\"labelform\">Fecha solicitud:</div>
            <div class=\"widgetform\">";
        // line 48
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechasolicitud"), "d-m-Y"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">Hora solicitud:</div>
            <div class=\"widgetform\">";
        // line 53
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horasolicitud"), "G:i:s"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 56
        if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 4) || ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 6))) {
            // line 57
            echo "            <div class=\"contenedorform\">
                <div class=\"labelform\">Fecha solución:</div>
                <div class=\"widgetform\">";
            // line 59
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechasolucion"), "d-m-Y"), "html", null, true);
            echo "</div>
            </div>

            <div class=\"contenedorform\">
                <div class=\"labelform\">Hora solución:</div>
                <div class=\"widgetform\">";
            // line 64
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horasolucion"), "G:i:s"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 67
        echo "
        <div class=\"contenedorform\">
            <div class=\"labelform\">Solicitud:</div>
            <div class=\"widgetform\">";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "solicitud"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 73
        if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 4) || ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 6))) {
            // line 74
            echo "            <div class=\"contenedorform\">
                <div class=\"labelform\">Solución:</div>
                <div class=\"widgetform\">";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "solucion"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 79
        echo "
        <div class=\"contenedorform\">
            <div class=\"labelform\">Categoria:</div>
            <div class=\"widgetform\">";
        // line 82
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "categoria"), "categoria")), "html", null, true);
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") != 4)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ticket_asignarcatsub", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"> <span class=\"glyphicon glyphicon-edit\"></a>";
        }
        echo "</div>
        </div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">Subcategoria:</div>
            <div class=\"widgetform\">";
        // line 87
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "subcategoria"), "subcategoria")), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 90
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo")) {
            // line 91
            echo "        <div class=\"contenedorform\">
            <div class=\"labelform\">Archivo:</div>
            <div class=\"widgetform\">

                ";
            // line 95
            $context["extension"] = twig_split_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo"), ".");
            // line 96
            echo "
                ";
            // line 97
            if ((((($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "jpg") || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "jpeg")) || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "png")) || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "gif"))) {
                // line 98
                echo "                    <a data-toggle=\"modal\" href=\"#myModal\">
                        <img class=\"img-rounded\" src=\"";
                // line 99
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/sit/"), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo"), "html", null, true);
                echo "\" width=\"150px\">
                    </a>
                ";
            } else {
                // line 102
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/sit/"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo"), "html", null, true);
                echo "\">DESCARGA ARCHIVO ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array")), "html", null, true);
                echo "</a>
                ";
            }
            // line 104
            echo "            </div>
        </div>
        ";
        }
        // line 107
        echo "    </div>
";
        // line 108
        if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") != 4) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") != 6))) {
            // line 109
            echo "  </div>
  <div class=\"col-md-5\">
        <div class=\"contenedorcatsub\">
        <div class=\"accordion\" id=\"accordion2\">
            
          <div class=\"panel-group\" id=\"accordion\">
            <div class=\"accordion-heading\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-heading\">
                    <h4 class=\"panel-title\">
                      <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\">
                        ASIGNAR TICKET
                      </a>
                    </h4>
                  </div>
                   <div id=\"collapseOne\" class=\"panel-collapse collapse in\" style=\"padding-left: 10px;\">
                ";
            // line 125
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["usuariosunidad"]) ? $context["usuariosunidad"] : $this->getContext($context, "usuariosunidad")));
            foreach ($context['_seq'] as $context["_key"] => $context["usu"]) {
                // line 126
                echo "                    ";
                if ((isset($context["usuarioticket"]) ? $context["usuarioticket"] : $this->getContext($context, "usuarioticket"))) {
                    // line 127
                    echo "                        ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "user"));
                    foreach ($context['_seq'] as $context["_key"] => $context["usuarios"]) {
                        if (($this->getAttribute((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")), "id") != $this->getAttribute((isset($context["usuarioticket"]) ? $context["usuarioticket"] : $this->getContext($context, "usuarioticket")), "id"))) {
                            // line 128
                            echo "                            <div class=\"situnidad\"><input type=\"radio\" name=\"datos\" value=\"asignar-";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")), "id"), "html", null, true);
                            echo "\"> 
                            ";
                            // line 129
                            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")), "primernombre")), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")), "primerapellido")), "html", null, true);
                            echo "</div>
                        ";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usuarios'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 131
                    echo "                    ";
                } else {
                    // line 132
                    echo "                        ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "user"));
                    foreach ($context['_seq'] as $context["_key"] => $context["usuarios"]) {
                        // line 133
                        echo "                            <div class=\"situnidad\"><input type=\"radio\" name=\"datos\" value=\"asignar-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")), "id"), "html", null, true);
                        echo "\"> 
                            ";
                        // line 134
                        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")), "primernombre")), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")), "primerapellido")), "html", null, true);
                        echo "</div>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usuarios'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 136
                    echo "                    ";
                }
                // line 137
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            echo "            </div>
          </div>
        </div>
          <br><br>
            <div class=\"accordion-heading\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-heading\">
                    <h4 class=\"panel-title\">
                      <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\">
                        REASIGNAR TICKET
                      </a>
                    </h4>
                  </div>
                   <div id=\"collapseTwo\" class=\"panel-collapse collapse in\" style=\"padding-left: 10px;\">
                ";
            // line 152
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["unidad"]) ? $context["unidad"] : $this->getContext($context, "unidad")));
            foreach ($context['_seq'] as $context["_key"] => $context["uni"]) {
                if (($this->getAttribute((isset($context["uni"]) ? $context["uni"] : $this->getContext($context, "uni")), "id") != (isset($context["idunidad"]) ? $context["idunidad"] : $this->getContext($context, "idunidad")))) {
                    // line 153
                    echo "                <div class=\"situnidad\"><input type=\"radio\" name=\"datos\" value=\"reasignar-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["uni"]) ? $context["uni"] : $this->getContext($context, "uni")), "id"), "html", null, true);
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["uni"]) ? $context["uni"] : $this->getContext($context, "uni")), "descripcion"), "html", null, true);
                    echo "</div>
                ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['uni'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            echo "              </div>
            </div>
          </div>
        </div>

            <br><input type=\"submit\" class=\"btn btn-primary\" value=\"ASIGNAR O REASIGNAR\">
        </div>
      </div>
</div>
</div>
</form>
";
        }
        // line 167
        echo "

<div  class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" style=\"width:800px\">
    <div class=\"modal-content\" style=\"width:800px\">
      <div class=\"modal-header\">
        <h4 class=\"modal-title\" id=\"myModalLabel\">DESCARGA IMAGEN</h4>
      </div>
      <div class=\"modal-body\">
        <a href=\"/sait/web/libs/scripts/forzardescarga.php?archivo=";
        // line 176
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo"), "html", null, true);
        echo "&ruta=../../uploads/sit/\"><img width=\"400px\" class=\"img-rounded\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/sit/"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "archivo"), "html", null, true);
        echo "\"></a>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">CERRAR</button>
      </div>
    </div>
  </div>
</div>
    
    


    <br>
<a class=\"btn btn-default\" href=\"";
        // line 189
        echo $this->env->getExtension('routing')->getPath("ticket");
        echo "\">IR A LA LISTA</a>
";
        // line 190
        if ((isset($context["usuarioticket"]) ? $context["usuarioticket"] : $this->getContext($context, "usuarioticket"))) {
            echo " | <a class=\"btn btn-default\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sit_seguimientoprincipal", array("idticket" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">IR AL SEGUIMIENTO</a>";
        }
        // line 191
        echo "


";
        // line 216
        echo "
<br><br>
";
    }

    public function getTemplateName()
    {
        return "SitBundle:Ticket:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  437 => 216,  432 => 191,  426 => 190,  422 => 189,  402 => 176,  391 => 167,  377 => 155,  365 => 153,  360 => 152,  344 => 138,  338 => 137,  335 => 136,  325 => 134,  320 => 133,  315 => 132,  312 => 131,  301 => 129,  296 => 128,  290 => 127,  287 => 126,  283 => 125,  265 => 109,  263 => 108,  260 => 107,  255 => 104,  245 => 102,  238 => 99,  235 => 98,  233 => 97,  230 => 96,  228 => 95,  222 => 91,  220 => 90,  214 => 87,  201 => 82,  196 => 79,  190 => 76,  186 => 74,  184 => 73,  178 => 70,  173 => 67,  167 => 64,  159 => 59,  155 => 57,  153 => 56,  147 => 53,  139 => 48,  132 => 44,  123 => 40,  119 => 38,  111 => 35,  107 => 33,  105 => 32,  102 => 31,  94 => 27,  92 => 26,  87 => 24,  84 => 23,  76 => 18,  72 => 17,  69 => 16,  66 => 15,  60 => 11,  47 => 9,  43 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
