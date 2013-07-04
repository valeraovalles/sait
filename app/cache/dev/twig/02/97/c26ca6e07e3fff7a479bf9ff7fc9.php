<?php

/* DistribucionBundle:Tipooperador:new.html.twig */
class __TwigTemplate_0297c26ca6e07e3fff7a479bf9ff7fc9 extends Twig_Template
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
        echo "    TIPO DE OPERADOR - NUEVO
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <div class=\"titulo\">CREAR OPERADOR</div>

    <form novalidate class=\"formNewEditOperador\"  action=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("tipooperador_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">
        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "

        <fieldset>
        <legend id=\"a\"><div class=\"divisor\">DATOS DE OPERADOR</div></legend>

        <div class=\"form-contenedor\">
            <div>";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "operador"), 'errors');
        echo "</div>
            <div class=\"labels\">Tipo:</div>
            <div class=\"widgets\">";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "operador"), 'widget');
        echo "</div>
        </div>

        <div class=\"form-contenedor\">
            <div>";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "codigo"), 'errors');
        echo "</div>
            <div class=\"labels\">Código:</div>
            <div class=\"widgets\">";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "codigo"), 'widget');
        echo "</div>
        </div>
        </fieldset>
        <br>
        <button class=\"btn\" type=\"submit\">Crear</button> | 
        <a class=\"btn\" href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("tipooperador");
        echo "\">Ir a lista</a>

    </form>

    

    <br><br>
";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Tipooperador:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 36,  87 => 31,  82 => 29,  75 => 25,  70 => 23,  61 => 17,  54 => 16,  47 => 12,  44 => 11,  39 => 7,  36 => 6,  30 => 3,);
    }
}
