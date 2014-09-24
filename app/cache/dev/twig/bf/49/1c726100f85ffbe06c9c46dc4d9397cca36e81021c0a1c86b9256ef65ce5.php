<?php

/* UsuarioBundle:Default:includes/menu.html.twig */
class __TwigTemplate_bf491c726100f85ffbe06c9c46dc4d9397cca36e81021c0a1c86b9256ef65ce5 extends Twig_Template
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
          ";
        // line 11
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMINISTRADOR")) {
            // line 12
            echo "          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">ADMINISTRACION <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 15
            echo $this->env->getExtension('routing')->getPath("user");
            echo "\">LISTA DE USUARIOS</a></li>
              <li><a href=\"";
            // line 16
            echo $this->env->getExtension('routing')->getPath("user_new");
            echo "\">NUEVO USUARIO</a></li>
              <li class=\"divider\"></li>
              <li><a href=\"";
            // line 18
            echo $this->env->getExtension('routing')->getPath("rol");
            echo "\">LISTA DE ROLES</a></li>
              <li><a href=\"";
            // line 19
            echo $this->env->getExtension('routing')->getPath("rol_new");
            echo "\">NUEVO ROL</a></li>
            </ul>
          </li>
          ";
        }
        // line 23
        echo "          ";
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMINISTRADOR")) {
            // line 24
            echo "          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">NIVEL ORGANIZACIONAL <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 27
            echo $this->env->getExtension('routing')->getPath("nivelorganizacional");
            echo "\">LISTA</a></li>
            </ul>
          </li>
          ";
        }
        // line 31
        echo "        </ul>
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("contacto");
        echo "\">CONTACTO</a></li>
          <li><a href=\"";
        // line 34
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
        return "UsuarioBundle:Default:includes/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 34,  80 => 33,  76 => 31,  69 => 27,  64 => 24,  61 => 23,  54 => 19,  50 => 18,  45 => 16,  41 => 15,  36 => 12,  34 => 11,  26 => 6,  19 => 1,  31 => 4,  28 => 3,);
    }
}
