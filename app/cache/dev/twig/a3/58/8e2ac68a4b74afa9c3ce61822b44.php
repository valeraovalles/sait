<?php

/* FrontendVisitasBundle:Usuario:encontrado.html.twig */
class __TwigTemplate_a3588e2ac68a4b74afa9c3ce61822b44 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'camara' => array($this, 'block_camara'),
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
    
    <div class=\"titulo\">Registrar Usuario</div>



    <form novalidate action=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("usuario_busqueda");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">

        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "_token"), 'widget');
        echo "


            <div id=\"operador\">
                <div class=\"form-contenedor\">
                    <div>";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cedula:</div>
                    <div class=\"widgets\">";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombres"), 'errors');
        echo "</div>
                    <div class=\"labels\">Nombres:</div>
                    <div class=\"widgets\">";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombres"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "apellidos"), 'errors');
        echo "</div>
                    <div class=\"labels\">Apellidos:</div>
                    <div class=\"widgets\">";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "apellidos"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "fechaentrada"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fecha Entrada:</div>
                    <div class=\"widgets\">";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "fechaentrada"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "horaentrada"), 'errors');
        echo "</div>
                    <div class=\"labels\">Hora Entrada:</div>
                    <div class=\"widgets\">";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "horaentrada"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "contacto"), 'errors');
        echo "</div>
                    <div class=\"labels\">Contacto:</div>
                    <div class=\"widgets\">";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "contacto"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "observaciones"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observaciones:</div>
                    <div class=\"widgets\">";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "observaciones"), 'widget');
        echo "</div>
                </div>

            </div> 








            <div class=\"widgets\">";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombres"), 'widget');
        echo "</div>
                    <br>
                    <br>




            ";
        // line 77
        $this->displayBlock('camara', $context, $blocks);
        // line 91
        echo "






       <button class=\"btn\" type=\"submit\">Registrar</button> 
        <a class=\"btn\" href=\"";
        // line 99
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">Volver</a>

    </form>






    <script src=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/distribucion/operador_new.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 77
    public function block_camara($context, array $blocks = array())
    {
        // line 78
        echo "            <script> 
            function abrir(url) { 
            open(url,'','top=300,left=300,width=300,height=300') ; 
            } 
            </script> 

              <a class=\"btn btn-info\" href=\"javascript:abrir('/Nuevo/sait/web/libs/photobooth/index.html')\">
              <i class=\"icon-user icon-camera\"></i> FOTO </a><br><br>

            <br>
            <br>

            ";
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Usuario:encontrado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 78,  200 => 77,  194 => 108,  182 => 99,  172 => 91,  170 => 77,  160 => 70,  145 => 58,  140 => 56,  133 => 52,  128 => 50,  121 => 46,  116 => 44,  109 => 40,  104 => 38,  97 => 34,  92 => 32,  85 => 28,  80 => 26,  73 => 22,  68 => 20,  60 => 15,  56 => 14,  48 => 12,  39 => 6,  36 => 5,  30 => 3,);
    }
}
