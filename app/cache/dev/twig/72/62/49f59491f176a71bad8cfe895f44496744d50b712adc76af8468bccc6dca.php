<?php

/* DistribucionBundle:Operador:lista.html.twig */
class __TwigTemplate_726249f59491f176a71bad8cfe895f44496744d50b712adc76af8468bccc6dca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::distribucion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::distribucion.html.twig";
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
        echo "    PAIS \"";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["pais"]) ? $context["pais"] : $this->getContext($context, "pais")), "pais")), "html", null, true);
        echo "\"<br>TIPO DE OPERADOR \"";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["top"]) ? $context["top"] : $this->getContext($context, "top")), "operador")), "html", null, true);
        echo "\"
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
  <li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("distribucion_homepage");
        echo "\">DISTRIBUCIÓN INICIO</a></li>
  <li class=\"active\">DISTRIBUCIÓN - LISTA</li>
</ol>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <table id=\"tabladatatable\" class=\"table table-striped table-bordered\">
        <thead>
            <tr>

                <th>Id</th>
                <th>Nombre</th>
                <th>País</th>
                <th>Tipo operador</th>
                <th>Estatus</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["operador"]) ? $context["operador"] : $this->getContext($context, "operador")));
        $context['_iterated'] = false;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 33
            echo "
               <tr ";
            // line 34
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                echo "style=\"background-color: #e9f5fe;\"";
            }
            echo ">
                <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pais"), "pais"), "html", null, true);
            echo "</td>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "operador"), "html", null, true);
            echo "</td>
                <td>";
            // line 39
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1)) {
                echo " Activo ";
            } else {
                echo " <div style=\"background-color:yellow;color:red;\">Inactivo<div> ";
            }
            echo "</td>
                <td>
                        <a href=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-eye-open\"></a>
         
                        ";
            // line 43
            if ($this->env->getExtension('security')->isGranted("ROLE_DISTRIBUCION_ADMINISTRADOR")) {
                // line 44
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-pencil\"></a>
                        ";
            }
            // line 46
            echo "                </td>
            </tr>


            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 51
            echo "
                <tr><td colspan=\"6\" style=\"text-align:center\">NO EXISTEN DATOS PARA MOSTRAR</td></tr>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "        </tbody>
    </table>

<br><br>
<br>
    <a class=\"btn btn-default\" href=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("distribucion_homepage");
        echo "\">IR AL MAPA</a> | 
    <a class=\"btn btn-default\" href=\"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("infooperadores");
        echo "\">IR AL RESUMEN</a>
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
        return "DistribucionBundle:Operador:lista.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 61,  185 => 60,  178 => 55,  169 => 51,  152 => 46,  146 => 44,  144 => 43,  139 => 41,  130 => 39,  126 => 38,  122 => 37,  118 => 36,  114 => 35,  108 => 34,  105 => 33,  87 => 32,  70 => 18,  67 => 17,  59 => 12,  55 => 11,  52 => 10,  49 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
