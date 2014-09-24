<?php

/* TransporteBundle:Default:includes/menu.html.twig */
class __TwigTemplate_529143732b43887fe2bd6f245401bf0f059bdf05cbf31d831092c7342855c8dd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"menubootstrap\">
  <div align=\"left\">
    <nav class=\"navbar navbar-inverse\" role=\"navigation\">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class=\"navbar-header\">
          <a class=\"navbar-brand\" href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\"><span style=\"color:white;\" class=\"glyphicon glyphicon-home\"></span></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
        <ul class=\"nav navbar-nav\">
            <li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("transporte");
        echo "\"><span>INICIO</span></a></li>
            ";
        // line 12
        if ($this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE_ADMINISTRADOR")) {
            // line 13
            echo "              <li class=\"dropdown\">
                 <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">ADMINISTRACI&Oacute;N <b class=\"caret\"></b></a>
                 <ul class=\"dropdown-menu\">
                   <li><a href=\"";
            // line 16
            echo $this->env->getExtension('routing')->getPath("vehiculos_list");
            echo "\">VEHICULOS</a></li>
                   <li><a href=\"";
            // line 17
            echo $this->env->getExtension('routing')->getPath("personalexterno_list");
            echo "\">PERSONAL EXTERNO</a></li>
                 </ul>
              </li>
            ";
        }
        // line 21
        echo "            <li class=\"dropdown\">
               <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">SOLICITUDES<b class=\"caret\"></b></a>
               <ul class=\"dropdown-menu\">
                  ";
        // line 24
        if ($this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE")) {
            echo " 
                    <li><a href=\"";
            // line 25
            echo $this->env->getExtension('routing')->getPath("solicitudes_new");
            echo "\">CREAR</a></li>
                    <li><a href=\"";
            // line 26
            echo $this->env->getExtension('routing')->getPath("missolicitudes");
            echo "\"><span>MIS SOLICITUDES</span></a></li>
                  ";
        }
        // line 28
        echo "                  ";
        if ($this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE_ADMINISTRADOR")) {
            echo " 
                    <li><a href=\"";
            // line 29
            echo $this->env->getExtension('routing')->getPath("solicitudes");
            echo "\">ADMINISTRAR</a></li>
                  ";
        }
        // line 30
        echo "                  
               </ul>
            </li>
        </ul>
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("contacto");
        echo "\">CONTACTO</a></li>
          <li><a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">SALIR</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Default:includes/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 36,  91 => 35,  84 => 30,  79 => 29,  69 => 26,  65 => 25,  61 => 24,  56 => 21,  49 => 17,  38 => 12,  34 => 11,  26 => 6,  19 => 1,  46 => 9,  43 => 8,  32 => 4,  29 => 3,  127 => 49,  117 => 44,  108 => 40,  99 => 36,  93 => 32,  83 => 27,  74 => 28,  68 => 19,  66 => 18,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 16,  40 => 13,  37 => 5,  31 => 3,);
    }
}
