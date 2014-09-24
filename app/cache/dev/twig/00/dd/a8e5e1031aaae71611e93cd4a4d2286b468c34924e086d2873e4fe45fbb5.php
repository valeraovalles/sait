<?php

/* FrontendVisitasBundle:Usuario:index.html.twig */
class __TwigTemplate_00dda8e5e1031aaae71611e93cd4a4d2286b468c34924e086d2873e4fe45fbb5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::visita.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::visita.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Lista";
    }

    // line 6
    public function block_titulo($context, array $blocks = array())
    {
        // line 7
        echo "    LISTA DE VISITANTES
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
        echo "\">INICIO</a></li>
  <li class=\"active\">VISITAS INICIO</li>

</ol>
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <table id=\"tabladatatable\">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Fecha Entrada</th>
                <th>Hora Entrada</th>
                <th>Fecha Salida</th>
                <th>Hora Salida</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
        ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 37
            echo "            <tr>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "usuario"), "cedula"), "html", null, true);
            echo "</td>
            <!--    <td><a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_show_control", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "usuario"), "id"), "html", null, true);
            echo "</a></td> -->
                <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "usuario"), "nombres"), "html", null, true);
            echo "</td>
                <td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "usuario"), "apellidos"), "html", null, true);
            echo "</td>
                <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaentrada"), "Y-m-d"), "html", null, true);
            echo "</td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horaentrada"), "H:i:s"), "html", null, true);
            echo "</td>
                ";
            // line 44
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechasalida") && $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horasalida"))) {
                // line 45
                echo "                    <td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechasalida"), "Y-m-d"), "html", null, true);
                echo "</td>
                    <td>";
                // line 46
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horasalida"), "H:i:s"), "html", null, true);
                echo "</td>
                ";
            } else {
                // line 48
                echo "                    <td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechasalida"), "html", null, true);
                echo "</td>
                    <td>";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "horasalida"), "html", null, true);
                echo "</td>
                ";
            }
            // line 51
            echo "                <td>
                <ul>
                    <li>

                        <a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_show_control", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Consultar\"><span class=\"glyphicon glyphicon-eye-open\"></a>
                        
                        ";
            // line 58
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usu", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "usuario"), "id"))), "html", null, true);
            echo "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Nueva Visita\"><span class=\"glyphicon glyphicon-user\"></a>
                        ";
            // line 59
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechasalida") == "")) {
                // line 60
                echo "                        <a onclick=\"return confirm('¿Esta seguro que desea procesar la salida?')\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("salida", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Salida\"><span class=\"glyphicon glyphicon-eject\"></a>
                        ";
            }
            // line 62
            echo "
                    </li>
                </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "
        </tbody>
    </table>                   
    <br><br><br>
    <!--a href=\"";
        // line 72
        echo $this->env->getExtension('routing')->getPath("reporteinfo");
        echo "\" class=\"btn btn-info\"><i class=\"icon-user icon-print\"></i> Generar Reporte </a-->
<a class=\"btn btn-primary\" href='";
        // line 73
        echo $this->env->getExtension('routing')->getPath("usuario_busqueda_control");
        echo "'><span>REGISTRAR VISITA</span></a>
<br><br>

        <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[5,'asc'],[3,'desc'],[4,'desc']],
            } );
        })
    </script>


    ";
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Usuario:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 73,  179 => 72,  173 => 68,  162 => 62,  156 => 60,  154 => 59,  149 => 58,  144 => 55,  138 => 51,  133 => 49,  128 => 48,  123 => 46,  118 => 45,  116 => 44,  112 => 43,  108 => 42,  104 => 41,  100 => 40,  94 => 39,  90 => 38,  87 => 37,  83 => 36,  63 => 19,  60 => 18,  51 => 12,  48 => 11,  45 => 10,  40 => 7,  37 => 6,  31 => 4,);
    }
}
