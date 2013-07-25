<?php

/* FrontendVisitasBundle:Usuario:show.html.twig */
class __TwigTemplate_650c6ab1bd7754d130441544c9c4c68e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'menu' => array($this, 'block_menu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 5
        $this->displayBlock('menu', $context, $blocks);
        // line 8
        echo "
    <h1>Datos del Usuario</h1>

    <br><br>




    <table class=\"record_properties\" border=\"1\" cellspacing=\"9\" cellpadding=\"5\">
        <thead >
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo "</td>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombres"), "html", null, true);
        echo "</td>
                <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "apellidos"), "html", null, true);
        echo "</td>
                <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "cedula"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                  <td colspan=\"4\">

                <img width=\"200px\" id=\"licencias\" src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getContext($context, "filename")), "html", null, true);
        echo "\" data-placement=\"bottom\" title=\"DATOS DE USUARIO\" data-trigger=\"hover\">


                  </td>
            </tr>
        </tbody>
    </table>           



<br><br>
<abbr>these walls</abbr>

        <ul class=\"record_actions\">
    <li><br>
        <a class=\"btn\" href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("control_visitas_usuario");
        echo "\">Regresar</a>
        <a class=\"btn\" href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_edit_control", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Editar</a>
    </li>
</ul>
";
    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        // line 6
        $this->env->loadTemplate("FrontendVisitasBundle:Default:menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Usuario:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 6,  105 => 5,  97 => 51,  93 => 50,  75 => 35,  67 => 30,  63 => 29,  59 => 28,  55 => 27,  34 => 8,  32 => 5,  29 => 3,);
    }
}
