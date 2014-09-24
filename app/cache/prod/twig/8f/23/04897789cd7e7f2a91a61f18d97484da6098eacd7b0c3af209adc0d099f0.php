<?php

/* SitBundle:Default:index.html.twig */
class __TwigTemplate_8f2304897789cd7e7f2a91a61f18d97484da6098eacd7b0c3af209adc0d099f0 extends Twig_Template
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
        echo "SIT";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    SISTEMA INTEGRAL DE TECNOLOGÍA
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
  <li class=\"active\">SIT INICIO</li>
</ol>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
<div class=\"row\">
  <div class=\"col-md-6\">
  \t<div class=\"tickettitulo alert alert-info\"><h5>SOLICITAR SOPORTE TÉCNICO</h5></div>
  \t<div class=\"ticketsoporte\">

    ";
        // line 24
        if (((($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "unidad"), 'errors') || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "solicitud"), 'errors')) || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "extension"), 'errors')) || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file"), 'errors'))) {
            // line 25
            echo "    <div class=\"alert alert-danger errores\" style=\"width:90%;\">
        <div><b>Alerta! Ha ocurrido un error en el formulario:</b><br><br></div>
        <div>";
            // line 27
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "unidad"), 'errors');
            echo "</div>
        <div>";
            // line 28
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "solicitud"), 'errors');
            echo "</div>
        <div>";
            // line 29
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "extension"), 'errors');
            echo "</div>
        <div>";
            // line 30
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file"), 'errors');
            echo "</div>
    </div>
    ";
        }
        // line 33
        echo "
    <form novalidate action=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("ticket_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
\t        ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "
\t        ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "_token"), 'widget');
        echo "

\t\t<div class=\"formShowSit\">
\t            <div class=\"contenedorformSit\">
\t                <div class=\"labelformSit\">Unidad:</div>
\t                <div class=\"widgetformSit\">";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "unidad"), 'widget', array("attr" => array("style" => "width:50%")));
        echo "</div>
\t            </div>
\t        \t<div class=\"contenedorformSit\">
\t                <div class=\"labelformSit\">Solicitud:</div>
\t                <div class=\"widgetformSit\">";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "solicitud"), 'widget', array("attr" => array("style" => "width:50%")));
        echo "</div>
\t            </div>
\t            <div class=\"contenedorformSit\">
\t                <div class=\"labelformSit\">Ext. Solicitante:</div>
\t                <div class=\"widgetformSit\">";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "extension"), 'widget', array("attr" => array("value" => $this->getAttribute((isset($context["datosusuario"]) ? $context["datosusuario"] : $this->getContext($context, "datosusuario")), "extension"), "style" => "width:50%")));
        echo "</div>
                    </div><br>
\t   \t        <div class=\"contenedorformSit\">
                    <div style=\"text-align:center;padding-left: 120px;\">
                       \t";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file"), 'widget');
        echo "
                    </div>
                </div>
\t\t</div>

            <button class=\"btn btn-large btn-primary\" type=\"submit\">SOLICITAR</button>";
        // line 58
        if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_GENERAL")) {
            echo " | 
            <a class=\"btn btn-default\" href=\"";
            // line 59
            echo $this->env->getExtension('routing')->getPath("proyecto_general");
            echo "\">VOLVER A PROYECTOS</a>";
        }
        // line 60
        echo "\t    </form>
  \t</div>
  </div>
  
  <div class=\"col-md-6\">
  \t<div class=\"tickettitulo alert alert-info\"><h5>ESTATUS DE TICKETS</h5></div>
