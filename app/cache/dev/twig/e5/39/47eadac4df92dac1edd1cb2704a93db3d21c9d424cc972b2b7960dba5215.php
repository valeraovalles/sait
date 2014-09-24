<?php

/* FrontendVisitasBundle:Default:menu.html.twig */
class __TwigTemplate_e53947eadac4df92dac1edd1cb2704a93db3d21c9d424cc972b2b7960dba5215 extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("usuario_busqueda_control");
        echo "\">REGISTRAR USUARIO</a></li>
        </ul>
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("contacto");
        echo "\">CONTACTO</a></li>
          <li><a href=\"";
        // line 15
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
        return "FrontendVisitasBundle:Default:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 11,  26 => 6,  19 => 1,  53 => 11,  50 => 10,  44 => 15,  39 => 6,  36 => 5,  30 => 3,  183 => 73,  179 => 72,  173 => 68,  162 => 62,  156 => 60,  154 => 59,  149 => 58,  144 => 55,  138 => 51,  133 => 49,  128 => 48,  123 => 46,  118 => 45,  116 => 44,  112 => 43,  108 => 42,  104 => 41,  100 => 40,  94 => 39,  90 => 38,  87 => 37,  83 => 36,  63 => 19,  60 => 18,  51 => 12,  48 => 11,  45 => 10,  40 => 14,  37 => 6,  31 => 4,);
    }
}
