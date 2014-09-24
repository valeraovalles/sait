<?php

/* ProyectoBundle:Correo:revisionactividad.html.twig */
class __TwigTemplate_4f150788436bddad56d21a0a3ba3720de1b798e18776b8a767af1880bdab0f0f extends Twig_Template
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
        echo "<div align=\"center\">
    <div style=\" font-size: 20px;font-weight: bold;width: 600px;border: 1px solid gray;padding: 5px;background-color: #DFF0D8;color:black;\">HAY UNA NUEVA ACTIVIDAD PARA REVISIÓN</div>
    <table style=\"width: 612px;border: 1px solid gray;\" cellpadding=\"5px\" class=\"tablacorreo\">
        <tr>
            <th align=\"right\" style=\"width: 40%\">Proyecto: </th>
            <td>";
        // line 6
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["actividad"]) ? $context["actividad"] : $this->getContext($context, "actividad")), "tarea"), "proyecto"), "nombre")), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th align=\"right\">Tarea: </th>
            <td>";
        // line 10
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["actividad"]) ? $context["actividad"] : $this->getContext($context, "actividad")), "tarea"), "nombre")), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th align=\"right\">Descripción actividad: </th>
            <td>";
        // line 14
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["actividad"]) ? $context["actividad"] : $this->getContext($context, "actividad")), "descripcion")), "html", null, true);
        echo "</td>
        </tr>
        
        <tr>
            <th align=\"right\">Responsable de actividad: </th>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["actividad"]) ? $context["actividad"] : $this->getContext($context, "actividad")), "responsable"), "primerNombre")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["actividad"]) ? $context["actividad"] : $this->getContext($context, "actividad")), "responsable"), "primerApellido")), "html", null, true);
        echo "</td>
        </tr>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "ProyectoBundle:Correo:revisionactividad.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 19,  40 => 14,  33 => 10,  26 => 6,  19 => 1,);
    }
}
