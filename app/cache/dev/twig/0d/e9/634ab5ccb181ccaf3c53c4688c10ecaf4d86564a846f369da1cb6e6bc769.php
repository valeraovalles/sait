<?php

/* SitBundle:Correo:asignado.html.twig */
class __TwigTemplate_0de9634ab5ccb181ccaf3c53c4688c10ecaf4d86564a846f369da1cb6e6bc769 extends Twig_Template
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
        echo "<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <style type=\"text/css\">
        \tth{
        \t\ttext-align: right;
        \t\tmargin-right: 20px;
        \t}

        \t.solicitud{
        \t\ttext-align: justify;
        \t}

        \ttable{
        \t\twidth: 600px;

        \t}

        \ttable td{
        \t\tpadding: 10px;
        \t\tborder:1px solid gray;
        \t}

        \ttable th{
        \t\tborder:1px solid gray;
        \t\tbackground-color: #d9edf7;
        \t\tpadding-right: 10px;
        \t\twidth: 25%;
        \t}
        </style>
    </head>

    <body>
    \t<div align=\"center\">
\t\t\t<div><h3>";
        // line 35
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "primernombre")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "primerapellido")), "html", null, true);
        echo " TIENES UN TICKET ASIGNADO</h3></div>

\t\t\t<table cellspacing=0>
\t\t\t\t<tr>
\t\t\t\t\t<th>Solicitante:</th>
\t\t\t\t\t<td>";
        // line 40
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solicitante")), "html", null, true);
        echo "</td>
\t\t\t\t</tr>

\t\t\t\t<tr>
\t\t\t\t\t<th>Extensión:</th>
\t\t\t\t\t<td>";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solicitante"), "extension"), "html", null, true);
        echo "</td>
\t\t\t\t</tr>

\t\t\t\t<tr>
\t\t\t\t\t<th>Solicitud:</th>
\t\t\t\t\t<td class=\"solicitud\">";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "solicitud"), "html", null, true);
        echo "</td>
\t\t\t\t</tr>

\t\t\t</table>
\t\t\t<br>
\t\t\t<div>GESTIONAR TICKETS <a href=\"http://aplicaciones.telesurtv.net/sait/web/app.php/sit/ticket\">AQUÍ</a></div>
\t\t</div>
\t</body>
\t
</html>";
    }

    public function getTemplateName()
    {
        return "SitBundle:Correo:asignado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 50,  73 => 45,  65 => 40,  55 => 35,  19 => 1,);
    }
}
