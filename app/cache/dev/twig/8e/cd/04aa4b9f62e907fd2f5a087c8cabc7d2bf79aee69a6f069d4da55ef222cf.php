<?php

/* SitBundle:Ajax:listacorreo.html.twig */
class __TwigTemplate_8ecd04aa4b9f62e907fd2f5a087c8cabc7d2bf79aee69a6f069d4da55ef222cf extends Twig_Template
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
        echo "<div id=\"ajaxlistausuario\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")));
        foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
            // line 3
            echo "        <div id=\"ajaxusuarios\" onclick=\"armarlista('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : $this->getContext($context, "v")), "username"), "html", null, true);
            echo "@telesurtv.net')\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : $this->getContext($context, "v")), "username"), "html", null, true);
            echo "@telesurtv.net</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "SitBundle:Ajax:listacorreo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
