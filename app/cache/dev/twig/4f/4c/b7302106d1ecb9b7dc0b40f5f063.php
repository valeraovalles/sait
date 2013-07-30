<?php

/* LicenciasBundle:Licencias:show.html.twig */
class __TwigTemplate_4f4cb7302106d1ecb9b7dc0b40f5f063 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::licencias.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::licencias.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Inicio - Telesur";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    DISTRIBUCIÓN - CONSULTAR - REPRESENTANTE
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


    <div class=\"titulo\">REPRESENTANTE </div>

    <div class=\"form-show\">
        <div class=\"contenedor\">
            <div class=\"labelshow\">Nombres:</div>
            <div class=\"dato\">";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombre"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Fecha de Compra:</div>
            <div class=\"dato\">";
        // line 24
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaCompra"), "Y-m-d"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Fecha de Vencimiento</div>
            <div class=\"dato\">";
        // line 29
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento"), "Y-m-d"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Descripcion</div>
            <div class=\"dato\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "descripcion"), "html", null, true);
        echo "</div>
        </div>       
        <div class=\"contenedor\">
            <div class=\"labelshow\">Tipo de Licencia</div>
            ";
        // line 38
        if (($this->getAttribute($this->getContext($context, "entity"), "tipo") == "l")) {
            // line 39
            echo "                <div class=\"dato\">LICENCIA</div>
            ";
        } elseif (($this->getAttribute($this->getContext($context, "entity"), "tipo") == "s")) {
            // line 41
            echo "                <div class=\"dato\">SERVICIO</div>
            ";
        }
        // line 43
        echo "        </div>
        <div class=\"contenedor\">
            <div class=\"labelshow\">Codigo:</div>
            <div class=\"dato\">";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "codigo"), "html", null, true);
        echo "</div>
        </div>
    </div>

    <br>
        <a class=\"btn\" href=\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath($this->getContext($context, "retorno"));
        echo "\">Listado</a> &nbsp;
        ";
        // line 52
        if (($this->getContext($context, "rol") == 1)) {
            echo "   
        <a class=\"btn\" href=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
            echo "\">Editar</a>
          <br><br>
        <a class=\"btn btn-danger\" href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
            echo "\">Eliminar</a> &nbsp;
        ";
        }
        // line 57
        echo "        <br><br>
      
