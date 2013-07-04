<?php

/* FrontendVisitasBundle:Usuario:busqueda.html.twig */
class __TwigTemplate_2faf2e36f1a6b4e9ba7be4c4082531d5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Control Visitas";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <div class=\"titulo\">Buscar Usuario</div>

    <form novalidate action=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("usuario_busqueda");
        echo "\" method=\"post\" 
    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">

        ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "


            <div id=\"operador\">
                <div class=\"form-contenedor\">
                    <div>";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cedula:</div>
                    <div class=\"widgets\">";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'widget');
        echo "</div>
                </div>
            </div> 

<div class=\"widgets\">";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombres"), 'widget');
        echo "</div>

<div class=\"widgets\">";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "apellidos"), 'widget');
        echo "</div>


       
       <button class=\"btn\" type=\"submit\">Busqueda</button> 
    </form>


 <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br>
    


    <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/distribucion/operador_new.js"), "html", null, true);
        echo "\"></script>

";
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Usuario:busqueda.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 38,  80 => 26,  75 => 24,  68 => 20,  63 => 18,  55 => 13,  49 => 11,  45 => 10,  38 => 6,  35 => 5,  29 => 3,);
    }
}
