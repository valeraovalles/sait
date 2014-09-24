<?php

/* UsuarioBundle:Default:contacto.html.twig */
class __TwigTemplate_57df7b48a0b27b5d07ca84fbf5529eecc1a5a8fb873ac5c663722094eb702b52 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::administracion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::administracion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Contacto";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    <h2>DATOS DE CONTACTO</h2>
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
  <li class=\"active\"> DATOS DE CONTACTO</li>
</ol>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "\t";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

\t<div>UNIDAD DE APLICACIONES Y DESARROLLO</div>
\t<div>EXTENSIONES 264 Y 339</div>

\t<br><br>

\t<a class=\"btn btn-primary\" href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">VOLVER</a>

\t<br><br>

";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:Default:contacto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 24,  62 => 17,  59 => 16,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
