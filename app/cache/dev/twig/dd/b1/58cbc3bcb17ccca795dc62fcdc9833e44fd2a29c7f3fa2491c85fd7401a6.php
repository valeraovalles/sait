<?php

/* LicenciasBundle:Default:includes/menu.html.twig */
class __TwigTemplate_ddb158cbc3bcb17ccca795dc62fcdc9833e44fd2a29c7f3fa2491c85fd7401a6 extends Twig_Template
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
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">LISTADO DE LICENCIAS <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("licencias_vencidas");
        echo "\">LICENCIAS VENCIDAS</a></li>
              <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("licencias_por_vencer");
        echo "\">LICENCIAS POR VENCER</a></li>
            </ul>
          </li>
         <li><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("licencias_new");
        echo "\">NUEVA LICENCIA</a></li>
        </ul>
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("contacto");
        echo "\">CONTACTO</a></li>
          <li><a href=\"";
        // line 22
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
        return "LicenciasBundle:Default:includes/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 22,  53 => 21,  47 => 18,  41 => 15,  26 => 6,  19 => 1,  32 => 4,  29 => 3,  171 => 67,  166 => 64,  157 => 60,  150 => 59,  144 => 58,  140 => 57,  133 => 55,  130 => 54,  124 => 50,  118 => 46,  112 => 41,  110 => 40,  104 => 39,  98 => 38,  94 => 37,  88 => 36,  85 => 35,  81 => 34,  63 => 19,  60 => 18,  51 => 11,  48 => 10,  45 => 8,  40 => 7,  37 => 14,  31 => 3,);
    }
}
