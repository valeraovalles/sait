<?php

/* UsuarioBundle:Default:index.html.twig */
class __TwigTemplate_40210677a956b6c2becdcf976fa0e49bf7f6526e22faf6aa1a0e55324c8318b2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::administracion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
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
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    <h2>BIENVENIDO ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "primerNombre")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "primerApellido")), "html", null, true);
        echo "</h2>
";
    }

    // line 9
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 10
        echo "<ol class=\"breadcrumb\">
  <li class=\"active\">PAGINA PRINCIPAL</li>
</ol>
";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 16
        echo "
    ";
        // line 17
        $this->displayParentBlock("body", $context, $blocks);
        echo "

<div class=\"row\">
    <div class=\"col-md-5\" style=\"padding-left:30px;\">
        ";
        // line 21
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user")) {
            echo " 
        <div class=\"infousuario\" align=\"left\">
            <div><b>NOMBRE:</b> ";
            // line 23
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "primerNombre")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "segundoNombre")), "html", null, true);
            echo "</div>
            <div><b>APELLIDO:</b> ";
            // line 24
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "primerApellido")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "segundoApellido")), "html", null, true);
            echo "</div>
            <div><b>USUARIO:</b> ";
            // line 25
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username")), "html", null, true);
            echo "</div>
            <div><b>CEDULA:</b> ";
            // line 26
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "cedula")), "html", null, true);
            echo " </div>
            ";
            // line 27
            if (($this->getAttribute($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "user"), "fueradenomina") == false)) {
                // line 28
                echo "                <div><b>UNIDAD:</b> ";
                if (($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "nivelorganizacional") != null)) {
                    echo " ";
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "nivelorganizacional"), "descripcion")), "html", null, true);
                    echo " ";
                } else {
                    echo " N/A ";
                }
                echo "</div>
                <div><b>DEPENDENCIA:</b> ";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), "nombre"), "html", null, true);
                echo "</div>
                ";
                // line 31
                echo "                <div><b>FECHA INGRESO:</b> ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), "fecha_ingreso")), "d-m-Y"), "html", null, true);
                echo "</div>
                <div><b>FECHA NACIMIENTO:</b> ";
                // line 32
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), "fecha_nacimiento")), "d-m-Y"), "html", null, true);
                echo "</div>
                <div><b>CARGO:</b> ";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), "descripcion_cargo"), "html", null, true);
                echo "</div>
            ";
            }
            // line 35
            echo "        </div>
        ";
        }
        // line 37
        echo "    </div>
    <div class=\"col-img-apliinicio col-md-7\" style=\"padding-right:60px;\">
        <div class=\"row\">
            ";
        // line 40
        if (($this->getAttribute($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "user"), "password") != null)) {
            // line 41
            echo "              <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 42
            echo $this->env->getExtension('routing')->getPath("cambioclave");
            echo "\">CAMBIAR CLAVE<br><img class=\"xxx\" id=\"neto\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/CLAVE.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"CAMBIAR CLAVE\" data-trigger=\"hover\"></a>      
              </div>

            ";
        }
        // line 46
        echo "
            <div class=\"col-sm-6 col-md-4\">
                <a href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("telesur_personal");
        echo "\">PERSONAL<br><img  src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo.jpg"), "html", null, true);
        echo "\" data-placement=\"bottom\" title=\"Personal\" data-trigger=\"hover\"></a>
            </div>

            ";
        // line 51
        if ($this->env->getExtension('security')->isGranted("ROLE_DISTRIBUCION")) {
            // line 52
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 53
            echo $this->env->getExtension('routing')->getPath("distribucion_homepage");
            echo "\">DISTRIBUCIÓN<br><img class=\"img-circle\" id=\"neto\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/apps/mapamundi.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"DISTRIBUCIÓN\" data-trigger=\"hover\"></a>      
                </div>
            ";
        }
        // line 55
        echo "   

            ";
        // line 57
        if (($this->env->getExtension('security')->isGranted("ROLE_LICENCIAS") || $this->env->getExtension('security')->isGranted("ROLE_LICADMIN"))) {
            // line 58
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 59
            echo $this->env->getExtension('routing')->getPath("licencias_homepage");
            echo "\">LICENCIAS<br><img id=\"licencias\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/licencias/candado.png"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"LICENCIAS\" data-trigger=\"hover\"></a>
                </div>  
            ";
        }
        // line 62
        echo "
            ";
        // line 63
        if ($this->env->getExtension('security')->isGranted("ROLE_VISITAS")) {
            // line 64
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 65
            echo $this->env->getExtension('routing')->getPath("control_visitas_usuario");
            echo "\">VISITAS<br><img id=\"licencias\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/User_male.png"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"VISITAS\" data-trigger=\"hover\"></a>        
                </div>
            ";
        }
        // line 68
        echo "
            ";
        // line 69
        if (($this->getAttribute($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "user"), "fueradenomina") == false)) {
            // line 70
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 71
            echo $this->env->getExtension('routing')->getPath("neto_homepage");
            echo "\">NETO<br><img id=\"licencias\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/moneda.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"RECIBO DE PAGO\" data-trigger=\"hover\"></a> 
                </div>
            ";
        }
        // line 74
        echo "
            ";
        // line 75
        if ($this->env->getExtension('security')->isGranted("ROLE_VIDEOTECA")) {
            // line 76
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 77
            echo $this->env->getExtension('routing')->getPath("videoteca_homepage");
            echo "\">VIDEOTECA<br><img id=\"licencias\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/videoteca.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"VIDEOTECA\" data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 80
        echo "
            ";
        // line 81
        if ($this->env->getExtension('security')->isGranted("ROLE_NOMINA")) {
            // line 82
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 83
            echo $this->env->getExtension('routing')->getPath("nomina_formalimentacion");
            echo "\">NÓMINA<br><img id=\"licencias\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/nomina.jpeg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"TXT PRESTACIONES\" data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 86
        echo "
            ";
        // line 87
        if (($this->getAttribute($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : $this->getContext($context, "usuario")), "user"), "fueradenomina") == false)) {
            // line 88
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 89
            echo $this->env->getExtension('routing')->getPath("constancia_homepage");
            echo "\">CONSTANCIA<br><img id=\"licencias\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/constancia.jpeg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"CONSTANCIA DE TRABAJO\" data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 92
        echo "
            <div class=\"col-sm-6 col-md-4\">
                <a href=\"";
        // line 94
        echo $this->env->getExtension('routing')->getPath("sit_homepage");
        echo "\">SIT<br><img id=\"licencias\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/sit.jpg"), "html", null, true);
        echo "\" data-placement=\"bottom\" title=\"SOLICITUDES\" data-trigger=\"hover\"></a>
            </div>

            ";
        // line 97
        if (((((((((($this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_ADMIN") || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_DGE")) || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_TESORERIA")) || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_FINANZAS")) || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_RRHH")) || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_PTTO")) || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_APOYO")) || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_COMPRAS")) || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_ASISTENTES")) || $this->env->getExtension('security')->isGranted("ROLE_CONTENIDOS_DIRECTORLINEA"))) {
            // line 98
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 99
            echo $this->env->getExtension('routing')->getPath("datosproveedor");
            echo "\">CONTROL DE PAGOS<br><img id=\"licencias\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/dinero.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"CONTROL DE PAGOS\" data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 102
        echo "
            <div class=\"col-sm-6 col-md-4\">
                <a href=\"javascript:void(0)\" id=\"pe\">ESTUDIOS<br><img src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/estudio.jpg"), "html", null, true);
        echo "\" data-placement=\"bottom\" title=\"SOLICITUDES\" data-trigger=\"hover\"></a>
            </div>

            ";
        // line 112
        echo "            
            ";
        // line 113
        if ($this->env->getExtension('security')->isGranted("ROLE_CREATV")) {
            // line 114
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 115
            echo $this->env->getExtension('routing')->getPath("creatv_homepage");
            echo "\">CREATV<br><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/creatv.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"CREATV\" data-trigger=\"hover\"></a>        
                </div>
            ";
        }
        // line 118
        echo "
            ";
        // line 124
        echo "
            ";
        // line 125
        if (($this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE") || $this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE_ADMINISTRADOR"))) {
            // line 126
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 127
            echo $this->env->getExtension('routing')->getPath("transporte");
            echo "\" id=\"tr\">TRANSPORTE<br><img  src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/transporte.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"SOLICITUDES\" data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 130
        echo "
            ";
        // line 132
        echo "            <div class=\"col-sm-6 col-md-4\">
              <a href=\"";
        // line 133
        echo $this->env->getExtension('routing')->getPath("mercal_homepagenum", array("idjornada" => 9));
        echo "\">JORNADAS<br><img id=\"licencias\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/jornada.png"), "html", null, true);
        echo "\" data-placement=\"bottom\" title=\"SOLICITUDES\" data-trigger=\"hover\"></a>
            </div>

            ";
        // line 137
        echo "            ";
        // line 142
        echo "
            ";
        // line 150
        echo "           
            ";
        // line 151
        if ($this->env->getExtension('security')->isGranted("ROLE_CONTRATOS")) {
            // line 152
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 153
            echo $this->env->getExtension('routing')->getPath("contratos");
            echo "\">CONTRATOS<br><img  src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/contratos.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\" title=\"SOLICITUDES\" data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 156
        echo "
            ";
        // line 157
        if ($this->env->getExtension('security')->isGranted("ROLE_DIRECTORIO")) {
            // line 158
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 159
            echo $this->env->getExtension('routing')->getPath("directorio_homepage");
            echo "\">DIRECTORIO<br><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/directorio.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\"  data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 162
        echo "
            ";
        // line 163
        if ($this->env->getExtension('security')->isGranted("ROLE_CUMPLEANIOS")) {
            // line 164
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 165
            echo $this->env->getExtension('routing')->getPath("cumpleanios_personal");
            echo "\">CUMPLEAÑOS<br><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/cumpleanios.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\"  data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 168
        echo "            
            ";
        // line 169
        if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO")) {
            // line 170
            echo "                <div class=\"col-sm-6 col-md-4\">
                    <a href=\"";
            // line 171
            echo $this->env->getExtension('routing')->getPath("proyecto_homepage");
            echo "\">PROYECTO<br><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/proyecto.jpg"), "html", null, true);
            echo "\" data-placement=\"bottom\"  data-trigger=\"hover\"></a>
                </div>
            ";
        }
        // line 174
        echo "
        </div>
    </div>
