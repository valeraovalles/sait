<?php

/* TransporteBundle:Correo:solicitud_transporte.html.twig */
class __TwigTemplate_64d119b2759683c1fa916c0e449bc85c780db0dc7b9a632e78fc8b2503ac87b8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <style type=\"text/css\">
            th{
                text-align: right;
                margin-right: 20px;
            }

            .solicitud{
                text-align: justify;
            }

            table{
                width: 600px;

            }

            table td{
                padding: 10px;
                border:1px solid gray;
            }

            table th{
                border:1px solid gray;
                background-color: #d9edf7;
                padding-right: 10px;
                width: 25%;
            }
        </style>
    </head>

    <body>
    \t<div align=\"center\">
            ";
        // line 35
        if (((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")) == "N")) {
            // line 36
            echo "                <div><h3>NUEVA SOLICITUD DE TRANSPORTE</h3></div>            
                <h3 align=\"center\">Se ha generado una nueva solicitud de Transporte, bajo los siguientes datos:</h3>
            ";
        } elseif (((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")) == "AP")) {
            // line 39
            echo "                <div><h3>SOLICITUD DE TRANSPORTE APROBADA</h3></div>            
                <h3 align=\"center\">Le fue aprobada la siguiente solicitud de Transporte:</h3>
            ";
        } elseif (((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")) == "R")) {
            // line 42
            echo "                <div><h3>SOLICITUD DE TRANSPORTE RECHAZADA</h3></div>            
                <h3 align=\"center\">Le fue rechazada la siguiente solicitud de Transporte:</h3>
            ";
        }
        // line 45
        echo "
\t\t\t<table cellspacing=0>
\t\t\t\t<tr>
\t\t\t\t\t<th>Solicitante:</th>
\t\t\t\t\t<td>";
        // line 49
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["perfil"]) ? $context["perfil"] : $this->getContext($context, "perfil")), "primerNombre")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["perfil"]) ? $context["perfil"] : $this->getContext($context, "perfil")), "primerApellido")), "html", null, true);
        echo "</td>
\t\t\t\t</tr>
           \t    <tr>
\t\t\t\t\t<th>Motivo de Solicitud:</th>
\t\t\t\t\t<td>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["solicitud"]) ? $context["solicitud"] : $this->getContext($context, "solicitud")), "datosInteresRazon"), "html", null, true);
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<th>Fecha de Salida:</th>
\t\t\t\t\t<td>";
        // line 57
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["solicitud"]) ? $context["solicitud"] : $this->getContext($context, "solicitud")), "fechaSalida"), "d-m-Y"), "html", null, true);
        echo "</td>
\t\t\t\t</tr>
                <tr>
                    <th>Hora de Salida:</th>
                    <td>";
        // line 61
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["solicitud"]) ? $context["solicitud"] : $this->getContext($context, "solicitud")), "horaSalida"), "G:i:s"), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Desde:</th>
                    <td>";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["solicitud"]) ? $context["solicitud"] : $this->getContext($context, "solicitud")), "direccionDesde"), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Hasta:</th>
                    <td>";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["solicitud"]) ? $context["solicitud"] : $this->getContext($context, "solicitud")), "direccionHasta"), "html", null, true);
        echo "</td>
                </tr>
                
                <tr>
                    <th>Estatus:</th>
                    ";
        // line 74
        if (((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")) == "N")) {
            // line 75
            echo "                        <td>Nueva</td>
                    ";
        } elseif (((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")) == "AP")) {
            // line 77
            echo "                        <td>Aprobada</td>
                    ";
        } elseif (((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")) == "R")) {
            // line 79
            echo "                        <td>Rechazada</td>
                    ";
        }
        // line 81
        echo "                </tr>
\t\t\t</table>
\t\t</div>
        <p align=\"center\">
            <i><b>NOTA:</b> Para una mayor información consulte el módulo de Transporte del Sistema de Aplicaciones Internas.</i>
        </p>


\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Correo:solicitud_transporte.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 81,  133 => 79,  129 => 77,  125 => 75,  123 => 74,  115 => 69,  108 => 65,  101 => 61,  94 => 57,  87 => 53,  78 => 49,  72 => 45,  67 => 42,  62 => 39,  57 => 36,  55 => 35,  19 => 1,);
    }
}
