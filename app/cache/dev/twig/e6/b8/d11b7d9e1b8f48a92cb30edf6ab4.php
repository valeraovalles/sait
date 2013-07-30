<?php

/* DistribucionBundle:Paquete:new.html.twig */
class __TwigTemplate_e6b8d11b7d9e1b8f48a92cb30edf6ab4 extends Twig_Template
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
        echo "Distribucion";
    }

    // line 6
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 7
        echo "    PAQUETES - NUEVO
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <div class=\"titulo\">CREAR PAQUETES</div>

    <form novalidate class=\"formNewEditOperador\" action=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("paquete_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">

        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "

        <fieldset>
            <legend id=\"a\"><div class=\"divisor\">CREAR PAQUETE</div></legend>

            <div class=\"form-contenedor\">
                <div>";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "paquete"), 'errors');
        echo "</div>
                <div class=\"labels\">Paquete:</div>
                <div class=\"widgets\">";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "paquete"), 'widget');
        echo "</div>
            </div>
        </fieldset>

        <br>
        <p>
            <button class=\"btn\" type=\"submit\">Crear</button> |

            <a class=\"btn\" href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("paquete");
        echo "\">
                Ir a lista
            </a>
        </p>
    </form>


";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Paquete:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 45,  191 => 81,  186 => 79,  179 => 75,  174 => 61,  167 => 69,  155 => 55,  150 => 53,  181 => 66,  153 => 47,  124 => 55,  113 => 42,  104 => 42,  23 => 3,  97 => 40,  76 => 26,  81 => 31,  161 => 69,  152 => 66,  148 => 65,  137 => 57,  102 => 37,  65 => 22,  58 => 14,  184 => 77,  175 => 71,  170 => 83,  192 => 84,  188 => 83,  180 => 78,  146 => 52,  134 => 49,  127 => 47,  110 => 43,  77 => 23,  63 => 16,  100 => 37,  90 => 31,  59 => 16,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 57,  140 => 55,  132 => 51,  128 => 25,  119 => 45,  107 => 39,  71 => 24,  177 => 65,  165 => 81,  160 => 49,  135 => 47,  126 => 47,  114 => 44,  84 => 27,  70 => 23,  67 => 23,  61 => 19,  87 => 34,  31 => 4,  38 => 7,  26 => 1,  93 => 28,  88 => 22,  78 => 22,  46 => 9,  44 => 11,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 71,  163 => 65,  158 => 63,  156 => 75,  151 => 59,  142 => 51,  138 => 50,  136 => 27,  121 => 48,  117 => 51,  105 => 39,  91 => 25,  62 => 18,  49 => 8,  21 => 2,  25 => 3,  94 => 32,  89 => 30,  85 => 34,  75 => 20,  68 => 23,  56 => 21,  27 => 4,  24 => 3,  19 => 1,  79 => 21,  72 => 19,  69 => 24,  47 => 12,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 42,  131 => 59,  123 => 47,  120 => 40,  115 => 44,  111 => 49,  108 => 40,  101 => 41,  98 => 36,  96 => 39,  83 => 27,  74 => 21,  66 => 16,  55 => 14,  52 => 10,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 86,  193 => 73,  189 => 71,  187 => 58,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 57,  154 => 54,  149 => 71,  147 => 44,  144 => 53,  141 => 51,  133 => 41,  130 => 48,  125 => 44,  122 => 46,  116 => 45,  112 => 43,  109 => 39,  106 => 31,  103 => 38,  99 => 33,  95 => 33,  92 => 30,  86 => 27,  82 => 31,  80 => 26,  73 => 20,  64 => 17,  60 => 15,  57 => 15,  54 => 16,  51 => 14,  48 => 16,  45 => 12,  42 => 7,  39 => 7,  36 => 6,  33 => 4,  30 => 3,);
    }
}