</div>

    ";
        // line 180
        echo "    <SCRIPT TYPE=\"text/javascript\">
    \$( \"#pe\" ).click(function() {
        \$('#form60').attr('action', '/Telesur/web/estudios.php');
        \$( \"#form60\" ).submit();
    });

    \$( \"#mm\" ).click(function() {
        \$('#form60').attr('action', '/Telesur/web/mapamundi.php');
        \$( \"#form60\" ).submit();
    });

    \$( \"#ct\" ).click(function() {
        \$('#form60').attr('action', '/Telesur/web/creatv.php');
        \$( \"#form60\" ).submit();
    });

    \$( \"#tr\" ).click(function() {
        \$('#form60').attr('action', '/Telesur/web/transporte.php');
        \$( \"#form60\" ).submit();
    });


    </SCRIPT>

    <form id=\"form60\" action=\"\" method=\"post\" style=\"display:none;\">
        <input type=\"text\" name=\"signin[username]\" id=\"signin_username\" value=\"";
        // line 205
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"), "html", null, true);
        echo "\"/>
        <input type=\"password\" name=\"signin[password]\" id=\"signin_password\" value=\"";
        // line 206
        echo twig_escape_filter($this->env, (isset($context["PASSPASS"]) ? $context["PASSPASS"] : $this->getContext($context, "PASSPASS")), "html", null, true);
        echo "\"/>
    </form>
    ";
        // line 209
        echo "


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
        return array (  469 => 209,  464 => 206,  460 => 205,  433 => 180,  426 => 174,  418 => 171,  415 => 170,  413 => 169,  410 => 168,  402 => 165,  399 => 164,  397 => 163,  394 => 162,  386 => 159,  383 => 158,  381 => 157,  378 => 156,  370 => 153,  367 => 152,  365 => 151,  362 => 150,  359 => 142,  357 => 137,  349 => 133,  346 => 132,  343 => 130,  335 => 127,  332 => 126,  330 => 125,  327 => 124,  324 => 118,  316 => 115,  313 => 114,  311 => 113,  308 => 112,  302 => 104,  298 => 102,  290 => 99,  287 => 98,  285 => 97,  277 => 94,  273 => 92,  265 => 89,  262 => 88,  260 => 87,  257 => 86,  249 => 83,  246 => 82,  244 => 81,  241 => 80,  233 => 77,  230 => 76,  228 => 75,  225 => 74,  217 => 71,  214 => 70,  212 => 69,  209 => 68,  201 => 65,  198 => 64,  196 => 63,  193 => 62,  185 => 59,  182 => 58,  180 => 57,  176 => 55,  168 => 53,  165 => 52,  163 => 51,  155 => 48,  151 => 46,  142 => 42,  139 => 41,  137 => 40,  132 => 37,  128 => 35,  123 => 33,  119 => 32,  114 => 31,  110 => 29,  99 => 28,  97 => 27,  93 => 26,  89 => 25,  83 => 24,  77 => 23,  72 => 21,  65 => 17,  62 => 16,  59 => 15,  52 => 10,  49 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
