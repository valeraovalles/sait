<?php

/* FrontendVisitasBundle:Usuario:busqueda.html.twig */
class __TwigTemplate_d93b745c3db10ca3a3d2762ad2b54a6f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'menu' => array($this, 'block_menu'),
            'body' => array($this, 'block_body'),
            'cedula' => array($this, 'block_cedula'),
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
    public function block_title($context, array $blocks = array())
    {
        echo "Control Visitas";
    }

    // line 4
    public function block_menu($context, array $blocks = array())
    {
        // line 5
        $this->env->loadTemplate("FrontendVisitasBundle:Default:menu.html.twig")->display($context);
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("body", $context, $blocks);
        echo "


    
    <div class=\"titulo\">Buscar Usuario</div>

    <form novalidate action=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("usuario_busqueda_control");
        echo "\" method=\"post\" 
    ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">

        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "


            <div id=\"operador\">
                <div class=\"form-contenedor\">
                    <div>";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cedula:</div>
                    <div class=\"widgets\" id=\"cedula\">";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cedula"), 'widget');
        echo "</div>
                </div>
            </div> 




       <button class=\"btn\" type=\"submit\">Busqueda</button> 
    </form>



";
        // line 36
        $this->displayBlock('cedula', $context, $blocks);
        // line 51
        echo "






 <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br>
    


    <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/distribucion/operador_new.js"), "html", null, true);
        echo "\"></script>

";
    }

    // line 36
    public function block_cedula($context, array $blocks = array())
    {
        // line 37
        echo "<script language=\"javascript\" type=\"text/javascript\">
var cedula = \$('#cedula').val();
\$.ajax(
{
type: \"POST\",
data: \"cedula=\"+cedula;,
url: \"encontrado\",
success: function(respuesta){
alert (respuesta);
}
}
    );
</script>
";
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Usuario:busqueda.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 69,  172 => 51,  565 => 263,  560 => 261,  555 => 259,  551 => 258,  547 => 257,  539 => 251,  530 => 248,  521 => 244,  517 => 242,  515 => 241,  506 => 237,  500 => 234,  497 => 233,  491 => 230,  485 => 227,  479 => 224,  455 => 209,  447 => 204,  436 => 198,  431 => 197,  428 => 196,  418 => 190,  406 => 182,  388 => 179,  371 => 174,  369 => 173,  350 => 163,  344 => 160,  340 => 158,  338 => 157,  332 => 154,  324 => 149,  316 => 144,  300 => 133,  295 => 130,  289 => 127,  280 => 123,  265 => 116,  253 => 110,  232 => 99,  210 => 88,  202 => 84,  471 => 219,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 195,  421 => 203,  414 => 199,  397 => 191,  390 => 180,  385 => 185,  378 => 181,  373 => 179,  366 => 175,  361 => 173,  347 => 162,  342 => 160,  335 => 156,  330 => 154,  323 => 150,  318 => 148,  311 => 144,  306 => 142,  293 => 135,  274 => 120,  270 => 118,  263 => 117,  255 => 111,  248 => 111,  243 => 109,  236 => 101,  231 => 103,  219 => 92,  212 => 93,  207 => 70,  200 => 83,  195 => 85,  159 => 67,  197 => 62,  544 => 259,  536 => 254,  532 => 249,  527 => 247,  522 => 249,  512 => 240,  504 => 238,  502 => 235,  499 => 236,  493 => 233,  489 => 231,  487 => 228,  484 => 229,  478 => 226,  472 => 223,  463 => 214,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 181,  382 => 173,  377 => 176,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 113,  254 => 108,  242 => 104,  230 => 98,  223 => 92,  218 => 90,  211 => 86,  206 => 86,  194 => 80,  34 => 8,  129 => 52,  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 59,  178 => 102,  118 => 37,  191 => 81,  186 => 56,  179 => 73,  174 => 71,  167 => 66,  155 => 61,  150 => 65,  181 => 74,  153 => 66,  124 => 38,  113 => 36,  104 => 33,  23 => 3,  97 => 41,  76 => 32,  81 => 23,  161 => 52,  152 => 78,  148 => 44,  137 => 43,  102 => 38,  65 => 15,  58 => 18,  184 => 65,  175 => 71,  170 => 66,  192 => 83,  188 => 77,  180 => 78,  146 => 47,  134 => 44,  127 => 51,  110 => 51,  77 => 19,  63 => 16,  100 => 42,  90 => 32,  59 => 22,  53 => 18,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 151,  444 => 149,  440 => 200,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 183,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 178,  379 => 119,  374 => 175,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 166,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 137,  294 => 127,  285 => 125,  283 => 124,  278 => 123,  268 => 117,  264 => 84,  258 => 81,  252 => 80,  247 => 107,  241 => 77,  235 => 98,  229 => 73,  224 => 95,  220 => 70,  214 => 69,  208 => 68,  169 => 53,  143 => 43,  140 => 58,  132 => 53,  128 => 39,  119 => 37,  107 => 40,  71 => 6,  177 => 72,  165 => 81,  160 => 63,  135 => 55,  126 => 58,  114 => 44,  84 => 29,  70 => 21,  67 => 25,  61 => 18,  87 => 30,  31 => 3,  38 => 8,  26 => 1,  93 => 40,  88 => 30,  78 => 26,  46 => 9,  44 => 7,  28 => 4,  201 => 92,  196 => 64,  183 => 79,  171 => 73,  166 => 63,  163 => 62,  158 => 60,  156 => 61,  151 => 50,  142 => 53,  138 => 59,  136 => 57,  121 => 56,  117 => 46,  105 => 35,  91 => 25,  62 => 18,  49 => 8,  21 => 2,  25 => 4,  94 => 36,  89 => 39,  85 => 24,  75 => 20,  68 => 5,  56 => 14,  27 => 4,  24 => 3,  19 => 1,  79 => 24,  72 => 19,  69 => 26,  47 => 8,  40 => 5,  37 => 4,  22 => 2,  246 => 32,  157 => 67,  145 => 46,  139 => 42,  131 => 43,  123 => 43,  120 => 39,  115 => 45,  111 => 41,  108 => 27,  101 => 34,  98 => 33,  96 => 51,  83 => 28,  74 => 22,  66 => 17,  55 => 26,  52 => 11,  50 => 11,  43 => 8,  41 => 12,  35 => 9,  32 => 5,  29 => 3,  209 => 82,  203 => 82,  199 => 65,  193 => 61,  189 => 71,  187 => 66,  182 => 72,  176 => 75,  173 => 67,  168 => 66,  164 => 65,  162 => 65,  154 => 57,  149 => 44,  147 => 61,  144 => 52,  141 => 46,  133 => 41,  130 => 45,  125 => 42,  122 => 49,  116 => 36,  112 => 48,  109 => 62,  106 => 33,  103 => 38,  99 => 38,  95 => 34,  92 => 31,  86 => 35,  82 => 22,  80 => 28,  73 => 27,  64 => 24,  60 => 15,  57 => 20,  54 => 19,  51 => 17,  48 => 14,  45 => 13,  42 => 6,  39 => 6,  36 => 9,  33 => 4,  30 => 7,);
    }
}
