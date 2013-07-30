<?php

/* DistribucionBundle:Reportes:informativo.html.twig */
class __TwigTemplate_3b293be3b270cc13713029f1a1b10a6b extends Twig_Template
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
        echo "    REPORTES
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <div class=\"titulo\">INGRESE LOS PARÁMETROS</div>

    ";
        // line 16
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "started")) {
            // line 17
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 18
                echo "            <div class=\"Redflash-notice\">
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
    <form class=\"formNewEditOperador\" novalidate action=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("generar_reporte", array("tipo" => "informativo", "formato" => "xls")), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">

        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "

                <div class=\"form-contenedor\">
                    ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "pais"), 'errors');
        echo "
                    <div class=\"labels\">Pais:</div>
                    <div class=\"widgets\">";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "pais"), 'widget');
        echo "</div>
                </div>

                <div id=\"tipooperador\"></div>

    </form>

    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('#form_pais').change(function(){
                \$('#tipooperador').load('/sait/web/app_dev.php/distribucion/ajax/'+\$(\"#form_pais\").val()+'/tipooperador');
            });

        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Reportes:informativo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 55,  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 73,  178 => 69,  118 => 39,  191 => 81,  186 => 79,  179 => 73,  174 => 71,  167 => 67,  155 => 61,  150 => 59,  181 => 66,  153 => 66,  124 => 38,  113 => 37,  104 => 43,  23 => 3,  97 => 40,  76 => 23,  81 => 23,  161 => 61,  152 => 66,  148 => 65,  137 => 49,  102 => 42,  65 => 22,  58 => 14,  184 => 77,  175 => 71,  170 => 70,  192 => 83,  188 => 83,  180 => 78,  146 => 55,  134 => 57,  127 => 47,  110 => 37,  77 => 23,  63 => 14,  100 => 37,  90 => 32,  59 => 16,  53 => 13,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 55,  140 => 55,  132 => 47,  128 => 25,  119 => 50,  107 => 37,  71 => 27,  177 => 65,  165 => 81,  160 => 49,  135 => 47,  126 => 47,  114 => 48,  84 => 27,  70 => 19,  67 => 18,  61 => 18,  87 => 26,  31 => 4,  38 => 7,  26 => 1,  93 => 29,  88 => 34,  78 => 29,  46 => 9,  44 => 11,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 63,  163 => 65,  158 => 61,  156 => 75,  151 => 59,  142 => 51,  138 => 59,  136 => 57,  121 => 48,  117 => 49,  105 => 35,  91 => 25,  62 => 17,  49 => 8,  21 => 2,  25 => 3,  94 => 33,  89 => 30,  85 => 24,  75 => 20,  68 => 23,  56 => 17,  27 => 4,  24 => 3,  19 => 1,  79 => 24,  72 => 24,  69 => 17,  47 => 12,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 67,  145 => 46,  139 => 42,  131 => 49,  123 => 43,  120 => 40,  115 => 45,  111 => 49,  108 => 45,  101 => 31,  98 => 31,  96 => 39,  83 => 25,  74 => 28,  66 => 26,  55 => 14,  52 => 10,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 86,  193 => 73,  189 => 71,  187 => 58,  182 => 66,  176 => 53,  173 => 67,  168 => 66,  164 => 59,  162 => 65,  154 => 57,  149 => 65,  147 => 44,  144 => 62,  141 => 53,  133 => 41,  130 => 45,  125 => 43,  122 => 43,  116 => 45,  112 => 43,  109 => 39,  106 => 33,  103 => 35,  99 => 33,  95 => 31,  92 => 30,  86 => 31,  82 => 30,  80 => 29,  73 => 22,  64 => 19,  60 => 14,  57 => 15,  54 => 16,  51 => 11,  48 => 16,  45 => 12,  42 => 7,  39 => 7,  36 => 6,  33 => 4,  30 => 3,);
    }
}
