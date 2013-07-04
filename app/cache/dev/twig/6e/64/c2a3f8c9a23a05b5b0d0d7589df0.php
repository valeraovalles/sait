<?php

/* DistribucionBundle:Objetocomodato:new.html.twig */
class __TwigTemplate_6e64c2a3f8c9a23a05b5b0d0d7589df0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::distribucion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::distribucion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Distribucion";
    }

    // line 6
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 7
        echo "    OBJETO DE COMODATO- NUEVO
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <div class=\"titulo\">CREAR OBJETO DE COMODATO</div>
    <form novalidate class=\"formNewEditOperador\" action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("objetocomodato_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "

        <fieldset>
            <legend id=\"a\"><div class=\"divisor\">DATOS DE OBJETO DE COMODATO</div></legend>

            <div class=\"form-contenedor\">
                <div>";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "objeto"), 'errors');
        echo "</div>
                <div class=\"labels\">Objeto:</div>
                <div class=\"widgets\">";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "objeto"), 'widget');
        echo "</div>
            </div>

        </fieldset>
        <br>
        <button class=\"btn\" type=\"submit\">Crear</button> | 

        <a class=\"btn\" href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("objetocomodato");
        echo "\">
            Ir a la lista
        </a>

    </form>

";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Objetocomodato:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 31,  74 => 24,  69 => 22,  60 => 16,  53 => 15,  47 => 12,  44 => 11,  39 => 7,  36 => 6,  30 => 3,);
    }
}
