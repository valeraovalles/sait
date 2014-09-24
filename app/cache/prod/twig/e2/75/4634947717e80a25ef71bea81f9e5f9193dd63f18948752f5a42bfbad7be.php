<?php

/* SitBundle:Seguimiento:_infoticket.html.twig */
class __TwigTemplate_e2754634947717e80a25ef71bea81f9e5f9193dd63f18948752f5a42bfbad7be extends Twig_Template
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
        echo "<table cellpadding=\"0\" class=\"table table-bordered\" style=\"font-size: 12px;\">
        <tr>
            <th>Solicitud:</th>
            <td colspan=\"3\">";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solicitud"), "html", null, true);
        echo "</td>
        </tr>
        ";
        // line 6
        if (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "estatus") == 4)) {
            // line 7
            echo "            <tr>
                <th>Solución:</th>
                <td>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solucion"), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        // line 12
        echo "        <tr>
            <th>Solicitante:</th>
            <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solicitante"), "primernombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solicitante"), "primerapellido"), "html", null, true);
        echo "</td>
            <th>Extensión</th>
            <td>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solicitante"), "extension"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Fecha solicitud:</th>
            <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "fechasolicitud"), "d-m-Y"), "html", null, true);
        echo "</td>
            <th>Hora solicitud:</th>
            <td>";
        // line 22
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "horasolicitud"), "G:i:s"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Categoria: </th>
            <td>";
        // line 26
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "categoria"), "categoria")), "html", null, true);
        if (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "estatus") != 4)) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ticket_asignarcatsub", array("id" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "id"))), "html", null, true);
            echo "\"> <span class=\"icon-edit\"></span></a>";
        }
        echo "</td>
            <th>Subcategoria:</th>
            <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "subcategoria"), "subcategoria")), "html", null, true);
        echo "</td>
        </tr>
        ";
        // line 30
        if (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "estatus") == 4)) {
            // line 31
            echo "            <tr>
                <th>Fecha solución:</th>
                <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "fechasolucion"), "d-m-Y"), "html", null, true);
            echo "</td>
                <th>Hora solución:</th>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "horasolucion"), "G:i:s"), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        // line 38
        echo "            
        ";
        // line 39
        if ($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "archivo")) {
            // line 40
            echo "            <tr>
                <th>Archivo:</th>
                <td colspan=\"3\">
                    ";
            // line 43
            $context["extension"] = twig_split_filter($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "archivo"), ".");
            // line 44
            echo "
                    ";
            // line 45
            if ((((($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "jpg") || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "jpeg")) || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "png")) || ($this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array") == "gif"))) {
                // line 46
                echo "                        <a data-toggle=\"modal\" href=\"#myModal\">
                            <img id=\"im\" class=\"img-rounded\" src=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/sit/"), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "archivo"), "html", null, true);
                echo "\" width=\"50px\">
                        </a>
                    ";
            } else {
                // line 50
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/sit/"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "archivo"), "html", null, true);
                echo "\">DESCARGA ARCHIVO ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["extension"]) ? $context["extension"] : $this->getContext($context, "extension")), 1, array(), "array")), "html", null, true);
                echo "</a>
                    ";
            }
            // line 52
            echo "                </td>
            </tr>
        ";
        }
        // line 55
        echo "
        ";
        // line 56
        if (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "estatus") == 6)) {
            // line 57
            echo "          <tr>
          <th>Solución:</th><td >";
            // line 58
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solucion")), "html", null, true);
            echo "</td>
          <th>Fecha/Hora Sol.</th><td>";
            // line 59
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "fechasolucion"), "d-m-Y"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "horasolucion"), "G:i:s"), "html", null, true);
            echo "</td>


          </tr>
        ";
        }
        // line 64
        echo "
    </table>
";
    }

    public function getTemplateName()
    {
        return "SitBundle:Seguimiento:_infoticket.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 59,  153 => 58,  150 => 57,  148 => 56,  140 => 52,  130 => 50,  120 => 46,  118 => 45,  115 => 44,  113 => 43,  108 => 40,  106 => 39,  97 => 35,  92 => 33,  86 => 30,  81 => 28,  71 => 26,  64 => 22,  59 => 20,  52 => 16,  41 => 12,  35 => 9,  29 => 6,  24 => 4,  19 => 1,  236 => 89,  230 => 85,  223 => 82,  221 => 81,  218 => 80,  213 => 78,  208 => 77,  206 => 76,  200 => 72,  189 => 69,  181 => 68,  178 => 67,  170 => 65,  167 => 64,  165 => 63,  161 => 62,  156 => 60,  152 => 59,  149 => 58,  145 => 55,  131 => 45,  128 => 44,  125 => 43,  123 => 47,  119 => 40,  110 => 37,  107 => 36,  103 => 38,  100 => 34,  91 => 31,  88 => 31,  84 => 29,  77 => 27,  66 => 19,  63 => 18,  55 => 13,  51 => 12,  48 => 11,  45 => 14,  40 => 7,  37 => 6,  31 => 7,);
    }
}
