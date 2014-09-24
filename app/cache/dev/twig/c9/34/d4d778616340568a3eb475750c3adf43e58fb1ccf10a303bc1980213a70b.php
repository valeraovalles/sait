<?php

/* DistribucionBundle:Operador:paisestadociudad.html.twig */
class __TwigTemplate_c934d4d778616340568a3eb475750c3adf43e58fb1ccf10a303bc1980213a70b extends Twig_Template
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
        if (((isset($context["mostrar"]) ? $context["mostrar"] : $this->getContext($context, "mostrar")) == "estado")) {
            // line 2
            echo "\t<div class=\"widgetform\">";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "estado"), 'widget');
            echo "</div>
\t\t<script>
        \$(\"#frontend_distribucionbundle_representantetype_telefono1\").val(";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pais"]) ? $context["pais"] : $this->getContext($context, "pais")), "codigo"), "html", null, true);
            echo ");
\t</script>\t
";
        }
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Operador:paisestadociudad.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  21 => 2,  19 => 1,);
    }
}
