<?php

/* DistribucionBundle:Default:includes/menu.html.twig */
class __TwigTemplate_c76e38316cde61ee1b3580a8655f5691801a636d4aa476484a28a1a4833e47e0 extends Twig_Template
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
          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">OPERADORES <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">OPERADORES</a></li>
              <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("operador_new");
        echo "\">NUEVO OPERADOR</a></li>
              <li class=\"divider\"></li>
              <li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("tipooperador");
        echo "\">TIPO DE OPERADOR</a></li>
              <li><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("paquete");
        echo "\">PAQUETES</a></li>
              <li><a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("representante");
        echo "\">REPRESENTANTES</a></li>
              <li><a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("objetocomodato");
        echo "\">OBJETOS DE COMODATO</a></li>
              <li><a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("zona");
        echo "\">ZONAS</a></li>
              <li><a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("operador_top");
        echo "\">TOP OPERADORES</a></li>
            </ul>
          </li>

          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">REPORTES <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu\">
            <li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("reporte_informativogeneral");
        echo "\">REPORTE GENERAL</a></li>
              <li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("reporte_informativo");
        echo "\">REPORTE INFORMATIVO</a></li>
              <li><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("reporte_grafico");
        echo "\">REPORTE GRÁFICO</a></li>
            </ul>
          </li>

         <li><a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("infooperadores");
        echo "\">RESUMEN</a></li>
        </ul>
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("contacto");
        echo "\">CONTACTO</a></li>
          <li><a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">SALIR</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
  </div>
</div>


  

";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Default:includes/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 39,  97 => 38,  91 => 35,  84 => 31,  80 => 30,  76 => 29,  66 => 22,  62 => 21,  58 => 20,  54 => 19,  50 => 18,  26 => 6,  19 => 1,  43 => 8,  37 => 14,  29 => 3,  222 => 77,  219 => 76,  210 => 69,  192 => 65,  184 => 64,  173 => 62,  164 => 58,  157 => 56,  154 => 55,  150 => 53,  143 => 51,  137 => 49,  133 => 48,  127 => 47,  124 => 46,  121 => 45,  117 => 44,  112 => 43,  110 => 42,  107 => 41,  90 => 40,  63 => 17,  60 => 16,  52 => 11,  49 => 10,  46 => 17,  41 => 15,  38 => 5,  32 => 4,);
    }
}
