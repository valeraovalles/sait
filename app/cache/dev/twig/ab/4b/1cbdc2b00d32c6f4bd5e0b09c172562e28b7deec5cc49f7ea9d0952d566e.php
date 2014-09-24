<?php

/* UsuarioBundle:Personal:index.html.twig */
class __TwigTemplate_ab4b1cbdc2b00d32c6f4bd5e0b09c172562e28b7deec5cc49f7ea9d0952d566e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::telesur.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::telesur.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Personal";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    PERSONAL TELESUR
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
  <li class=\"active\">PERSONAL TELESUR</li>
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
    \t<thead>
\t    \t<tr>
\t\t    \t<th>NOMBRE</th>
\t\t    \t<th>APELLIDO</th>
\t\t    \t<th>EXTENSIÓN</th>
\t\t    \t<th style=\"width:30%;\">DEPENDENCIA</th>
\t\t    \t<th>USUARIO</th>
\t\t    \t<th title=\"CORREO INSTITUCIONAL\">CORREO INST.</th>
\t    \t</tr>
\t    </thead>
\t    <tbody>
\t    \t";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["perfil"]) ? $context["perfil"] : $this->getContext($context, "perfil")));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 33
            echo "\t    \t\t<tr>
\t    \t\t\t<td>";
            // line 34
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "primerNombre")), "html", null, true);
            echo "</td>
\t    \t\t\t<td>";
            // line 35
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "primerApellido")), "html", null, true);
            echo "</td>
\t    \t\t\t<td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "Extension"), "html", null, true);
            echo "</td>
\t    \t\t\t<td>
\t    \t\t\t\t";
            // line 38
            if (($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "nivelorganizacional") != null)) {
                // line 39
                echo "\t    \t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "nivelorganizacional"), "descripcion"), "html", null, true);
                echo "
\t    \t\t\t\t";
            } else {
                // line 41
                echo "\t    \t\t\t\t\tN/A
\t    \t\t\t\t";
            }
            // line 43
            echo "\t    \t\t\t</td>
\t    \t\t\t<td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "user"), "username"), "html", null, true);
            if (($this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "user"), "password") == null)) {
                echo "@telesurtv.net";
            }
            echo "</td>
\t    \t\t\t<td>
\t    \t\t\t\t";
            // line 46
            if (($this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "user"), "password") == null)) {
                // line 47
                echo "\t    \t\t\t\t\tSÍ
\t    \t\t\t\t";
            } else {
                // line 49
                echo "\t    \t\t\t\t\tNO
\t    \t\t\t\t";
            }
            // line 51
            echo "\t    \t\t\t</td>
\t    \t\t</tr>
\t    \t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "    \t</tbody>
    </table>

    <br><br><br><a class=\"btn btn-default\" href=\"";
        // line 57
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">VOLVER</a>

    <script type=\"text/javascript\">
        \$(document).ready(function(){
           \$('#tabladatatable').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                \"aaSorting\": [[0,'asc'],[1,'asc']],
            } );
        })
    </script>
    <br><br>
";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:Personal:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 57,  143 => 54,  135 => 51,  131 => 49,  127 => 47,  125 => 46,  117 => 44,  114 => 43,  110 => 41,  104 => 39,  102 => 38,  97 => 36,  93 => 35,  89 => 34,  86 => 33,  82 => 32,  65 => 18,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
