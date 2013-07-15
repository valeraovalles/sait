<?php

/* FrontendVisitasBundle:Usuario:index.html.twig */
class __TwigTemplate_627046f18051a2dfdb7650709f896c95 extends Twig_Template
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

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayBlock('menu', $context, $blocks);
        // line 15
        echo "




<br>
    <h1>Listado de visitantes</h1>

<script>

\$(document).ready( function () {
    \$('#id').dataTable();
} );


</script>



    <table class=\"records_list\" id=\"id\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 45
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 46
            echo "            <tr>
                <td><a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_show_control", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
            echo "</a></td>
                <td>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombres"), "html", null, true);
            echo "</td>
                <td>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "apellidos"), "html", null, true);
            echo "</td>
                <td>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "cedula"), "html", null, true);
            echo "</td>
                <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_show_control", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\"><i class=\"icon-user icon-eye-open\"></i></a>

                        <a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_edit_control", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\"><i class=\"icon-user icon-edit\"></i></a>
                    </li>
                </ul>
                </td>


            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "        </tbody>
    </table>                   
    <br><br>

    ";
    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        // line 13
        $this->env->loadTemplate("FrontendVisitasBundle:Default:menu.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Usuario:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 13,  121 => 12,  113 => 64,  99 => 56,  94 => 54,  87 => 50,  83 => 49,  79 => 48,  73 => 47,  70 => 46,  66 => 45,  34 => 15,  32 => 12,  29 => 10,);
    }
}