\t<div class=\"ticketespera\">
\t\t
\t\t";
        // line 68
        $context["nuevo"] = 0;
        echo " ";
        $context["asignado"] = 0;
        echo " ";
        $context["culminado"] = 0;
        echo " ";
        $context["reasignado"] = 0;
        // line 69
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ticketusuario"]) ? $context["ticketusuario"] : $this->getContext($context, "ticketusuario")));
        foreach ($context['_seq'] as $context["_key"] => $context["tu"]) {
            // line 70
            echo "\t\t\t";
            if (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 1)) {
                // line 71
                echo "\t\t\t\t";
                $context["nuevo"] = ((isset($context["nuevo"]) ? $context["nuevo"] : $this->getContext($context, "nuevo")) + 1);
                // line 72
                echo "\t\t\t";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 2)) {
                // line 73
                echo "\t\t\t\t";
                $context["asignado"] = ((isset($context["asignado"]) ? $context["asignado"] : $this->getContext($context, "asignado")) + 1);
                // line 74
                echo "\t\t\t\t";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 3)) {
                // line 75
                echo "\t\t\t\t";
                $context["reasignado"] = ((isset($context["reasignado"]) ? $context["reasignado"] : $this->getContext($context, "reasignado")) + 1);
                // line 76
                echo "\t\t\t";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 4)) {
                // line 77
                echo "\t\t\t\t";
                $context["culminado"] = ((isset($context["culminado"]) ? $context["culminado"] : $this->getContext($context, "culminado")) + 1);
                // line 78
                echo "\t\t\t";
            }
            // line 79
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "
\t\tNuevos: <a style=\"cursor:pointer;\" title=\"Tickets solicitados que aún no se han atendido\"><span class=\"badge\" style=\"background-color:#b94a48;\">";
        // line 81
        echo twig_escape_filter($this->env, (isset($context["nuevo"]) ? $context["nuevo"] : $this->getContext($context, "nuevo")), "html", null, true);
        echo "</span></a>
\t\tAsignados: <a style=\"cursor:pointer;\" title=\"Tickets asignados para su resolución\"><span class=\"badge\" style=\"background-color:#468eb2;\">";
        // line 82
        echo twig_escape_filter($this->env, (isset($context["asignado"]) ? $context["asignado"] : $this->getContext($context, "asignado")), "html", null, true);
        echo "</span></a>
\t\tReasignados: <a style=\"cursor:pointer;\" title=\"Tickets reasignados a otra unidad\"><span class=\"badge\" style=\"background-color:orange;\">";
        // line 83
        echo twig_escape_filter($this->env, (isset($context["reasignado"]) ? $context["reasignado"] : $this->getContext($context, "reasignado")), "html", null, true);
        echo "</span></a>
\t\tCulminados: <a style=\"cursor:pointer;\" title=\"Tickets resueltos\"><span class=\"badge\" style=\"background-color:#468847;\">";
        // line 84
        echo twig_escape_filter($this->env, (isset($context["culminado"]) ? $context["culminado"] : $this->getContext($context, "culminado")), "html", null, true);
        echo "</span></a>

\t\t<div id=\"muestra\">
\t\t\t<br>
\t\t\t<div><b>HISTORIAL</b></div>
\t\t\t<div class=\"listadoticketsolicitante\">
\t\t\t<table class=\"ticketsolicitante table table-striped\" cellpadding=0 cellspacing=0>
\t\t\t\t<tr><th>Solicitud</th><th>Fecha/Hora</th><th>Acciones</th></tr>

\t\t\t\t";
        // line 93
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ticketusuario"]) ? $context["ticketusuario"] : $this->getContext($context, "ticketusuario")));
        foreach ($context['_seq'] as $context["_key"] => $context["tu"]) {
            echo "\t\t\t\t
\t\t\t\t\t<tr ";
            // line 94
            if (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 1)) {
                echo "style=\"color:red;\"";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 2)) {
                echo " style=\"color:steelblue;\"";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 3)) {
                echo "  style=\"color:orange;\" ";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 4)) {
                echo "style=\"color:green;\"";
            }
            echo ">
