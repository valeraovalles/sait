<?php

/* DistribucionBundle:Satelite:new.html.twig */
class __TwigTemplate_191c4acea21c4cd70563b6df1aa696e4 extends Twig_Template
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
        echo "Distribucion - Telesur";
    }

    // line 6
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 7
        echo "    OPERADORES
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <div class=\"titulo\">CREAR SATÉLITE</div>
    <form novalidate action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("satelite_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "

        <div class=\"form-contenedor\">
            <div>";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "satelite"), 'errors');
        echo "</div>
            <div class=\"labels\">Satelite:</div>
            <div class=\"widgets\">";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "satelite"), 'widget');
        echo "</div>
        </div>  
            
        <div class=\"form-contenedor\">
            <div>";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "transponder"), 'errors');
        echo "</div>
            <div class=\"labels\">Transponder:</div>
            <div class=\"widgets\">";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "transponder"), 'widget');
        echo "</div>
        </div>  

        <div class=\"form-contenedor\">
            <div>";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "frecuencia"), 'errors');
        echo "</div>
            <div class=\"labels\">Frecuencia:</div>
            <div class=\"widgets\">";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "frecuencia"), 'widget');
        echo "</div>
        </div>  
            
        <div class=\"form-contenedor\">
            <div>";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "polarizacion"), 'errors');
        echo "</div>
            <div class=\"labels\">Polarizacion:</div>
            <div class=\"widgets\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "polarizacion"), 'widget');
        echo "</div>
        </div>

        <div class=\"form-contenedor\">
            <div>";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "modulacion"), 'errors');
        echo "</div>
            <div class=\"labels\">Modulacion:</div>
            <div class=\"widgets\">";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "modulacion"), 'widget');
        echo "</div>
        </div>  
            
        <div class=\"form-contenedor\">
            <div>";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "symbolrate"), 'errors');
        echo "</div>
            <div class=\"labels\">Symbolrate:</div>
            <div class=\"widgets\">";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "symbolrate"), 'widget');
        echo "</div>
        </div>

        <div class=\"form-contenedor\">
            <div>";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "fec"), 'errors');
        echo "</div>
            <div class=\"labels\">Fec:</div>
            <div class=\"widgets\">";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "fec"), 'widget');
        echo "</div>
        </div>  
            
        <div class=\"form-contenedor\">
            <div>";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "sid"), 'errors');
        echo "</div>
            <div class=\"labels\">Sid:</div>
            <div class=\"widgets\">";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "sid"), 'widget');
        echo "</div>
        </div>

        <div class=\"form-contenedor\">
            <div>";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "videopid"), 'errors');
        echo "</div>
            <div class=\"labels\">Videopid:</div>
            <div class=\"widgets\">";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "videopid"), 'widget');
        echo "</div>
        </div>  
            
        <div class=\"form-contenedor\">
            <div>";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "audiopid"), 'errors');
        echo "</div>
            <div class=\"labels\">Audiopid:</div>
            <div class=\"widgets\">";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "audiopid"), 'widget');
        echo "</div>
        </div>

        <div class=\"form-contenedor\">
            <div>";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tvro"), 'errors');
        echo "</div>
            <div class=\"labels\">Tvro:</div>
            <div class=\"widgets\">";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tvro"), 'widget');
        echo "</div>
        </div>

        <br>
        <button class=\"btn\" type=\"submit\">Crear</button> |
        <a class=\"btn\" href=\"";
        // line 86
        echo $this->env->getExtension('routing')->getPath("satelite");
        echo "\">Volver</a>
    </form>



";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Satelite:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 81,  186 => 79,  179 => 75,  174 => 73,  167 => 69,  155 => 63,  150 => 61,  181 => 54,  153 => 47,  124 => 51,  113 => 42,  104 => 36,  23 => 3,  97 => 40,  76 => 21,  81 => 31,  161 => 69,  152 => 66,  148 => 65,  137 => 57,  102 => 37,  65 => 22,  58 => 14,  184 => 77,  175 => 71,  170 => 69,  192 => 84,  188 => 83,  180 => 78,  146 => 57,  134 => 51,  127 => 47,  110 => 42,  77 => 23,  63 => 16,  100 => 37,  90 => 31,  59 => 16,  53 => 15,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 57,  140 => 55,  132 => 51,  128 => 25,  119 => 45,  107 => 39,  71 => 21,  177 => 65,  165 => 64,  160 => 49,  135 => 47,  126 => 49,  114 => 43,  84 => 27,  70 => 23,  67 => 23,  61 => 17,  87 => 31,  31 => 4,  38 => 7,  26 => 1,  93 => 28,  88 => 22,  78 => 25,  46 => 9,  44 => 11,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 71,  163 => 65,  158 => 63,  156 => 67,  151 => 59,  142 => 26,  138 => 55,  136 => 27,  121 => 48,  117 => 44,  105 => 39,  91 => 25,  62 => 21,  49 => 8,  21 => 2,  25 => 3,  94 => 32,  89 => 20,  85 => 34,  75 => 20,  68 => 23,  56 => 21,  27 => 4,  24 => 3,  19 => 1,  79 => 21,  72 => 19,  69 => 24,  47 => 12,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 56,  145 => 46,  139 => 42,  131 => 51,  123 => 47,  120 => 40,  115 => 44,  111 => 49,  108 => 40,  101 => 45,  98 => 37,  96 => 25,  83 => 27,  74 => 21,  66 => 19,  55 => 14,  52 => 10,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 86,  193 => 73,  189 => 71,  187 => 58,  182 => 66,  176 => 64,  173 => 74,  168 => 66,  164 => 59,  162 => 67,  154 => 54,  149 => 51,  147 => 44,  144 => 53,  141 => 51,  133 => 41,  130 => 53,  125 => 44,  122 => 45,  116 => 45,  112 => 43,  109 => 39,  106 => 31,  103 => 30,  99 => 33,  95 => 33,  92 => 30,  86 => 27,  82 => 22,  80 => 26,  73 => 19,  64 => 17,  60 => 16,  57 => 15,  54 => 16,  51 => 14,  48 => 16,  45 => 12,  42 => 7,  39 => 7,  36 => 6,  33 => 4,  30 => 3,);
    }
}
