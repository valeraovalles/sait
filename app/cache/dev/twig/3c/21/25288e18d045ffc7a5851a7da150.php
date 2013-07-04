<?php

/* DistribucionBundle:Tipooperador:show.html.twig */
class __TwigTemplate_3c2125288e18d045ffc7a5851a7da150 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::distribucion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::distribucion.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "DISTRIBUCIÓN";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    TIPO DE OPERADOR - CONSULTA
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
";
        // line 11
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"titulo\">CONSULTA TIPO DE OPERADOR</div>

    ";
        // line 15
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "started")) {
            // line 16
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 17
                echo "            <div class=\"Greenflash-notice\">
                ";
                // line 18
                echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "    ";
        }
        // line 22
        echo "
    <div class=\"form-show\">

        <div class=\"contenedor\">
            <div class=\"labelshow\">Id:</div>
            <div class=\"dato\">";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Tipo:</div>
            <div class=\"dato\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "operador"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">Código:</div>
                <div class=\"dato\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "codigo"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">Última Modificación:</div>
                <div class=\"dato\">";
        // line 42
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "primernombre")), "html", null, true);
        // line 43
        echo " ";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "primerapellido")), "html", null, true);
        // line 44
        echo "</div>
        </div>

    </div>

    <br>

    <a class=\"btn\" href=\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath("tipooperador");
        echo "\">
        Ir a lista
    </a>
    |
    <a class=\"btn\" href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tipooperador_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">
        Ir a editar
    </a>
    <br><br>
    <form action=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tipooperador_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('¿Seguro que desea borrar?')\">
        <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
        ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "delete_form"), 'widget');
        echo "
        <button class=\"btn btn-danger\" type=\"submit\">Borrar</button>
    </form>

    <br><br>
";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Tipooperador:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 61,  138 => 59,  131 => 55,  124 => 51,  115 => 44,  112 => 43,  110 => 42,  102 => 37,  94 => 32,  86 => 27,  79 => 22,  76 => 21,  67 => 18,  64 => 17,  59 => 16,  57 => 15,  50 => 11,  47 => 10,  44 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