\t\t\t\t\t\t<td>";
            // line 95
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "solicitud"), 0, 20), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>";
            // line 96
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "fechasolicitud"), "d-m-Y"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "horasolicitud"), "G:i:s"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<a data-toggle=\"modal\" href=\"#myModal";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "id"), "html", null, true);
            echo "\" title=\"Detalles del Ticket\"><span class=\"glyphicon glyphicon-search\"></span></a>
\t\t\t\t\t\t\t";
            // line 99
            if (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 2)) {
                // line 100
                echo "\t\t\t\t\t\t\t <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sit_seguimientoprincipal", array("idticket" => $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "id"))), "html", null, true);
                echo "\" title=\"Seguimiento del Ticket\"><span class=\"glyphicon glyphicon-share-alt\"></span></a>
\t\t\t\t\t\t\t";
            }
            // line 102
            echo "\t\t\t\t\t\t</td>\t\t
\t\t\t\t\t</tr>                                        
                    <div class=\"modal fade\" id=\"myModal";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "id"), "html", null, true);
            echo "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                      \t<div class=\"modal-dialog\">
\t                        <div class=\"modal-content\">
\t\t                        <div class=\"modal-header\">
\t\t                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
\t\t                        \t<h4 class=\"modal-title\" id=\"myModalLabel\">ESTATUS DE TICKET</h4>
\t\t                        </div>
\t                          \t<div class=\"modal-body\">
\t                                <b>Solicitud:</b> ";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "solicitud"), "html", null, true);
            echo " <br> <br>
\t                                ";
            // line 113
            if (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 1)) {
                // line 114
                echo "\t                                        <p class=\"text-error\">El ticket aún no se ha asignado a un técnico.</p>
\t                                ";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 2)) {
                // line 116
                echo "\t                                        <p class=\"text-info\">El ticket fue asignado a un técnico de la unidad de ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "unidad"), "descripcion"), "html", null, true);
                echo ".</p>
\t                                ";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 3)) {
                // line 118
                echo "\t                                        <p class=\"text-error\">Haz envíado el ticket a la unidad equivocada por lo que fue reasignado a la unidad de ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "unidad"), "descripcion"), "html", null, true);
                echo ".</p>
\t                                ";
            } elseif (($this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "estatus") == 4)) {
                // line 120
                echo "\t                                        <p class=\"text-success\">Tu ticket fue cerrado el ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "fechasolucion"), "d-m-Y"), "html", null, true);
                echo " a las ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "horasolucion"), "G:i:s"), "html", null, true);
                echo " y la solucion fue la siguiente: \"<b>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tu"]) ? $context["tu"] : $this->getContext($context, "tu")), "solucion"), "html", null, true);
                echo "</b>\".</p>
\t                                ";
            }
            // line 122
            echo "\t                      \t\t</div>
\t                          \t<div class=\"modal-footer\">
\t                              \t<button class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
\t                          \t</div>
\t                        </div>
                        </div>
                    </div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo "\t\t\t</table>
\t\t\t</div>
\t\t</div>

\t</div>
  </div>
</div>
<br>
";
    }

    public function getTemplateName()
    {
        return "SitBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  338 => 130,  325 => 122,  315 => 120,  309 => 118,  303 => 116,  299 => 114,  297 => 113,  293 => 112,  282 => 104,  278 => 102,  272 => 100,  270 => 99,  266 => 98,  259 => 96,  255 => 95,  243 => 94,  237 => 93,  225 => 84,  221 => 83,  217 => 82,  213 => 81,  210 => 80,  204 => 79,  201 => 78,  198 => 77,  195 => 76,  192 => 75,  189 => 74,  186 => 73,  183 => 72,  180 => 71,  177 => 70,  172 => 69,  164 => 68,  154 => 60,  150 => 59,  146 => 58,  138 => 53,  131 => 49,  124 => 45,  117 => 41,  109 => 36,  105 => 35,  99 => 34,  96 => 33,  90 => 30,  86 => 29,  82 => 28,  78 => 27,  74 => 25,  72 => 24,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
