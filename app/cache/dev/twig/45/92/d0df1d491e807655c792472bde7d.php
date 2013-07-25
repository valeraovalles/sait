<?php

/* FrontendVisitasBundle:Usuario:encontrado.html.twig */
class __TwigTemplate_4592d0df1d491e807655c792472bde7d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'menu' => array($this, 'block_menu'),
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

    // line 4
    public function block_menu($context, array $blocks = array())
    {
        // line 5
        $this->env->loadTemplate("FrontendVisitasBundle:Default:menu.html.twig")->display($context);
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("body", $context, $blocks);
        echo "


    
    <div class=\"titulo\">Registrar Usuario</div>



    <form novalidate action=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("registranuevavisita");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">

        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "
        ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "_token"), 'widget');
        echo "


            <div id=\"operador\">
                <div class=\"form-contenedor\">
                    <div>";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cedula:</div>
                    <div class=\"widgets\">";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombres"), 'errors');
        echo "</div>
                    <div class=\"labels\">Nombres:</div>
                    <div class=\"widgets\">";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombres"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "apellidos"), 'errors');
        echo "</div>
                    <div class=\"labels\">Apellidos:</div>
                    <div class=\"widgets\">";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "apellidos"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "fechaentrada"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fecha Entrada:</div>
                    <div class=\"widgets\">";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "fechaentrada"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "horaentrada"), 'errors');
        echo "</div>
                    <div class=\"labels\">Hora Entrada:</div>
                    <div class=\"widgets\">";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "horaentrada"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "contacto"), 'errors');
        echo "</div>
                    <div class=\"labels\">Contacto:</div>
                    <div class=\"widgets\">";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "contacto"), 'widget');
        echo "</div>
                </div>


                <div class=\"form-contenedor\">
                    <div>";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "observaciones"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observaciones:</div>
                    <div class=\"widgets\">";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "observaciones"), 'widget');
        echo "</div>
                </div>

            </div> 

            <div class=\"widgets\">";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombres"), 'widget');
        echo "</div>
                    <br><br>


       <button class=\"btn\" type=\"submit\">Registrar</button> 
    </form>

        ";
        // line 77
        $this->displayBlock('camara', $context, $blocks);
        // line 90
        echo "


<script language=\"JavaScript\" type=\"text/JavaScript\">
var win = null;
function NewWindow(mypage,cedula, myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
mypage=mypage+cedula;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}
</script>










    <script src=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/distribucion/operador_new.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 77
    public function block_camara($context, array $blocks = array())
    {
        // line 78
        echo "        <script> 
        function abrir(url) { 
        open(url,'','top=300,left=300,width=300,height=300') ; 
        } 
        </script> 
          <a class=\"btn btn-info\" onclick=\"NewWindow('/sait/web/libs/photobooth/index.php?cedula=', document.getElementById('frontend_visitasbundle_usuariotype_cedula').value,'Ventana','440','570','no');return false;\">



          <i class=\"icon-user icon-camera\"></i> FOTO </a><br><br>
        <br><br>
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
        return array (  211 => 78,  208 => 77,  202 => 114,  176 => 90,  174 => 77,  164 => 70,  156 => 65,  151 => 63,  143 => 58,  138 => 56,  131 => 52,  126 => 50,  119 => 46,  114 => 44,  107 => 40,  102 => 38,  95 => 34,  90 => 32,  83 => 28,  78 => 26,  70 => 21,  66 => 20,  58 => 18,  47 => 10,  44 => 9,  40 => 5,  37 => 4,  31 => 3,);
    }
}
