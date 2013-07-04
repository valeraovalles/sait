<?php

/* FrontendVisitasBundle:Usuario:new.html.twig */
class __TwigTemplate_44b62716740f61d9c1dd8d03ab7f238d extends Twig_Template
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
        echo "<h1>Usuario creation</h1>

    <form action=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("usuario_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
        <p>
            <button type=\"submit\">Create</button>
        </p>
    </form>

        <ul class=\"record_actions\">
    <li>
        <a class=\"btn\" href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("usuario");
        echo "\">
            Back to the list
        </a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Usuario:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 15,  42 => 7,  35 => 6,  31 => 4,  28 => 3,);
    }
}
