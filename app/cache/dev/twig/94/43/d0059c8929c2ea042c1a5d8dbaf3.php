<?php

/* FrontendVisitasBundle:Usuario:busqueda.html.twig */
class __TwigTemplate_9443d0059c8929c2ea042c1a5d8dbaf3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'menu' => array($this, 'block_menu'),
            'body' => array($this, 'block_body'),
            'cedula' => array($this, 'block_cedula'),
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

    // line 4
    public function block_menu($context, array $blocks = array())
    {
        // line 5
        $this->env->loadTemplate("FrontendVisitasBundle:Default:menu.html.twig")->display($context);
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("body", $context, $blocks);
        echo "


    
    <div class=\"titulo\">Buscar Usuario</div>

    <form novalidate action=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("usuario_busqueda_control");
        echo "\" method=\"post\" 
    ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">

        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "


            <div id=\"operador\">
                <div class=\"form-contenedor\">
                    <div>";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cedula:</div>
                    <div class=\"widgets\" id=\"cedula\">";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'widget');
        echo "</div>
                </div>
            </div> 




       <button class=\"btn\" type=\"submit\">Busqueda</button> 
    </form>



";
        // line 36
        $this->displayBlock('cedula', $context, $blocks);
        // line 51
        echo "






 <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br>
    


    <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/distribucion/operador_new.js"), "html", null, true);
        echo "\"></script>

";
    }

    // line 36
    public function block_cedula($context, array $blocks = array())
    {
        // line 37
        echo "<script language=\"javascript\" type=\"text/javascript\">
var cedula = \$('#cedula').val();
\$.ajax(
{
type: \"POST\",
data: \"cedula=\"+cedula;,
url: \"encontrado\",
success: function(respuesta){
alert (respuesta);
}
}
    );
</script>
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
        return array (  119 => 37,  116 => 36,  109 => 62,  96 => 51,  94 => 36,  79 => 24,  74 => 22,  66 => 17,  60 => 15,  56 => 14,  47 => 8,  44 => 7,  40 => 5,  37 => 4,  31 => 3,);
    }
}
