<?php

/* LicenciasBundle:Licencias:index.html.twig */
class __TwigTemplate_4e3e90b1c107d06b56f55ac751563f8caa453cc0330c8cf826d6caeee994bc92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::licencias.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::licencias.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Lista";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    LISTA DE LICENCIAS
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
  <li class=\"active\">LICENCIAS INICIO</li>

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
                <th width=\"5%\">Codigo</th>
                <th width=\"25%\">Nombre</th>
                <th width=\"17%\">Fecha de Compra</th>
                <th width=\"20%\">Fecha de Vencimiento</th>
                <th>STATUS</th>
                <th>Acciones</th>
            </tr> 
        </thead>
        <tbody>

            ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 35
            echo "                <tr>
                    <td align=\"center\"><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "retorno" => (isset($context["retorno"]) ? $context["retorno"] : $this->getContext($context, "retorno")))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "codigo"), "html", null, true);
            echo "</a></td>
                    <td align=\"center\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
            echo "</td>
                    <td align=\"center\">";
            // line 38
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaCompra")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaCompra"), "Y-m-d"), "html", null, true);
            }
            echo "</td>
                    <td align=\"center\">";
            // line 39
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaVencimiento")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaVencimiento"), "Y-m-d"), "html", null, true);
            }
            echo "</td>
                    ";
            // line 40
            if (((twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaVencimiento"), "Y-m-d") > (isset($context["hoy"]) ? $context["hoy"] : $this->getContext($context, "hoy"))) && (twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaVencimiento"), "Y-m-d") > (isset($context["mes"]) ? $context["mes"] : $this->getContext($context, "mes"))))) {
                // line 41
                echo "                    
                            <td align=\"center\"style=\"color:#00cc00;\"> ACTIVO </td>
                    
                    ";
            } elseif (((twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaVencimiento"), "Y-m-d") >= (isset($context["hoy"]) ? $context["hoy"] : $this->getContext($context, "hoy"))) && (twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaVencimiento"), "Y-m-d") <= (isset($context["mes"]) ? $context["mes"] : $this->getContext($context, "mes"))))) {
                // line 46
                echo "                    
                        <td align=\"center\" style=\"color:#ff8000;\"> POR VENCER </td>
                    
                    ";
            } elseif ((twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaVencimiento"), "Y-m-d") < (isset($context["hoy"]) ? $context["hoy"] : $this->getContext($context, "hoy")))) {
                // line 50
                echo "                    
                        <td  align=\"center\" style=\"color:red;\"> VENCIDO </td>
                    
                    ";
            }
            // line 54
            echo "                    <td>
                           <a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "retorno" => (isset($context["retorno"]) ? $context["retorno"] : $this->getContext($context, "retorno")))), "html", null, true);
            echo "\"><img width=\"15px\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/lupa.png"), "html", null, true);
            echo "\"></a>
                        
                        ";
            // line 57
            if (((isset($context["rol"]) ? $context["rol"] : $this->getContext($context, "rol")) == 1)) {
                echo " 
                            <a href=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "retorno" => (isset($context["retorno"]) ? $context["retorno"] : $this->getContext($context, "retorno")))), "html", null, true);
                echo "\"><img width=\"15px\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/edit.png"), "html", null, true);
                echo "\"></a>
                            <a onclick=\"return confirm('Desea borrar')\" href=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "retorno" => (isset($context["retorno"]) ? $context["retorno"] : $this->getContext($context, "retorno")))), "html", null, true);
                echo "\"><img width=\"15px\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/mal.png"), "html", null, true);
                echo "\"></a>
                        ";
            }
            // line 60
            echo " 
                   </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "        </tbody>
    </table>
<br><br><br><br>
        <a href=\"";
        // line 67
        echo $this->env->getExtension('routing')->getPath("reporte_total");
        echo "\"><img width=\"40px\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/pdf.jpg"), "html", null, true);
        echo "\"></a> &nbsp;
    <br><br>

        <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[0,'asc'],[1,'asc']],
            } );
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "LicenciasBundle:Licencias:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 67,  166 => 64,  157 => 60,  150 => 59,  144 => 58,  140 => 57,  133 => 55,  130 => 54,  124 => 50,  118 => 46,  112 => 41,  110 => 40,  104 => 39,  98 => 38,  94 => 37,  88 => 36,  85 => 35,  81 => 34,  63 => 19,  60 => 18,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