";
    }

    public function getTemplateName()
    {
        return "LicenciasBundle:Licencias:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 69,  172 => 51,  565 => 263,  560 => 261,  555 => 259,  551 => 258,  547 => 257,  539 => 251,  530 => 248,  521 => 244,  517 => 242,  515 => 241,  506 => 237,  500 => 234,  497 => 233,  491 => 230,  485 => 227,  479 => 224,  455 => 209,  447 => 204,  436 => 198,  431 => 197,  428 => 196,  418 => 190,  406 => 182,  388 => 179,  371 => 174,  369 => 173,  350 => 163,  344 => 160,  340 => 158,  338 => 157,  332 => 154,  324 => 149,  316 => 144,  300 => 133,  295 => 130,  289 => 127,  280 => 123,  265 => 116,  253 => 110,  232 => 99,  210 => 88,  202 => 84,  471 => 219,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 195,  421 => 203,  414 => 199,  397 => 191,  390 => 180,  385 => 185,  378 => 181,  373 => 179,  366 => 175,  361 => 173,  347 => 162,  342 => 160,  335 => 156,  330 => 154,  323 => 150,  318 => 148,  311 => 144,  306 => 142,  293 => 135,  274 => 120,  270 => 118,  263 => 117,  255 => 111,  248 => 111,  243 => 109,  236 => 101,  231 => 103,  219 => 92,  212 => 93,  207 => 70,  200 => 83,  195 => 85,  159 => 67,  197 => 62,  544 => 259,  536 => 254,  532 => 249,  527 => 247,  522 => 249,  512 => 240,  504 => 238,  502 => 235,  499 => 236,  493 => 233,  489 => 231,  487 => 228,  484 => 229,  478 => 226,  472 => 223,  463 => 214,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 181,  382 => 173,  377 => 176,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 113,  254 => 108,  242 => 104,  230 => 98,  223 => 92,  218 => 90,  211 => 86,  206 => 86,  194 => 80,  34 => 4,  129 => 47,  217 => 77,  213 => 89,  198 => 80,  190 => 75,  185 => 59,  178 => 102,  118 => 42,  191 => 81,  186 => 56,  179 => 73,  174 => 71,  167 => 66,  155 => 61,  150 => 65,  181 => 74,  153 => 66,  124 => 38,  113 => 36,  104 => 34,  23 => 3,  97 => 51,  76 => 32,  81 => 34,  161 => 52,  152 => 64,  148 => 44,  137 => 43,  102 => 43,  65 => 22,  58 => 13,  184 => 65,  175 => 88,  170 => 66,  192 => 83,  188 => 77,  180 => 78,  146 => 46,  134 => 44,  127 => 51,  110 => 37,  77 => 29,  63 => 17,  100 => 42,  90 => 29,  59 => 28,  53 => 13,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 151,  444 => 149,  440 => 200,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 183,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 178,  379 => 119,  374 => 175,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 166,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 137,  294 => 127,  285 => 125,  283 => 124,  278 => 123,  268 => 117,  264 => 84,  258 => 81,  252 => 80,  247 => 107,  241 => 77,  235 => 98,  229 => 73,  224 => 95,  220 => 70,  214 => 76,  208 => 119,  169 => 53,  143 => 43,  140 => 52,  132 => 42,  128 => 55,  119 => 52,  107 => 46,  71 => 19,  177 => 72,  165 => 71,  160 => 63,  135 => 55,  126 => 41,  114 => 44,  84 => 29,  70 => 21,  67 => 26,  61 => 19,  87 => 30,  31 => 3,  38 => 8,  26 => 1,  93 => 29,  88 => 27,  78 => 26,  46 => 14,  44 => 9,  28 => 3,  201 => 92,  196 => 64,  183 => 79,  171 => 73,  166 => 63,  163 => 62,  158 => 60,  156 => 61,  151 => 49,  142 => 53,  138 => 59,  136 => 57,  121 => 42,  117 => 5,  105 => 5,  91 => 41,  62 => 23,  49 => 20,  21 => 2,  25 => 4,  94 => 39,  89 => 32,  85 => 34,  75 => 35,  68 => 19,  56 => 14,  27 => 4,  24 => 3,  19 => 1,  79 => 24,  72 => 25,  69 => 24,  47 => 10,  40 => 5,  37 => 4,  22 => 2,  246 => 32,  157 => 50,  145 => 46,  139 => 44,  131 => 43,  123 => 53,  120 => 6,  115 => 51,  111 => 41,  108 => 36,  101 => 34,  98 => 41,  96 => 32,  83 => 28,  74 => 22,  66 => 17,  55 => 27,  52 => 11,  50 => 11,  43 => 7,  41 => 12,  35 => 4,  32 => 3,  29 => 3,  209 => 82,  203 => 82,  199 => 65,  193 => 61,  189 => 71,  187 => 66,  182 => 72,  176 => 75,  173 => 76,  168 => 66,  164 => 65,  162 => 65,  154 => 57,  149 => 58,  147 => 61,  144 => 59,  141 => 46,  133 => 57,  130 => 45,  125 => 42,  122 => 40,  116 => 39,  112 => 39,  109 => 62,  106 => 33,  103 => 39,  99 => 32,  95 => 34,  92 => 38,  86 => 28,  82 => 24,  80 => 28,  73 => 27,  64 => 22,  60 => 14,  57 => 20,  54 => 15,  51 => 17,  48 => 10,  45 => 8,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
