<?php

/* DistribucionBundle:Representante:edit.html.twig */
class __TwigTemplate_2f63ba2f63c3b73dae7c61d14a07f87f extends Twig_Template
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
        echo "    DISTRIBUCIÓN - EDITAR REPRESENTANTE
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"titulo\">EDITAR REPRESENTANTE ";
        // line 14
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombres")), "html", null, true);
        echo "<br>OPERADOR ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "operador"), "nombre")), "html", null, true);
        echo "</div>

    ";
        // line 16
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "started")) {
            // line 17
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 18
                echo "            <div class=\"Greenflash-notice\">
                ";
                // line 19
                echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "    ";
        }
        // line 23
        echo "
    <form novalidate class=\"formNewEditOperador\" action=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("representante_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "edit_form"), 'enctype');
;
        echo ">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\" />

        ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "_token"), 'widget');
        echo "
        <fieldset>
            <legend id=\"c\"><div class=\"divisor\">DATOS DE REPRESENTANTE</div> </legend>
                <div class=\"form-contenedor\">
                    <div>";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "nombres"), 'errors');
        echo "</div>
                    <div class=\"labels\">Nombres:</div>
                    <div class=\"widgets\">";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "nombres"), 'widget');
        echo "</div>
                </div>  

                <div class=\"form-contenedor\">
                    <div>";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "apellidos"), 'errors');
        echo "</div>
                    <div class=\"labels\">Apellidos:</div>
                    <div class=\"widgets\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "apellidos"), 'widget');
        echo "</div>
                </div>  

                <div class=\"form-contenedor\">
                    <div>";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "cargo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cargo:</div>
                    <div class=\"widgets\">";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "cargo"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "correo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Correo:</div>
                    <div class=\"widgets\">";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "correo"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "telefono1"), 'errors');
        echo "</div>
                    <div class=\"labels\">Telefono1:</div>
                    <div class=\"widgets\">";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "telefono1"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "telefono2"), 'errors');
        echo "</div>
                    <div class=\"labels\">Telefono2:</div>
                    <div class=\"widgets\">";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "telefono2"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "fax"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fax:</div>
                    <div class=\"widgets\">";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "fax"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "observacion"), 'widget');
        echo "</div>
                </div> 


                <div style=\"display:none;\">
                    <div>";
        // line 80
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "operador"), 'errors');
        echo "</div>
                    <div class=\"labels\">Operador:</div>
                    <div class=\"widgets\">";
        // line 82
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "operador"), 'widget');
        echo "</div>
                </div> 
            </fieldset>

<br>
        <p>
            <button class=\"btn\" type=\"submit\">Editar</button> | 
            <a class=\"btn\" href=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("representante", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Ir a la lista</a> | 
            <a class=\"btn\" href=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_show", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "operador"), "id"))), "html", null, true);
        echo "\">Ir al operador</a>
        </p>
    </form>

";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Representante:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 73,  178 => 69,  118 => 39,  191 => 81,  186 => 79,  179 => 75,  174 => 61,  167 => 69,  155 => 55,  150 => 53,  181 => 66,  153 => 47,  124 => 38,  113 => 37,  104 => 38,  23 => 3,  97 => 40,  76 => 21,  81 => 31,  161 => 61,  152 => 66,  148 => 65,  137 => 49,  102 => 37,  65 => 22,  58 => 14,  184 => 77,  175 => 71,  170 => 49,  192 => 84,  188 => 83,  180 => 78,  146 => 52,  134 => 49,  127 => 47,  110 => 43,  77 => 23,  63 => 16,  100 => 37,  90 => 31,  59 => 16,  53 => 14,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 57,  140 => 55,  132 => 51,  128 => 25,  119 => 45,  107 => 37,  71 => 24,  177 => 65,  165 => 81,  160 => 49,  135 => 47,  126 => 47,  114 => 44,  84 => 27,  70 => 19,  67 => 18,  61 => 19,  87 => 34,  31 => 4,  38 => 7,  26 => 1,  93 => 28,  88 => 22,  78 => 22,  46 => 9,  44 => 11,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 63,  163 => 65,  158 => 63,  156 => 75,  151 => 59,  142 => 51,  138 => 50,  136 => 57,  121 => 48,  117 => 51,  105 => 39,  91 => 25,  62 => 17,  49 => 8,  21 => 2,  25 => 3,  94 => 27,  89 => 30,  85 => 24,  75 => 20,  68 => 23,  56 => 21,  27 => 4,  24 => 3,  19 => 1,  79 => 22,  72 => 19,  69 => 24,  47 => 12,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 42,  131 => 39,  123 => 47,  120 => 40,  115 => 45,  111 => 49,  108 => 40,  101 => 31,  98 => 36,  96 => 39,  83 => 27,  74 => 21,  66 => 16,  55 => 14,  52 => 10,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 86,  193 => 73,  189 => 71,  187 => 58,  182 => 66,  176 => 53,  173 => 67,  168 => 66,  164 => 59,  162 => 57,  154 => 57,  149 => 55,  147 => 44,  144 => 53,  141 => 51,  133 => 41,  130 => 45,  125 => 43,  122 => 49,  116 => 45,  112 => 43,  109 => 39,  106 => 33,  103 => 38,  99 => 33,  95 => 27,  92 => 30,  86 => 27,  82 => 23,  80 => 26,  73 => 20,  64 => 17,  60 => 16,  57 => 15,  54 => 16,  51 => 14,  48 => 16,  45 => 12,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
