<?php

/* FrontendVisitasBundle:Visita:index.html.twig */
class __TwigTemplate_6ccd12a5fc131c3ac688b5ba38f7a95f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Listado de Visitantes</h1>

    <table class=\"records_list\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fechaentrada</th>
                <th>Horaentrada</th>
                <th>Fechasalida</th>
                <th>Horasalida</th>
                <th>Contacto</th>
                <th>Observaciones</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 21
            echo "            <tr>
                <td><a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("visita_show_control", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
            echo "</a></td>
                <td>";
            // line 23
            if ($this->getAttribute($this->getContext($context, "entity"), "fechaentrada")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaentrada"), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "horaentrada"), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            if ($this->getAttribute($this->getContext($context, "entity"), "fechasalida")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechasalida"), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "horasalida"), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "contacto"), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "observaciones"), "html", null, true);
            echo "</td>
                <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("visita_show_control", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">show</a>
                    </li>
                    <li>
                        <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("visita_edit_control", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">edit</a>
                    </li>
                </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "        </tbody>
    </table>
    <br>
        <ul>
        <li>
            <a class=\"btn\" href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("visita_new_control");
        echo "\">
                Create a new entry
            </a>
        </li>
    </ul>
    ";
    }

    public function getTemplateName()
    {
        return "FrontendVisitasBundle:Visita:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 69,  172 => 51,  565 => 263,  560 => 261,  555 => 259,  551 => 258,  547 => 257,  539 => 251,  530 => 248,  521 => 244,  517 => 242,  515 => 241,  506 => 237,  500 => 234,  497 => 233,  491 => 230,  485 => 227,  479 => 224,  455 => 209,  447 => 204,  436 => 198,  431 => 197,  428 => 196,  418 => 190,  406 => 182,  388 => 179,  371 => 174,  369 => 173,  350 => 163,  344 => 160,  340 => 158,  338 => 157,  332 => 154,  324 => 149,  316 => 144,  300 => 133,  295 => 130,  289 => 127,  280 => 123,  265 => 116,  253 => 110,  232 => 99,  210 => 88,  202 => 84,  471 => 219,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 195,  421 => 203,  414 => 199,  397 => 191,  390 => 180,  385 => 185,  378 => 181,  373 => 179,  366 => 175,  361 => 173,  347 => 162,  342 => 160,  335 => 156,  330 => 154,  323 => 150,  318 => 148,  311 => 144,  306 => 142,  293 => 135,  274 => 120,  270 => 118,  263 => 117,  255 => 111,  248 => 111,  243 => 109,  236 => 101,  231 => 103,  219 => 92,  212 => 93,  207 => 70,  200 => 83,  195 => 85,  159 => 67,  197 => 62,  544 => 259,  536 => 254,  532 => 249,  527 => 247,  522 => 249,  512 => 240,  504 => 238,  502 => 235,  499 => 236,  493 => 233,  489 => 231,  487 => 228,  484 => 229,  478 => 226,  472 => 223,  463 => 214,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 181,  382 => 173,  377 => 176,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 113,  254 => 108,  242 => 104,  230 => 98,  223 => 92,  218 => 90,  211 => 86,  206 => 86,  194 => 80,  34 => 8,  129 => 52,  217 => 77,  213 => 89,  198 => 80,  190 => 75,  185 => 59,  178 => 102,  118 => 46,  191 => 81,  186 => 56,  179 => 73,  174 => 71,  167 => 66,  155 => 61,  150 => 65,  181 => 74,  153 => 66,  124 => 38,  113 => 36,  104 => 33,  23 => 3,  97 => 51,  76 => 32,  81 => 34,  161 => 52,  152 => 64,  148 => 44,  137 => 43,  102 => 38,  65 => 22,  58 => 18,  184 => 65,  175 => 88,  170 => 66,  192 => 83,  188 => 77,  180 => 78,  146 => 47,  134 => 44,  127 => 51,  110 => 51,  77 => 19,  63 => 29,  100 => 42,  90 => 32,  59 => 28,  53 => 21,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 151,  444 => 149,  440 => 200,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 183,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 178,  379 => 119,  374 => 175,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 166,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 137,  294 => 127,  285 => 125,  283 => 124,  278 => 123,  268 => 117,  264 => 84,  258 => 81,  252 => 80,  247 => 107,  241 => 77,  235 => 98,  229 => 73,  224 => 95,  220 => 70,  214 => 76,  208 => 119,  169 => 53,  143 => 43,  140 => 58,  132 => 53,  128 => 39,  119 => 37,  107 => 51,  71 => 6,  177 => 72,  165 => 71,  160 => 63,  135 => 55,  126 => 58,  114 => 44,  84 => 29,  70 => 21,  67 => 26,  61 => 33,  87 => 30,  31 => 4,  38 => 8,  26 => 1,  93 => 32,  88 => 30,  78 => 26,  46 => 14,  44 => 9,  28 => 3,  201 => 92,  196 => 64,  183 => 79,  171 => 73,  166 => 63,  163 => 62,  158 => 60,  156 => 61,  151 => 50,  142 => 53,  138 => 59,  136 => 57,  121 => 56,  117 => 5,  105 => 5,  91 => 41,  62 => 23,  49 => 20,  21 => 2,  25 => 4,  94 => 44,  89 => 42,  85 => 24,  75 => 35,  68 => 24,  56 => 22,  27 => 4,  24 => 3,  19 => 1,  79 => 27,  72 => 25,  69 => 26,  47 => 10,  40 => 5,  37 => 4,  22 => 2,  246 => 32,  157 => 66,  145 => 46,  139 => 57,  131 => 43,  123 => 43,  120 => 6,  115 => 45,  111 => 41,  108 => 6,  101 => 34,  98 => 33,  96 => 35,  83 => 28,  74 => 30,  66 => 20,  55 => 27,  52 => 11,  50 => 13,  43 => 7,  41 => 12,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 65,  193 => 61,  189 => 71,  187 => 66,  182 => 72,  176 => 75,  173 => 76,  168 => 66,  164 => 65,  162 => 65,  154 => 57,  149 => 44,  147 => 61,  144 => 59,  141 => 46,  133 => 41,  130 => 45,  125 => 42,  122 => 49,  116 => 36,  112 => 53,  109 => 62,  106 => 33,  103 => 39,  99 => 35,  95 => 34,  92 => 31,  86 => 28,  82 => 27,  80 => 28,  73 => 27,  64 => 22,  60 => 22,  57 => 20,  54 => 15,  51 => 17,  48 => 14,  45 => 13,  42 => 11,  39 => 10,  36 => 6,  33 => 4,  30 => 7,);
    }
}
