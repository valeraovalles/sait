<?php

/* FrontendVisitasBundle:Usuario:edit.html.twig */
class __TwigTemplate_850377fccc1f75761b5496dc65ecf8ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
        // line 4
        echo "<h1>Usuario edit</h1>

    <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_update_control", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "edit_form"), 'enctype');
;
        echo ">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
        ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "edit_form"), 'widget');
        echo "
        <p>
            <button type=\"submit\">Editar</button>
        </p>
    </form>

        <ul class=\"record_actions\">
    <li>
        <a class=\"btn\" href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("control_visitas_usuario");
        echo "\">Regresar</a>
        </form>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Usuario:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 16,  43 => 8,  35 => 6,  31 => 4,  28 => 3,);
    }
}
