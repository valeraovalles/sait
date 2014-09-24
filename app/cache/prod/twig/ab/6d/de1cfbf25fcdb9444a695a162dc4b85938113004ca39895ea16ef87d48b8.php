<?php

/* SitBundle:Default:includes/menu.html.twig */
class __TwigTemplate_ab6dde1cfbf25fcdb9444a695a162dc4b85938113004ca39895ea16ef87d48b8 extends Twig_Template
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
        if ($this->env->getExtension('security')->isGranted("ROLE_SIT_ADMINISTRADOR")) {
            // line 12
            echo "          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">SIT<b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 15
            echo $this->env->getExtension('routing')->getPath("ticket");
            echo "\">GESTIONAR</a></li>
              ";
            // line 16
            if ($this->env->getExtension('security')->isGranted("ROLE_SIT_SUPERADMINISTRADOR")) {
                // line 17
                echo "              <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("ticket_listausuariounidad");
                echo "\">USUARIO UNIDAD</a></li>
              ";
            }
            // line 19
            echo "              <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("ticket_asignado");
            echo "\">TICKETS ASIGNADOS</a></li>
              <li><a href=\"";
            // line 20
            echo $this->env->getExtension('routing')->getPath("categoria");
            echo "\">CATEGORIAS</a></li>
            </ul>
          </li>

          <li><a href=\"";
            // line 24
            echo $this->env->getExtension('routing')->getPath("reporte");
            echo "\">INFORME</a></li>
         ";
        }
        // line 26
        echo "
         ";
        // line 27
        if ($this->env->getExtension('security')->isGranted("ROLE_SIT_GENERAL")) {
            // line 28
            echo "         <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("ticketgeneral");
            echo "\">GENERAL</a></li>
         ";
        }
        // line 30
        echo "

        </ul>
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("contacto");
        echo "\">CONTACTO</a></li>
          <li><a href=\"";
        // line 35
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
        return "SitBundle:Default:includes/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  87 => 34,  75 => 28,  73 => 27,  70 => 26,  65 => 24,  58 => 20,  53 => 19,  47 => 17,  41 => 15,  36 => 12,  34 => 11,  26 => 6,  19 => 1,  81 => 30,  68 => 14,  64 => 13,  56 => 11,  50 => 8,  46 => 7,  42 => 6,  38 => 5,  33 => 4,  30 => 3,  377 => 145,  363 => 137,  353 => 135,  347 => 133,  341 => 131,  337 => 129,  335 => 128,  330 => 126,  319 => 118,  313 => 114,  307 => 112,  301 => 110,  299 => 109,  292 => 107,  288 => 106,  278 => 105,  271 => 104,  267 => 102,  256 => 98,  250 => 97,  246 => 96,  238 => 94,  225 => 84,  221 => 83,  217 => 82,  213 => 81,  210 => 80,  204 => 79,  201 => 78,  198 => 77,  195 => 76,  192 => 75,  189 => 74,  186 => 73,  183 => 72,  180 => 71,  177 => 70,  172 => 69,  164 => 68,  154 => 60,  150 => 59,  146 => 58,  138 => 53,  131 => 49,  124 => 45,  117 => 41,  109 => 36,  105 => 35,  99 => 34,  96 => 33,  90 => 30,  86 => 29,  82 => 28,  78 => 18,  74 => 25,  72 => 15,  62 => 17,  59 => 12,  51 => 11,  48 => 10,  45 => 16,  40 => 6,  37 => 5,  31 => 3,);
    }
}
