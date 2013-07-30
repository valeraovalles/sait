<?php

/* LicenciasBundle:Licencias:edit.html.twig */
class __TwigTemplate_bf69f32789bc0084fd5f01a199c07ef8 extends Twig_Template
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Licencia - Editar";
    }

    // line 4
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 5
        echo "    LICENCIAS
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <div class=\"titulo\">EDITAR LICENCIA</div>
    <div class=\"form-show\"><br>
    <form action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "edit_form"), 'enctype');
;
        echo ">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
       
        <div class=\"form-contenedor\">
            ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "nombre"), 'errors');
        echo "
            <div class=\"labels\">Nombre:</div>
            <div class=\"widgets\">";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "nombre"), 'widget');
        echo "</div>
        </div>
        <div class=\"form-contenedor\">
            ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "fechaCompra"), 'errors');
        echo "
            <div class=\"labels\">Fecha de Compra:</div>
            <div class=\"widgets\">";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "fechaCompra"), 'widget');
        echo "</div>
        </div>
        <div class=\"form-contenedor\">
            ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "fechaVencimiento"), 'errors');
        echo "
            <div class=\"labels\">Fecha de Vencimiento:</div>
            <div class=\"widgets\">";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "fechaVencimiento"), 'widget');
        echo "</div>
        </div>
        <div class=\"form-contenedor\">
            ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "descripcion"), 'errors');
        echo "
            <div class=\"labels\">Descripcion:</div>
            <div class=\"widgets\">";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "descripcion"), 'widget');
        echo "</div>
        </div>
        <div class=\"form-contenedor\">
            ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "tipo"), 'errors');
        echo "
            <div class=\"labels\">Tipo de Licencia:</div>
            <div class=\"widgets\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "tipo"), 'widget');
        echo "</div>
        </div>
        <div class=\"form-contenedor\">
            ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "codigo"), 'errors');
        echo "
            <div class=\"labels\">Codigo:</div>
            <div class=\"widgets\">";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "codigo"), 'widget');
        echo "</div>
        </div>
       
        <form action=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "edit_form"), 'enctype');
;
        echo ">
            <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
    
            <p>
                <button type=\"submit\" class=\"btn\">Editar</button>
                <a class=\"btn btn-danger\" href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
        echo "\">Eliminar</a> &nbsp;
            </p>
        </form>
    </form>
    </div><br>
    <p>
        <a class=\"btn\" href=\"";
        // line 58
        echo $this->env->getExtension('routing')->getPath($this->getContext($context, "retorno"));
        echo "\">Listado</a>
        
    </p>
 <br><br>

        

