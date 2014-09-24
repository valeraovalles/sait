<?php

/* NominaBundle:Default:includes/menu.html.twig */
class __TwigTemplate_fb082bf302c9c3a939e0cbc97c5929baebb642a450b7b8bd75f827c1112c0e28 extends Twig_Template
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
   
   <li><a href='";
        // line 5
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "'><span>SALIR</span></a></li>

</ul>
</div>

";
    }

    public function getTemplateName()
    {
        return "NominaBundle:Default:includes/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,  31 => 4,  28 => 5,  121 => 43,  116 => 41,  109 => 37,  104 => 35,  97 => 31,  92 => 29,  86 => 26,  79 => 24,  76 => 23,  73 => 22,  64 => 19,  61 => 18,  56 => 17,  54 => 16,  47 => 12,  44 => 11,  39 => 7,  36 => 6,  30 => 3,);
    }
}
