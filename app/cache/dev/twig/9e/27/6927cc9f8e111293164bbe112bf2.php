<?php

/* DistribucionBundle:Tipooperador:edit.html.twig */
class __TwigTemplate_9e276927cc9f8e111293164bbe112bf2 extends Twig_Template
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
        echo "Distribución";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    DISTRIBUCIÓN - EDITAR TIPO OPERADOR
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"titulo\">EDITAR TIPO OPERADOR ";
        // line 12
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "operador")), "html", null, true);
        echo "</div>

    <form novalidate class=\"formNewEditOperador\" action=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tipooperador_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "edit_form"), 'enctype');
;
        echo ">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\" />

        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "_token"), 'widget');
        echo "
        <fieldset>
            <legend id=\"a\"><div class=\"divisor\">EDITAR DATOS DE TIPO OPERADOR</div></legend>
                <div class=\"form-contenedor\">
                    <div>";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "operador"), 'errors');
        echo "</div>
                    <div class=\"labels\">Tipo:</div>
                    <div class=\"widgets\">";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "operador"), 'widget');
        echo "</div>
                </div>

  
                <div class=\"form-contenedor\">
                    <div>";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "codigo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Código:</div>
                    <div class=\"widgets\">";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "codigo"), 'widget');
        echo "</div>
                </div>
        </fieldset>
        <br>
            <button class=\"btn\" type=\"submit\">Editar</button> |

            <a class=\"btn\" href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("tipooperador");
        echo "\">Ir a lista</a>
    </form>

    <form action=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tipooperador_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('¿Seguro que desea borrar?')\">
        <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
        ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "delete_form"), 'widget');
        echo "
        <button class=\"btn btn-danger\" type=\"submit\">Borrar</button>
    </form>


";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Tipooperador:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 41,  107 => 39,  101 => 36,  92 => 30,  87 => 28,  79 => 23,  74 => 21,  67 => 17,  58 => 14,  53 => 12,  47 => 10,  44 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
