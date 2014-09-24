<?php

/* SitBundle:Seguimiento:principal.html.twig */
class __TwigTemplate_ea344a809b9b3d71a1960445b992576a1f02ab9a178a3812debd751aeade1e5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::sit.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
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
        echo "Sit";
    }

    // line 6
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 7
        echo "    SEGUIMIENTO DE INCIDENCIAS
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
        echo "\">INICIO APLICACIONES</a></li>
  <li><a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("sit_homepage");
        echo "\">SIT INICIO</a></li>
  <li class=\"active\">SEGUIMIENTO DE TICKET</li>
</ol>
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <style>
        #im:hover{
            width: 200px;
        }
    </style>
    
    <div class=\"titulo\">TICKET ASIGNADO A<br>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "user"), 0, array(), "array"), "primerNombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "user"), 0, array(), "array"), "primerApellido"), "html", null, true);
        echo "</div>
  
    ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 30
            echo "        <div class=\"alert alert-success\">
            ";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "
    ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "alert"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 36
            echo "        <div class=\"alert alert-danger\">
            ";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "
    
    ";
        // line 42
        $this->env->loadTemplate("SitBundle:Seguimiento:_infoticket.html.twig")->display($context);
        // line 43
        echo "    ";
        $this->env->loadTemplate("SitBundle:Seguimiento:_enviocorreo.html.twig")->display($context);
        // line 44
        echo "    ";
        $this->env->loadTemplate("SitBundle:Seguimiento:_comentario.html.twig")->display($context);
        // line 45
        echo "
         <table id=\"tablalistaespecial\" class=\"table table-striped\" style=\"font-size: 12px;\">
              <thead>
                <tr>
                      <th>ID</th>
                      <th>FECHA</th>
                      <th style=\"width:45%;\">EVENTO</th>
                      <th>TIPO</th>
                      <th>REPONSABLE</th>
                </tr>
              </thead>
              <tbody>
                ";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["seguimiento"]) ? $context["seguimiento"] : $this->getContext($context, "seguimiento")));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 58
            echo "                    <tr>
                        <td>";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "id"), "html", null, true);
            echo "</td>
                        <td>";
            // line 60
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "fecha"), "d-m-Y G:i:s"), "html", null, true);
            echo "</td>
                        <td style=\"text-align: justify;\">
                              ";
            // line 62
            echo $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "evento");
            echo "
                              ";
            // line 63
            if (($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "archivo") != "")) {
                // line 64
                echo "                                  ";
                $context["ext"] = twig_split_filter($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "archivo"), ".");
                // line 65
                echo "                                      <a href=\"/sait/web/libs/scripts/forzardescarga.php?archivo=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "archivo"), "html", null, true);
                echo "&ruta=../../uploads/sit/\"><img width=\"80px\" class=\"img-rounded\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/descarga.png"), "html", null, true);
                echo "\"></a>
                              ";
            }
            // line 67
            echo "                        </td>
                        <td>";
            // line 68
            if (($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "tipo") == "e")) {
                echo "<span class=\"label label-info\">Email</span>";
            } elseif (($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "tipo") == "c")) {
                echo "<span class=\"label label-success\">Comentario</span>";
            }
            echo "</td>
                        <td>";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "responsable"), "primerNombre"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "responsable"), "primerApellido"), "html", null, true);
            echo "</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "              </tbody>
          </table>

    <br><br><br><br>
    ";
        // line 76
        if (($this->env->getExtension('security')->isGranted("ROLE_SIT_ADMINISTRADOR") && ((isset($context["unidadc"]) ? $context["unidadc"] : $this->getContext($context, "unidadc")) == 1))) {
            // line 77
            echo "      <a href=\"";
            echo $this->env->getExtension('routing')->getPath("ticket");
            echo "\" class=\"btn btn-default\">IR AL LISTADO</a> |
      <a href=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ticket_show", array("id" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-default\">IR A GESTION</a>  
    ";
        }
        // line 80
        echo "
    ";
        // line 81
        if (($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "estatus") == 2)) {
            // line 82
            echo "      ";
            if (($this->env->getExtension('security')->isGranted("ROLE_SIT_ADMINISTRADOR") && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "user"), 0, array(), "array"), "id") == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id")))) {
                echo "| 
        <a href=\"#\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#correo\">ENVIAR CORREO</a> | 
      ";
            }
            // line 85
            echo "
      <a href=\"#\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#comentario\">REALIZAR UN COMENTARIO</a>

    ";
        }
        // line 89
        echo "    <br>
    
    <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('#tablalistaespecial').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[0,'desc'],[1,'desc'],[2,'desc']],
            } );
        })
    </script>
    <br><br>
";
    }

    public function getTemplateName()
    {
        return "SitBundle:Seguimiento:principal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 89,  230 => 85,  223 => 82,  221 => 81,  218 => 80,  213 => 78,  208 => 77,  206 => 76,  200 => 72,  189 => 69,  181 => 68,  178 => 67,  170 => 65,  167 => 64,  165 => 63,  161 => 62,  156 => 60,  152 => 59,  149 => 58,  145 => 57,  131 => 45,  128 => 44,  125 => 43,  123 => 42,  119 => 40,  110 => 37,  107 => 36,  103 => 35,  100 => 34,  91 => 31,  88 => 30,  84 => 29,  77 => 27,  66 => 19,  63 => 18,  55 => 13,  51 => 12,  48 => 11,  45 => 10,  40 => 7,  37 => 6,  31 => 3,);
    }
}
