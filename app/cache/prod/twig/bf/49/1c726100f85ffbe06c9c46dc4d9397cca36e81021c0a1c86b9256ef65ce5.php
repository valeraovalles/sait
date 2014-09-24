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
        return array (  84 => 34,  80 => 33,  76 => 31,  69 => 27,  64 => 24,  61 => 23,  54 => 19,  50 => 18,  45 => 16,  41 => 15,  36 => 12,  34 => 11,  26 => 6,  19 => 1,  28 => 3,  469 => 209,  464 => 206,  460 => 205,  433 => 180,  426 => 174,  418 => 171,  415 => 170,  413 => 169,  410 => 168,  402 => 165,  399 => 164,  397 => 163,  394 => 162,  386 => 159,  383 => 158,  381 => 157,  378 => 156,  370 => 153,  367 => 152,  365 => 151,  362 => 150,  359 => 142,  357 => 137,  349 => 133,  346 => 132,  343 => 130,  335 => 127,  332 => 126,  330 => 125,  327 => 124,  324 => 118,  316 => 115,  313 => 114,  311 => 113,  308 => 112,  302 => 104,  298 => 102,  290 => 99,  287 => 98,  285 => 97,  277 => 94,  273 => 92,  265 => 89,  262 => 88,  260 => 87,  257 => 86,  249 => 83,  246 => 82,  244 => 81,  241 => 80,  233 => 77,  230 => 76,  228 => 75,  225 => 74,  217 => 71,  214 => 70,  212 => 69,  209 => 68,  201 => 65,  198 => 64,  196 => 63,  193 => 62,  185 => 59,  182 => 58,  180 => 57,  176 => 55,  168 => 53,  165 => 52,  163 => 51,  155 => 48,  151 => 46,  142 => 42,  139 => 41,  137 => 40,  132 => 37,  128 => 35,  123 => 33,  119 => 32,  114 => 31,  110 => 29,  99 => 28,  97 => 27,  93 => 26,  89 => 25,  83 => 24,  77 => 23,  72 => 21,  65 => 17,  62 => 16,  59 => 15,  52 => 10,  49 => 9,  40 => 6,  37 => 5,  31 => 4,);
    }
}
