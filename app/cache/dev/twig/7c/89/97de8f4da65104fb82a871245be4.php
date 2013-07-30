<?php

/* DistribucionBundle:Objetocomodato:edit.html.twig */
class __TwigTemplate_7c8997de8f4da65104fb82a871245be4 extends Twig_Template
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
        echo "    DISTRIBUCIÓN - EDITAR OBJETO DE COMODATO
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"titulo\">EDITAR OBJETO DE COMODATO \"";
        // line 12
        echo twig_escape_filter($this->env, twig_slice($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "objeto")), 0, 15), "html", null, true);
        echo "...\"</div>

    <form novalidate class=\"formNewEditOperador\" action=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("objetocomodato_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "edit_form"), 'enctype');
;
        echo ">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "_token"), 'widget');
        echo "

         <fieldset>
            <legend id=\"a\"><div class=\"divisor\">EDITAR OBJETO DE COMODATO</div></legend>
                <div class=\"form-contenedor\">
                    <div>";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "objeto"), 'errors');
        echo "</div>
                    <div class=\"labels\">Objeto:</div>
                    <div class=\"widgets\">";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "objeto"), 'widget');
        echo "</div>
                </div>
        </fieldset>
        <br>
        <p>
            <button class=\"btn\" type=\"submit\">Editar</button> |

            <a class=\"btn\" href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("objetocomodato");
        echo "\">
                Ir a la lista
            </a>
        </p>
    </form>

    <form action=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("objetocomodato_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('¿Seguro que desea borrar?')\">
        <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
        ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "delete_form"), 'widget');
        echo "
        <button class=\"btn btn-danger\" type=\"submit\">Borrar</button>
    </form>

";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Objetocomodato:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  565 => 263,  560 => 261,  555 => 259,  551 => 258,  547 => 257,  539 => 251,  530 => 248,  521 => 244,  517 => 242,  515 => 241,  506 => 237,  500 => 234,  497 => 233,  491 => 230,  485 => 227,  479 => 224,  455 => 209,  447 => 204,  436 => 198,  431 => 197,  428 => 196,  418 => 190,  406 => 182,  388 => 179,  371 => 174,  369 => 173,  350 => 163,  344 => 160,  340 => 158,  338 => 157,  332 => 154,  324 => 149,  316 => 144,  300 => 133,  295 => 130,  289 => 127,  280 => 123,  265 => 116,  253 => 110,  232 => 99,  210 => 88,  202 => 84,  471 => 219,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 195,  421 => 203,  414 => 199,  397 => 191,  390 => 180,  385 => 185,  378 => 181,  373 => 179,  366 => 175,  361 => 173,  347 => 162,  342 => 160,  335 => 156,  330 => 154,  323 => 150,  318 => 148,  311 => 144,  306 => 142,  293 => 135,  274 => 120,  270 => 118,  263 => 117,  255 => 111,  248 => 111,  243 => 109,  236 => 101,  231 => 103,  219 => 92,  212 => 93,  207 => 91,  200 => 83,  195 => 85,  159 => 67,  197 => 62,  544 => 259,  536 => 254,  532 => 249,  527 => 247,  522 => 249,  512 => 240,  504 => 238,  502 => 235,  499 => 236,  493 => 233,  489 => 231,  487 => 228,  484 => 229,  478 => 226,  472 => 223,  463 => 214,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 181,  382 => 173,  377 => 176,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 113,  254 => 108,  242 => 104,  230 => 98,  223 => 92,  218 => 90,  211 => 86,  206 => 86,  194 => 80,  34 => 11,  129 => 52,  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 59,  178 => 54,  118 => 37,  191 => 81,  186 => 56,  179 => 73,  174 => 71,  167 => 66,  155 => 61,  150 => 58,  181 => 74,  153 => 66,  124 => 38,  113 => 36,  104 => 39,  23 => 3,  97 => 37,  76 => 23,  81 => 23,  161 => 61,  152 => 59,  148 => 44,  137 => 48,  102 => 39,  65 => 15,  58 => 14,  184 => 77,  175 => 71,  170 => 66,  192 => 83,  188 => 77,  180 => 78,  146 => 55,  134 => 48,  127 => 43,  110 => 37,  77 => 19,  63 => 16,  100 => 25,  90 => 32,  59 => 16,  53 => 12,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 151,  444 => 149,  440 => 200,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 183,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 178,  379 => 119,  374 => 175,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 166,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 137,  294 => 127,  285 => 125,  283 => 124,  278 => 123,  268 => 117,  264 => 84,  258 => 81,  252 => 80,  247 => 107,  241 => 77,  235 => 98,  229 => 73,  224 => 95,  220 => 70,  214 => 69,  208 => 68,  169 => 50,  143 => 55,  140 => 57,  132 => 40,  128 => 39,  119 => 50,  107 => 37,  71 => 20,  177 => 72,  165 => 81,  160 => 63,  135 => 55,  126 => 47,  114 => 48,  84 => 27,  70 => 19,  67 => 18,  61 => 18,  87 => 31,  31 => 4,  38 => 8,  26 => 1,  93 => 24,  88 => 31,  78 => 29,  46 => 9,  44 => 9,  28 => 6,  201 => 92,  196 => 81,  183 => 79,  171 => 73,  166 => 63,  163 => 62,  158 => 60,  156 => 61,  151 => 59,  142 => 53,  138 => 59,  136 => 41,  121 => 42,  117 => 46,  105 => 35,  91 => 34,  62 => 18,  49 => 8,  21 => 2,  25 => 3,  94 => 33,  89 => 30,  85 => 24,  75 => 20,  68 => 21,  56 => 17,  27 => 4,  24 => 3,  19 => 1,  79 => 23,  72 => 19,  69 => 17,  47 => 10,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 67,  145 => 46,  139 => 42,  131 => 49,  123 => 43,  120 => 37,  115 => 36,  111 => 41,  108 => 27,  101 => 31,  98 => 36,  96 => 39,  83 => 22,  74 => 21,  66 => 16,  55 => 14,  52 => 11,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 80,  193 => 61,  189 => 71,  187 => 74,  182 => 72,  176 => 75,  173 => 67,  168 => 66,  164 => 65,  162 => 65,  154 => 57,  149 => 44,  147 => 61,  144 => 52,  141 => 42,  133 => 41,  130 => 45,  125 => 42,  122 => 43,  116 => 36,  112 => 43,  109 => 35,  106 => 33,  103 => 38,  99 => 38,  95 => 31,  92 => 33,  86 => 23,  82 => 30,  80 => 26,  73 => 23,  64 => 16,  60 => 15,  57 => 15,  54 => 16,  51 => 11,  48 => 16,  45 => 7,  42 => 6,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
