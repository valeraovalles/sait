<?php

/* TransporteBundle:Solicitudes:ajaxlistausuarios.html.twig */
class __TwigTemplate_ee6ec9cad861aa33cbbe450cd1f22fb02af6ef9257910f8da47e010a7c06c1e0 extends Twig_Template
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
        // line 3
        if (((isset($context["tipo"]) ? $context["tipo"] : $this->getContext($context, "tipo")) == "I")) {
            // line 4
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")));
            foreach ($context['_seq'] as $context["_key"] => $context["usu"]) {
                // line 5
                echo "        <div id=\"ajaxusuarios\" onclick=\"armarlista('";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "primerNombre"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "primerApellido"), "html", null, true);
                echo " C.I: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "cedula"), "html", null, true);
                echo " <span style=display:none>@";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "id"), "html", null, true);
                echo "-I@</span>')\" style=\"cursor:pointer;\">
        \t";
                // line 6
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "primerNombre"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "primerApellido"), "html", null, true);
                echo ",  C.I: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "cedula"), "html", null, true);
                echo "
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 11
        if (((isset($context["tipo"]) ? $context["tipo"] : $this->getContext($context, "tipo")) == "E")) {
            // line 12
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["usuarios"]) ? $context["usuarios"] : $this->getContext($context, "usuarios")));
            foreach ($context['_seq'] as $context["_key"] => $context["usu"]) {
                // line 13
                echo "        <div id=\"ajaxusuarios\" onclick=\"armarlista('";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "Nombre"), "html", null, true);
                echo " C.I: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "cedula"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "id"), "html", null, true);
                echo "-E')\" style=\"cursor:pointer;\">
        \t";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "Nombre"), "html", null, true);
                echo ", C.I: ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usu"]) ? $context["usu"] : $this->getContext($context, "usu")), "cedula"), "html", null, true);
                echo "'
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 18
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Solicitudes:ajaxlistausuarios.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 18,  70 => 14,  61 => 13,  56 => 12,  54 => 11,  40 => 6,  29 => 5,  24 => 4,  22 => 3,  19 => 1,);
    }
}
