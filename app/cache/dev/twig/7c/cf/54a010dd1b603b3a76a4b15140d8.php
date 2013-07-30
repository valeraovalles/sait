<?php

/* LicenciasBundle:Default:includes/menu.html.twig */
class __TwigTemplate_7ccf54a010dd1b603b3a76a4b15140d8 extends Twig_Template
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
        echo "<div id='cssmenu'>
   <ul>
      <li class='active'><a href='";
        // line 3
        echo $this->env->getExtension('routing')->getPath("licencias_homepage");
        echo "'><span>INICIO</span></a></li>
   
      <li class='has-sub'><a href='#'><span>LISTADO DE LICENCIAS</span></a>
         <ul>
            <li><a href='";
        // line 7
        echo $this->env->getExtension('routing')->getPath("licencias_vencidas");
        echo "'><span>LICENCIAS VENCIDAS</span></a></li>
            <li><a href='";
        // line 8
        echo $this->env->getExtension('routing')->getPath("licencias_por_vencer");
        echo "'><span>LICENCIAS POR VENCER</span></a></li>
         </ul>
      </li>
      ";
        // line 11
        if (($this->getContext($context, "rol") == 1)) {
            // line 12
            echo "         <li class='has-sub'><a href='";
            echo $this->env->getExtension('routing')->getPath("licencias_new");
            echo "'><span>NUEVA LICENCIA</span></a></li>
      ";
        }
        // line 13
        echo "      
      <li class='has-sub'><a href='";
        // line 14
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "'><span>APLICACIONES</span></a></li>
      <li><a href='";
        // line 15
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "'><span>SALIR</span></a></li>
 </ul>
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
        return array (  55 => 15,  51 => 14,  42 => 12,  40 => 11,  23 => 3,  19 => 1,  56 => 14,  53 => 13,  48 => 13,  45 => 9,  34 => 8,  31 => 3,  157 => 54,  151 => 53,  146 => 50,  137 => 46,  130 => 45,  124 => 44,  120 => 43,  113 => 41,  110 => 40,  106 => 38,  102 => 36,  98 => 34,  96 => 33,  90 => 32,  84 => 31,  80 => 30,  74 => 29,  71 => 28,  67 => 27,  47 => 10,  44 => 9,  39 => 7,  36 => 5,  30 => 7,);
    }
}
