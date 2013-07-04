<?php

/* DistribucionBundle:Default:includes/menu.html.twig */
class __TwigTemplate_36f7b0085f8e39a8693465a2a27973c2 extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("distribucion_homepage");
        echo "'><span>INICIO</span></a></li>
   
   <li class='has-sub'><a href='#'><span>OPERADOR</span></a>
      <ul>
         <li><a href='";
        // line 7
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "'><span>LISTA DE OPERADORES</span></a></li>
         <li><a href='";
        // line 8
        echo $this->env->getExtension('routing')->getPath("operador_new");
        echo "'><span>NUEVO OPERADOR</span></a></li>
         
         <li class='has-sub'><a href='#'><span>TIPO DE OPERADOR</span></a>
            <ul>
               <li><a href='";
        // line 12
        echo $this->env->getExtension('routing')->getPath("tipooperador_new");
        echo "'><span>NUEVO TIPO DE OPERADOR</span></a></li>
               <li><a href='";
        // line 13
        echo $this->env->getExtension('routing')->getPath("tipooperador");
        echo "'><span>LISTA TIPO DE OPERADORES</span></a></li>
            </ul>
         </li>

         <li class='has-sub'><a href='#'><span>PAQUETES</span></a>
            <ul>
               <li><a href='";
        // line 19
        echo $this->env->getExtension('routing')->getPath("paquete_new");
        echo "'><span>NUEVO PAQUETE</span></a></li>
               <li><a href='";
        // line 20
        echo $this->env->getExtension('routing')->getPath("paquete");
        echo "'><span>LISTA TIPO DE PAQUETES</span></a></li>
            </ul>
         </li>

         <li class='has-sub'><a href='#'><span>REPRESENTANTE</span></a>
            <ul>
               <li><a href='";
        // line 26
        echo $this->env->getExtension('routing')->getPath("representante");
        echo "'><span>LISTA DE REPRESENTANTES</span></a></li>
            </ul>
         </li>

         <li class='has-sub'><a href='#'><span>OBJETOS DEL COMODATO</span></a>
            <ul>
               <li><a href='";
        // line 32
        echo $this->env->getExtension('routing')->getPath("objetocomodato_new");
        echo "'><span>NUEVO OBJETO DEL COMODATO</span></a></li>
               <li><a href='";
        // line 33
        echo $this->env->getExtension('routing')->getPath("objetocomodato");
        echo "'><span>LISTA OBJETOS DEL COMODATO</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   
  
   <li class='has-sub'><a href='#'><span>REPORTES</span></a>
      <ul>
         <li><a href='";
        // line 42
        echo $this->env->getExtension('routing')->getPath("reporte_informativo");
        echo "'><span>REPORTE INFORMATIVO</span></a></li>
         <li><a href='";
        // line 43
        echo $this->env->getExtension('routing')->getPath("representante");
        echo "'><span>REPORTE ESTADÍSTICO</span></a></li>
         <li><a href='";
        // line 44
        echo $this->env->getExtension('routing')->getPath("representante");
        echo "'><span>REPORTE TOTALIZACIÓN</span></a></li>
      </ul>
   </li>
   
   <li class='has-sub'><a href='";
        // line 48
        echo $this->env->getExtension('routing')->getPath("infooperadores");
        echo "'><span>RESUMEN</span></a></li>
   
   <li class='has-sub'><a href='";
        // line 50
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "'><span>APLICACIONES</span></a></li>
   <li><a href='";
        // line 51
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "'><span>SALIR</span></a></li>
</ul>
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
        return array (  116 => 51,  112 => 50,  107 => 48,  100 => 44,  96 => 43,  92 => 42,  80 => 33,  76 => 32,  67 => 26,  58 => 20,  54 => 19,  45 => 13,  41 => 12,  34 => 8,  30 => 7,  23 => 3,  19 => 1,  46 => 9,  43 => 8,  37 => 5,  32 => 4,  29 => 3,  87 => 40,  72 => 28,  62 => 21,  57 => 19,  48 => 13,  42 => 11,  38 => 10,  31 => 6,  28 => 5,);
    }
}