";
    }

    public function getTemplateName()
    {
        return "LicenciasBundle:Licencias:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 69,  172 => 51,  565 => 263,  560 => 261,  555 => 259,  551 => 258,  547 => 257,  539 => 251,  530 => 248,  521 => 244,  517 => 242,  515 => 241,  506 => 237,  500 => 234,  497 => 233,  491 => 230,  485 => 227,  479 => 224,  455 => 209,  447 => 204,  436 => 198,  431 => 197,  428 => 196,  418 => 190,  406 => 182,  388 => 179,  371 => 174,  369 => 173,  350 => 163,  344 => 160,  340 => 158,  338 => 157,  332 => 154,  324 => 149,  316 => 144,  300 => 133,  295 => 130,  289 => 127,  280 => 123,  265 => 116,  253 => 110,  232 => 99,  210 => 88,  202 => 84,  471 => 219,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 195,  421 => 203,  414 => 199,  397 => 191,  390 => 180,  385 => 185,  378 => 181,  373 => 179,  366 => 175,  361 => 173,  347 => 162,  342 => 160,  335 => 156,  330 => 154,  323 => 150,  318 => 148,  311 => 144,  306 => 142,  293 => 135,  274 => 120,  270 => 118,  263 => 117,  255 => 111,  248 => 111,  243 => 109,  236 => 101,  231 => 103,  219 => 92,  212 => 93,  207 => 70,  200 => 83,  195 => 85,  159 => 67,  197 => 62,  544 => 259,  536 => 254,  532 => 249,  527 => 247,  522 => 249,  512 => 240,  504 => 238,  502 => 235,  499 => 236,  493 => 233,  489 => 231,  487 => 228,  484 => 229,  478 => 226,  472 => 223,  463 => 214,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 181,  382 => 173,  377 => 176,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 113,  254 => 108,  242 => 104,  230 => 98,  223 => 92,  218 => 90,  211 => 86,  206 => 86,  194 => 80,  34 => 8,  129 => 47,  217 => 77,  213 => 89,  198 => 80,  190 => 75,  185 => 59,  178 => 102,  118 => 42,  191 => 81,  186 => 56,  179 => 73,  174 => 71,  167 => 66,  155 => 61,  150 => 65,  181 => 74,  153 => 66,  124 => 38,  113 => 36,  104 => 33,  23 => 3,  97 => 51,  76 => 32,  81 => 34,  161 => 52,  152 => 64,  148 => 44,  137 => 43,  102 => 38,  65 => 22,  58 => 18,  184 => 65,  175 => 88,  170 => 66,  192 => 83,  188 => 77,  180 => 78,  146 => 47,  134 => 44,  127 => 51,  110 => 51,  77 => 19,  63 => 17,  100 => 42,  90 => 29,  59 => 28,  53 => 13,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 151,  444 => 149,  440 => 200,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 183,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 178,  379 => 119,  374 => 175,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 166,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 137,  294 => 127,  285 => 125,  283 => 124,  278 => 123,  268 => 117,  264 => 84,  258 => 81,  252 => 80,  247 => 107,  241 => 77,  235 => 98,  229 => 73,  224 => 95,  220 => 70,  214 => 76,  208 => 119,  169 => 53,  143 => 43,  140 => 52,  132 => 53,  128 => 39,  119 => 37,  107 => 37,  71 => 6,  177 => 72,  165 => 71,  160 => 63,  135 => 55,  126 => 58,  114 => 44,  84 => 29,  70 => 21,  67 => 26,  61 => 33,  87 => 30,  31 => 4,  38 => 8,  26 => 1,  93 => 32,  88 => 30,  78 => 26,  46 => 14,  44 => 9,  28 => 3,  201 => 92,  196 => 64,  183 => 79,  171 => 73,  166 => 63,  163 => 62,  158 => 60,  156 => 61,  151 => 50,  142 => 53,  138 => 59,  136 => 57,  121 => 56,  117 => 5,  105 => 5,  91 => 41,  62 => 23,  49 => 20,  21 => 2,  25 => 4,  94 => 44,  89 => 42,  85 => 27,  75 => 35,  68 => 19,  56 => 22,  27 => 4,  24 => 3,  19 => 1,  79 => 24,  72 => 25,  69 => 26,  47 => 10,  40 => 5,  37 => 4,  22 => 2,  246 => 32,  157 => 66,  145 => 46,  139 => 57,  131 => 43,  123 => 44,  120 => 6,  115 => 45,  111 => 41,  108 => 6,  101 => 34,  98 => 33,  96 => 32,  83 => 28,  74 => 22,  66 => 20,  55 => 27,  52 => 11,  50 => 13,  43 => 7,  41 => 12,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 65,  193 => 61,  189 => 71,  187 => 66,  182 => 72,  176 => 75,  173 => 76,  168 => 66,  164 => 65,  162 => 65,  154 => 57,  149 => 58,  147 => 61,  144 => 59,  141 => 46,  133 => 41,  130 => 45,  125 => 42,  122 => 49,  116 => 36,  112 => 39,  109 => 62,  106 => 33,  103 => 39,  99 => 35,  95 => 34,  92 => 31,  86 => 28,  82 => 27,  80 => 28,  73 => 27,  64 => 22,  60 => 22,  57 => 20,  54 => 15,  51 => 17,  48 => 14,  45 => 13,  42 => 11,  39 => 5,  36 => 4,  33 => 4,  30 => 2,);
    }
}
