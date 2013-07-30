<?php

/* UsuarioBundle:Default:index.html.twig */
class __TwigTemplate_f5309521022ba25e33bfe46cbdb48155 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::administracion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::administracion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Inicio - Telesur";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    LISTADO DE APLICACIONES
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
    ";
        // line 11
        $this->displayParentBlock("body", $context, $blocks);
        echo "


    ";
        // line 14
        ob_start();
        echo " ";
        if ($this->getAttribute($this->getContext($context, "app"), "user")) {
            echo " USUARIO: ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username")), "html", null, true);
            echo " | NOMBRE: ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "usuario"), "primerNombre")), "html", null, true);
            echo " | APELLIDO: ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "usuario"), "primerApellido")), "html", null, true);
            echo " | CEDULA: ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "usuario"), "cedula")), "html", null, true);
            echo " | SUELDO: ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "datos"), "sueldo")), "html", null, true);
        }
        $context["datos"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 15
        echo "    
    <div class=\"titulo\"><span id=\"info\" style=\"cursor:pointer;\" data-content=";
        // line 16
        echo twig_jsonencode_filter($this->getContext($context, "datos"));
        echo " title=\"USUARIO\">BIENVENIDO ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "usuario"), "primerNombre")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "usuario"), "primerApellido")), "html", null, true);
        echo "</span></div>

    <br>
    <div class=\"jquery\" align=\"left\">

            <div class=\"listado_aplicaciones\">
                <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("distribucion_homepage");
        echo "\" onclick=\"document.form.submit()\">DISTRIBUCIÓN<br><img id=\"neto\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/apps/mapamundi.jpg"), "html", null, true);
        echo "\" data-placement=\"bottom\" title=\"DATOS DE USUARIO\" data-trigger=\"hover\"></a><br>
            </div>
            <div class=\"listado_aplicaciones\">
              <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("licencias_homepage");
        echo "\" onclick=\"document.form.submit()\">LICENCIAS<br><img id=\"licencias\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/licencias/candado.png"), "html", null, true);
        echo "\" data-placement=\"bottom\" title=\"DATOS DE USUARIO\" data-trigger=\"hover\"></a>
            </div>
           ";
        // line 30
        echo "            <div class=\"listado_aplicaciones\">
              <a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("control_visitas_usuario");
        echo "\" onclick=\"document.form.submit()\">VISITAS<br><img id=\"licencias\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/User_male.png"), "html", null, true);
        echo "\" data-placement=\"bottom\" title=\"DATOS DE USUARIO\" data-trigger=\"hover\"></a>
            </div>
   </div>

    <br>

    <div style=\"clear:both;float:none;\"></div>


    <script type=\"text/javascript\">

        \$(document).ready(function (){

                \$(\".jquery\").hide(1);

                \$(\".jquery\").fadeIn(3000);

        });

        \$(document).ready(function () {
            \$('#info').gips({ 'theme': 'red', placement: 'right',text:";
        // line 51
        echo twig_jsonencode_filter($this->getContext($context, "datos"));
        echo ", autoHide: true });
        });

    </script>

    <form name=\"form\" action=\"/Telesur/web/index.php/login\" method=\"post\">
        <input type=\"hidden\" value=\"jvalera\" value=\"<?php echo \$idu;?>\" id=\"signin_username\" name=\"signin[username]\">
        <input type=\"hidden\" value=\"#v4l3r4*..\" value=\"<?php echo \$_SESSION['clave'];?>\" id=\"signin_password\" name=\"signin[password]\">
    </form>
    
    <script>

    \$('#info').popover();

    </script>

";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 51,  106 => 31,  103 => 30,  96 => 25,  88 => 22,  75 => 16,  72 => 15,  56 => 14,  50 => 11,  47 => 10,  44 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
