<?php

/* SitBundle:Correo:solicitud.html.twig */
class __TwigTemplate_4f6537b81b4c0a545e0db0d706c31fe8ef571962afc2290ac51bc3864214d6e7 extends Twig_Template
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
\t\t\t<div><h3>NUEVO TICKET</h3></div>

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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "extension"), "html", null, true);
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
        return "SitBundle:Correo:solicitud.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 50,  68 => 45,  60 => 40,  19 => 1,);
    }
}
