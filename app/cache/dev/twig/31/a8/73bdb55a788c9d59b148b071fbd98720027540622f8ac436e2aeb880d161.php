<?php

/* UsuarioBundle:User:index.html.twig */
class __TwigTemplate_31a873bdb55a788c9d59b148b071fbd98720027540622f8ac436e2aeb880d161 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::administracion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::administracion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Lista de usuarios";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    LISTA DE USUARIOS
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
  <li class=\"active\">LISTA DE USUARIOS</li>
</ol>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "
    ";
        // line 18
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <table id=\"tabladatatable\" class=\"table table-striped table-bordered\">
        <thead>
            <tr>
                <th style=\"width:100px;\">ID</th>
                <th>Username</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Dependencia</th>
                <th>Estatus</th>
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
            echo "            <tr>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</td>
                <td><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "username"), "html", null, true);
            echo "</a></td>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "primernombre"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "segundonombre"), "html", null, true);
            echo "</td>
                <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "primerapellido"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "segundoapellido"), "html", null, true);
            echo "</td>
                <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cedula"), "html", null, true);
            echo "</td>
                ";
            // line 41
            if ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "nivelorganizacional", array(), "any", false, true), "descripcion", array(), "any", true, true)) {
                // line 42
                echo "                <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nivelorganizacional"), "descripcion"), "html", null, true);
                echo "</td>
                ";
            } else {
                // line 44
                echo "                    <td>N/A</td>
                ";
            }
            // line 46
            echo "                <td>
                    ";
            // line 47
            if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "isActive") == 1)) {
                // line 48
                echo "                        Activo
                    ";
            } elseif (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "isActive") == null)) {
                // line 50
                echo "                        Inactivo
                    ";
            }
            // line 52
            echo "                </td>
                <td>
                        <a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-eye-open\"></a>
                        <a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-pencil\"></a>
           
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "        </tbody>
    </table>

    <br><br><br>

    <a class=\"btn btn-default\" href=\"";
        // line 65
        echo $this->env->getExtension('routing')->getPath("user_new");
        echo "\">NUEVO</a>

    <br><br>

    <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[0,'asc']],
            } );
        })
    </script>

";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:User:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 65,  161 => 60,  150 => 55,  146 => 54,  142 => 52,  138 => 50,  134 => 48,  132 => 47,  129 => 46,  125 => 44,  119 => 42,  117 => 41,  113 => 40,  107 => 39,  101 => 38,  95 => 37,  91 => 36,  88 => 35,  84 => 34,  65 => 18,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
