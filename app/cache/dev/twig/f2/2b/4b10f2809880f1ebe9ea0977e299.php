<?php

/* FrontendVisitasBundle:Default:menu.html.twig */
class __TwigTemplate_f22b4b10f2809880f1ebe9ea0977e299 extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("control_visitas_usuario");
        echo "'><span>INICIO</span></a></li>
   
      <li class='has-sub'><a href='#'><span>ACCIONES</span></a>
         <ul>
            <li><a href='";
        // line 7
        echo $this->env->getExtension('routing')->getPath("usuario_busqueda_control");
        echo "'><span>REGISTRAR USUARIO</span></a></li>
            <li><a href='";
        // line 8
        echo $this->env->getExtension('routing')->getPath("licencias_por_vencer");
        echo "'><span>OTRA</span></a></li>
         </ul>
      </li>
      
      <li class='has-sub'><a href='";
        // line 12
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "'><span>APLICACIONES</span></a></li>
      <li><a href='";
        // line 13
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "'><span>SALIR</span></a></li>
 </ul>
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
        return array (  45 => 13,  41 => 12,  30 => 7,  23 => 3,  19 => 1,  124 => 13,  121 => 12,  113 => 64,  99 => 56,  94 => 54,  87 => 50,  83 => 49,  79 => 48,  73 => 47,  70 => 46,  66 => 45,  34 => 8,  32 => 12,  29 => 10,);
    }
}
