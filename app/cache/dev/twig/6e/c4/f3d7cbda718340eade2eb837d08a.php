<?php

/* UsuarioBundle:Default:includes/menu.html.twig */
class __TwigTemplate_6ec4f3d7cbda718340eade2eb837d08a extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "'><span>INICIO</span></a></li>
   <li class='has-sub'><a href='#'><span>ADMINISTRACION</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>USUARIOS</span></a>
            <ul>
               <li><a href='";
        // line 8
        echo $this->env->getExtension('routing')->getPath("user");
        echo "'><span>LISTADO</span></a></li>
               <li><a href='";
        // line 9
        echo $this->env->getExtension('routing')->getPath("user_new");
        echo "'><span>NUEVO</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>ROL</span></a>
            <ul>
               <li><a href='";
        // line 14
        echo $this->env->getExtension('routing')->getPath("rol");
        echo "'><span>LISTADO</span></a></li>
               <li><a href='";
        // line 15
        echo $this->env->getExtension('routing')->getPath("rol_new");
        echo "'><span>NUEVO</span></a></li>
            </ul>
         </li>

         <li><a href='";
        // line 19
        echo $this->env->getExtension('routing')->getPath("sincronizacion");
        echo "'><span>SINCRONIZAR</span></a></li>
      </ul>
   </li>
   <li><a href='";
        // line 22
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "'><span>SALIR</span></a></li>
   <li class='last'><a href='";
        // line 23
        echo $this->env->getExtension('routing')->getPath("contacto");
        echo "'><span>CONTACTO</span></a></li>
</ul>
</div>

";
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
        return array (  64 => 23,  60 => 22,  54 => 19,  43 => 14,  35 => 9,  23 => 3,  19 => 1,  31 => 8,  28 => 3,  131 => 51,  106 => 31,  103 => 30,  96 => 25,  88 => 22,  75 => 16,  72 => 15,  56 => 14,  50 => 11,  47 => 15,  44 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
