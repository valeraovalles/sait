<?php

/* ProyectoBundle:Documento:index.html.twig */
class __TwigTemplate_bc71ece55c6d5df62d927069038f3002ff4ca4deac7ea1797498df2fabc5cfd3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::proyecto.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::proyecto.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Proyecto - Documentos";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    DOCUMENTOS
";
    }

    // line 9
    public function block_titulo($context, array $blocks = array())
    {
        // line 10
        echo "    <h1>HISTORIAL DE DOCUMENTOS</h1>
";
    }

    // line 13
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 14
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">PRINCIPAL TELESUR</a></li>
  <li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("proyecto_homepage");
        echo "\">LISTA DE PROYECTOS</a></li>
  <li class=\"active\">DOCUMENTOS</li>
</ol>
";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        // line 22
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <table id=\"tablalista\" style=\"width: 97%;\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre del Documento</th>
                <th>Descripci&oacute;n</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 34
            echo "            <tr>
                <td><a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoproyecto_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalle de Documento\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</a></td>
                <td style=\"width:550px;\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "descripcion"), "html", null, true);
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "file"), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoproyecto_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalle de Documento\"><b class=\"glyphicon glyphicon-eye-open\"></b></a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "        </tbody>
    </table>
    <br><br><br>
    <a class=\"btn btn-default\" href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoproyecto_new", array("proyecto" => (isset($context["proyecto"]) ? $context["proyecto"] : $this->getContext($context, "proyecto")))), "html", null, true);
        echo "\">NUEVO DOCUMENTO</a> ||| <a class=\"btn btn-default\" href=\"";
        echo $this->env->getExtension('routing')->getPath("proyecto_homepage");
        echo "\">LISTA DE PROYECTOS</a><br><br>

    <script>
        \$(document).ready(function(){
            \$('#tablalista').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                 \"sPaginationType\": \"full_numbers\", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                 \"aaSorting\": [[0,'desc']],
             } );
         })
    </script>
    ";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Documento:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 46,  121 => 43,  111 => 39,  106 => 37,  102 => 36,  96 => 35,  93 => 34,  89 => 33,  75 => 22,  72 => 21,  64 => 16,  60 => 15,  57 => 14,  54 => 13,  49 => 10,  46 => 9,  41 => 6,  38 => 5,  32 => 3,);
    }
}
