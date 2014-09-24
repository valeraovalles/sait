<?php

/* NominaBundle:Default:formalimentacion.html.twig */
class __TwigTemplate_0c8eabe5eac0da8ab76f1a465a36ed546fee421c1f64d7f6138758679f9932f7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::nomina.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::nomina.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Nomina - Telesur";
    }

    // line 6
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 7
        echo "    TXT ALIMENTACION
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <div class=\"titulo\">INGRESE LOS PARÁMETROS</div>

    ";
        // line 16
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "started")) {
            // line 17
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 18
                echo "            <div class=\"Redflash-notice\">
                ";
                // line 19
                echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "    ";
        }
        // line 23
        echo "
    <form class=\"formNewEditOperador\" novalidate action=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("nomina_txtalimentacion");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">

        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "

                <div class=\"form-contenedor\">
                    ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tiponomina"), 'errors');
        echo "
                    <div class=\"labels\">Tipo nómina:</div>
                    <div class=\"widgets\">";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tiponomina"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "anio"), 'errors');
        echo "
                    <div class=\"labels\">Año:</div>
                    <div class=\"widgets\">";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "anio"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "mes"), 'errors');
        echo "
                    <div class=\"labels\">Mes:</div>
                    <div class=\"widgets\">";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "mes"), 'widget');
        echo "</div>
                </div>

                <input type=\"submit\">
    </form>

    
";
    }

    public function getTemplateName()
    {
        return "NominaBundle:Default:formalimentacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 43,  116 => 41,  109 => 37,  104 => 35,  97 => 31,  92 => 29,  86 => 26,  79 => 24,  76 => 23,  73 => 22,  64 => 19,  61 => 18,  56 => 17,  54 => 16,  47 => 12,  44 => 11,  39 => 7,  36 => 6,  30 => 3,);
    }
}
