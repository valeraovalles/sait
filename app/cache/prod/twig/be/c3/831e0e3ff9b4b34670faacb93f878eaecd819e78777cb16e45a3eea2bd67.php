<?php

/* ProyectoBundle:Default:includes/menu.html.twig */
class __TwigTemplate_bec3831e0e3ff9b4b34670faacb93f878eaecd819e78777cb16e45a3eea2bd67 extends Twig_Template
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
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">PROYECTOS <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("proyecto");
        echo "\">LISTA</a></li>
              <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("proyecto_new");
        echo "\">NUEVO PROYECTO</a></li>
            </ul>
          </li>
          </li>
          ";
        // line 19
        if ($this->env->getExtension('security')->isGranted("ROLE_PROYECTO_GENERAL")) {
            // line 20
            echo "          <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("proyecto_general");
            echo "\">GENERAL</a></li>
          ";
        }
        // line 22
        echo "        </ul>
            
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("contacto");
        echo "\">CONTACTO</a></li>
          <li><a href=\"";
        // line 26
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
        return "ProyectoBundle:Default:includes/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 26,  61 => 25,  56 => 22,  48 => 19,  26 => 6,  19 => 1,  50 => 20,  47 => 10,  41 => 15,  32 => 4,  29 => 3,  549 => 236,  543 => 234,  541 => 233,  535 => 229,  519 => 225,  515 => 224,  511 => 223,  507 => 222,  503 => 221,  498 => 218,  494 => 216,  490 => 214,  484 => 213,  472 => 212,  470 => 211,  463 => 210,  460 => 209,  457 => 208,  455 => 207,  451 => 205,  444 => 201,  440 => 200,  437 => 199,  433 => 197,  429 => 195,  427 => 194,  423 => 192,  419 => 190,  415 => 188,  411 => 186,  409 => 185,  405 => 183,  401 => 181,  395 => 179,  393 => 178,  389 => 176,  385 => 174,  379 => 172,  377 => 171,  370 => 169,  364 => 168,  360 => 167,  357 => 166,  353 => 165,  328 => 142,  316 => 139,  312 => 138,  308 => 137,  304 => 136,  301 => 135,  298 => 134,  293 => 133,  281 => 123,  269 => 112,  262 => 107,  255 => 105,  246 => 101,  243 => 100,  241 => 99,  238 => 98,  226 => 95,  222 => 94,  218 => 93,  212 => 92,  209 => 91,  206 => 90,  200 => 89,  197 => 88,  193 => 87,  181 => 77,  169 => 66,  167 => 65,  161 => 61,  154 => 59,  145 => 55,  142 => 54,  139 => 53,  127 => 50,  123 => 49,  119 => 48,  113 => 47,  110 => 46,  107 => 45,  101 => 44,  98 => 43,  94 => 42,  85 => 35,  66 => 18,  63 => 17,  55 => 12,  52 => 11,  49 => 10,  43 => 7,  40 => 6,  37 => 14,  31 => 3,);
    }
}
