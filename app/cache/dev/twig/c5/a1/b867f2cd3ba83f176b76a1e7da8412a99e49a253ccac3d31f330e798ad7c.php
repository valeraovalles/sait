<?php

/* ProyectoBundle:Comentarioactividad:index.html.twig */
class __TwigTemplate_c5a1b867f2cd3ba83f176b76a1e7da8412a99e49a253ccac3d31f330e798ad7c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::proyecto.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "Comentario";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>LISTA DE COMENTARIOS</h1>
    <h4>Actividad: ";
        // line 7
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "descripcion")), "html", null, true);
        echo "</h4>
    
";
    }

    // line 11
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 12
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">PRINCIPAL TELESUR</a></li>
  <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("proyecto");
        echo "\">LISTA DE PROYECTOS</a></li>
  <li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tarea", array("idproyecto" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "proyecto"), "id"))), "html", null, true);
        echo "\">LISTA DE TAREAS</a></li>
  <li class=\"active\">COMENTARIO DE ACTIVIDAD</li>
</ol>
";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <table class=\"table table-striped\" style=\"width:60%;\">
        <thead>
            <tr class=\"bg-primary\">
                <th>ID</th>
                <th>Comentario</th>
                <th>De</th>
                <th>Fecha/Hora</th>
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
                <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comentario"), "html", null, true);
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "responsable"), "primerNombre")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "responsable"), "primerApellido")), "html", null, true);
            echo "</td>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechahora"), "d-m-Y G:i:s"), "html", null, true);
            echo "</td>
                ";
            // line 49
            echo "            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "        </tbody>
    </table>

    <a class=\"btn btn-default\" href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actividad", array("idtarea" => $this->getAttribute($this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "tarea"), "id"))), "html", null, true);
        echo "\">
        IR AL LISTADO DE ACTIVIDADES
    </a> | 
        
    <a class=\"btn btn-primary\" href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("comentarioactividad_new", array("idactividad" => $this->getAttribute((isset($context["act"]) ? $context["act"] : $this->getContext($context, "act")), "id"))), "html", null, true);
        echo "\">
        CREAR COMENTARIO
    </a><br><br>

    ";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Comentarioactividad:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 58,  127 => 54,  122 => 51,  115 => 49,  111 => 38,  105 => 37,  101 => 36,  97 => 35,  94 => 34,  90 => 33,  75 => 21,  72 => 20,  64 => 15,  60 => 14,  56 => 13,  53 => 12,  50 => 11,  43 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
