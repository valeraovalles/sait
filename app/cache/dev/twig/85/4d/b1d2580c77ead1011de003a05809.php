<?php

/* DistribucionBundle:Tipooperador:edit.html.twig */
class __TwigTemplate_854db1d2580c77ead1011de003a05809 extends Twig_Template
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "codigo"), 'widget', array("attr" => array("readonly" => "readonly")));
        echo "</div>
                </div>
                
        </fieldset>
        <br>
            <button class=\"btn\" type=\"submit\">Editar</button> |

            <a class=\"btn\" href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("tipooperador");
        echo "\">Ir a lista</a>
    </form>

    <form action=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tipooperador_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('¿Seguro que desea borrar?')\">
        <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
        ";
        // line 42
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
        return array (  113 => 42,  104 => 36,  23 => 3,  97 => 40,  76 => 26,  81 => 31,  161 => 69,  152 => 66,  148 => 65,  137 => 57,  102 => 37,  65 => 22,  58 => 14,  184 => 77,  175 => 71,  170 => 69,  192 => 84,  188 => 83,  180 => 78,  146 => 57,  134 => 51,  127 => 47,  110 => 39,  77 => 23,  63 => 19,  100 => 37,  90 => 8,  59 => 21,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 56,  140 => 55,  132 => 51,  128 => 25,  119 => 42,  107 => 48,  71 => 24,  177 => 65,  165 => 64,  160 => 61,  135 => 47,  126 => 45,  114 => 43,  84 => 27,  70 => 19,  67 => 17,  61 => 21,  87 => 28,  31 => 8,  38 => 7,  26 => 1,  93 => 28,  88 => 22,  78 => 30,  46 => 9,  44 => 9,  28 => 2,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 71,  163 => 65,  158 => 63,  156 => 67,  151 => 59,  142 => 26,  138 => 28,  136 => 27,  121 => 48,  117 => 44,  105 => 39,  91 => 31,  62 => 18,  49 => 8,  21 => 2,  25 => 3,  94 => 9,  89 => 20,  85 => 34,  75 => 16,  68 => 23,  56 => 21,  27 => 4,  24 => 3,  19 => 1,  79 => 23,  72 => 15,  69 => 24,  47 => 10,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 53,  131 => 51,  123 => 47,  120 => 40,  115 => 41,  111 => 49,  108 => 40,  101 => 45,  98 => 37,  96 => 25,  83 => 29,  74 => 21,  66 => 15,  55 => 13,  52 => 10,  50 => 11,  43 => 8,  41 => 9,  35 => 9,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 27,  144 => 53,  141 => 51,  133 => 55,  130 => 53,  125 => 44,  122 => 45,  116 => 45,  112 => 45,  109 => 40,  106 => 31,  103 => 30,  99 => 33,  95 => 35,  92 => 30,  86 => 28,  82 => 25,  80 => 26,  73 => 19,  64 => 23,  60 => 15,  57 => 18,  54 => 16,  51 => 14,  48 => 16,  45 => 12,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
