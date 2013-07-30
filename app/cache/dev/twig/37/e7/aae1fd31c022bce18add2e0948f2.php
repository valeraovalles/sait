<?php

/* LicenciasBundle:Licencias:new.html.twig */
class __TwigTemplate_37e7aae1fd31c022bce18add2e0948f2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::licencias.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::licencias.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Licencia - Nueva";
    }

    // line 4
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 5
        echo "    LICENCIAS
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <div class=\"titulo\">NUEVA LICENCIA</div>
    <div class=\"form-show\"><br>
    <form novalidate action=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("licencias_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">
        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "

            <div class=\"form-contenedor\">
                ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombre"), 'errors');
        echo "
                <div class=\"labels\">Nombre:</div>
                <div class=\"widgets\">";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombre"), 'widget');
        echo "</div>
            </div>
            <div class=\"form-contenedor\">
                ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "fechaCompra"), 'errors');
        echo "
                <div class=\"labels\">Fecha de Compra:</div>
                <div class=\"widgets\">";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "fechaCompra"), 'widget');
        echo "</div>
            </div>
            <div class=\"form-contenedor\">
                ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "fechaVencimiento"), 'errors');
        echo "
                <div class=\"labels\">Fecha de Vencimiento:</div>
                <div class=\"widgets\">";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "fechaVencimiento"), 'widget');
        echo "</div>
            </div>
            <div class=\"form-contenedor\">
                ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "descripcion"), 'errors');
        echo "
                <div class=\"labels\">Descripcion:</div>
                <div class=\"widgets\">";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "descripcion"), 'widget');
        echo "</div>
            </div>
            <div class=\"form-contenedor\">
                ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tipo"), 'errors');
        echo "
                <div class=\"labels\">Tipo de Licencia:</div>
                <div class=\"widgets\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tipo"), 'widget');
        echo "</div>
            </div>
            <div class=\"form-contenedor\">
                ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "codigo"), 'errors');
        echo "
                <div class=\"labels\">Codigo:</div>
                <div class=\"widgets\">";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "codigo"), 'widget');
        echo "</div>
            </div>
        <p>
            <button class=\"btn\" type=\"submit\">Crear</button>
        </p>
    </form>
</div><br><br>
";
    }

    public function getTemplateName()
    {
        return "LicenciasBundle:Licencias:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 44,  121 => 42,  115 => 39,  110 => 37,  104 => 34,  99 => 32,  93 => 29,  88 => 27,  82 => 24,  77 => 22,  71 => 19,  66 => 17,  60 => 14,  53 => 13,  47 => 10,  44 => 9,  39 => 5,  36 => 4,  30 => 2,);
    }
}
