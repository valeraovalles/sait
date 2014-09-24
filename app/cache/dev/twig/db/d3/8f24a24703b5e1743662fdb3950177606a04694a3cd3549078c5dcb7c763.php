<?php

/* DistribucionBundle:Operador:index.html.twig */
class __TwigTemplate_dbd38f24a24703b5e1743662fdb3950177606a04694a3cd3549078c5dcb7c763 extends Twig_Template
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
        echo "Distribución";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    LISTA DE OPERADORES
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
  <li class=\"active\">LISTA DE OPERADORES</li>
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
        $context['_seq'] = twig_ensure_traversable((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 33
            echo "            <tr>
                <td>";
            // line 34
            echo $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id");
            echo "</td>
                <td style=\"width:400px;\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pais"), "pais"), "html", null, true);
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "operador"), "html", null, true);
            echo "</td>
                <td align='center'>";
            // line 38
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1)) {
                echo " Activo ";
            } else {
                echo " <div style=\"background-color:yellow;color:red;\">Inactivo<div> ";
            }
            echo "</td>
                <td>
                        <a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-eye-open\"></a>
         
                        ";
            // line 42
            if ($this->env->getExtension('security')->isGranted("ROLE_DISTRIBUCION_ADMINISTRADOR")) {
                // line 43
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-pencil\"></a>
                        ";
            }
            // line 45
            echo "                </td>
            </tr>


            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 50
            echo "
                <tr><td colspan=\"6\" style=\"text-align:center\">NO EXISTEN DATOS PARA MOSTRAR</td></tr>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "        </tbody>
    </table>

    <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[0,'asc'],[1,'asc']],
            } );
        })
    </script>

        <br><br><br><br>
        ";
        // line 67
        if ($this->env->getExtension('security')->isGranted("ROLE_DISTRIBUCION_ADMINISTRADOR")) {
            // line 68
            echo "            <a class=\"btn btn-default\" href=\"";
            echo $this->env->getExtension('routing')->getPath("operador_new");
            echo "\">NUEVO OPERADOR</a>
        <br><br>
        ";
        }
        // line 71
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Operador:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 71,  164 => 68,  162 => 67,  147 => 54,  138 => 50,  129 => 45,  123 => 43,  121 => 42,  116 => 40,  107 => 38,  103 => 37,  99 => 36,  95 => 35,  91 => 34,  88 => 33,  83 => 32,  66 => 18,  63 => 17,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
