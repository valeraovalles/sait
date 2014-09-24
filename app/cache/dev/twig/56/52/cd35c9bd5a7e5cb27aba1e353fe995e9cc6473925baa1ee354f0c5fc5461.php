<?php

/* TransporteBundle:Solicitudes:ajaxapruebarechaza.html.twig */
class __TwigTemplate_5652cd35c9bd5a7e5cb27aba1e353fe995e9cc6473925baa1ee354f0c5fc5461 extends Twig_Template
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
        echo "<div class=\"contenedorform\" id=\"muestra\"a>
    <div class=\"labelform\" style=\"width:35%;\">Justificaci&oacute;n:</div>
    <div class=\"widgetform\">";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "justificacion"), 'widget', array("attr" => array("style" => "width:100%;height:100px;")));
        echo "</div>
</div>
";
        // line 5
        if (((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")) == "AP")) {
            // line 6
            echo "    <BR><button class=\"btn btn-primary\" type=\"submit\">APROBAR SOLICITUD</button>
";
        } else {
            // line 8
            echo "    <BR><button class=\"btn btn-primary\" type=\"submit\">RECHAZAR SOLICITUD</button>
";
        }
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Solicitudes:ajaxapruebarechaza.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  30 => 6,  28 => 5,  23 => 3,  19 => 1,);
    }
}
