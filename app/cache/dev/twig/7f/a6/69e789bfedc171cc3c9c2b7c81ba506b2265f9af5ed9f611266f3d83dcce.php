<?php

/* TransporteBundle:Default:index.html.twig */
class __TwigTemplate_7fa669e789bfedc171cc3c9c2b7c81ba506b2265f9af5ed9f611266f3d83dcce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::transporte.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::transporte.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Transporte Inicio";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    TRANSPORTE INICIO
";
    }

    // line 9
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 10
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">INICIO</a></li>
  <li class=\"active\">TRANSPORTE INICIO</li>
</ol>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    ";
        // line 18
        if (($this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE") || ($this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE") && $this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE_ADMINISTRADOR")))) {
            // line 19
            echo "        <table align=center width=\"30%\"> 
            <tr>
                <th>
                    Nueva Solicitud<br>
                    <a href=\"";
            // line 23
            echo $this->env->getExtension('routing')->getPath("solicitudes_new");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/transporte/transporte.jpg"), "html", null, true);
            echo "\" width=100px></a>
                </th>
                <th>
                    Mis Solicitudes<br>
                    <a href=\"";
            // line 27
            echo $this->env->getExtension('routing')->getPath("missolicitudes");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/transporte/lupa.png"), "html", null, true);
            echo "\" width=80px></a> 
                </th>
            </tr>      
        </table>
    ";
        } elseif ($this->env->getExtension('security')->isGranted("ROLE_TRANSPORTE_ADMINISTRADOR")) {
            // line 32
            echo "        <table align=center width=\"30%\"> 
            <tr>
                <th>
                    Solicitudes<br>
                    <a href=\"";
            // line 36
            echo $this->env->getExtension('routing')->getPath("solicitudes");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/transporte/transporte.jpg"), "html", null, true);
            echo "\" width=100px></a>
                </th>
                <th>
                    Personal Externo<br>
                    <a href=\"";
            // line 40
            echo $this->env->getExtension('routing')->getPath("personalexterno_list");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/User_male.png"), "html", null, true);
            echo "\" width=80px></a> 
                </th>
                <th>
                    Vehiculos<br>
                    <a href=\"";
            // line 44
            echo $this->env->getExtension('routing')->getPath("vehiculos_list");
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/transporte/transporte.jpg"), "html", null, true);
            echo "\" width=100px></a> 
                </th>                
            </tr>      
        </table>
    ";
        }
        // line 49
        echo "

";
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 49,  117 => 44,  108 => 40,  99 => 36,  93 => 32,  83 => 27,  74 => 23,  68 => 19,  66 => 18,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
