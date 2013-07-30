<?php

/* SensioDistributionBundle:Configurator:check.html.twig */
class __TwigTemplate_0edb5a5479a425400c1b5b5d1cceaca4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioDistributionBundle::Configurator/layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (twig_length_filter($this->env, $this->getContext($context, "majors"))) {
            // line 5
            echo "        <h1>Major Problems that need to be fixed now</h1>
        <p>
            We have detected <strong>";
            // line 7
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "majors")), "html", null, true);
            echo "</strong> major problems.
            You <em>must</em> fix them before continuing:
        </p>
        <ol>
            ";
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "majors"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 12
                echo "                <li>";
                echo twig_escape_filter($this->env, $this->getContext($context, "message"), "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "        </ol>
    ";
        }
        // line 16
        echo "
    ";
        // line 17
        if (twig_length_filter($this->env, $this->getContext($context, "minors"))) {
            // line 18
            echo "        <h1>Some Recommandations</h1>

        <p>
            ";
            // line 21
            if (twig_length_filter($this->env, $this->getContext($context, "majors"))) {
                // line 22
                echo "            Additionally, we
            ";
            } else {
                // line 24
                echo "            We
            ";
            }
            // line 26
            echo "            have detected some minor problems that we <em>recommend</em> you to fix to have a better Symfony
            experience:

            <ol>
                ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "minors"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 31
                echo "                    <li>";
                echo twig_escape_filter($this->env, $this->getContext($context, "message"), "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "            </ol>
        </p>

    ";
        }
        // line 37
        echo "
    ";
        // line 38
        if ((!twig_length_filter($this->env, $this->getContext($context, "majors")))) {
            // line 39
            echo "        <ul class=\"symfony_list\">
            <li><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getContext($context, "url"), "html", null, true);
            echo "\">Configure your Symfony Application online</a></li>
        </ul>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:check.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  20 => 1,  356 => 328,  339 => 316,  806 => 488,  803 => 487,  792 => 485,  788 => 484,  784 => 482,  771 => 481,  745 => 476,  742 => 475,  723 => 473,  706 => 472,  702 => 470,  698 => 469,  694 => 468,  690 => 467,  686 => 466,  682 => 465,  678 => 464,  675 => 463,  673 => 462,  656 => 461,  645 => 460,  630 => 455,  625 => 453,  621 => 452,  618 => 451,  616 => 450,  602 => 449,  525 => 408,  520 => 406,  244 => 136,  462 => 202,  449 => 198,  446 => 197,  441 => 196,  439 => 195,  429 => 188,  422 => 184,  415 => 180,  401 => 172,  394 => 168,  348 => 140,  329 => 131,  325 => 129,  320 => 127,  286 => 112,  275 => 105,  267 => 101,  262 => 98,  256 => 96,  233 => 87,  226 => 84,  357 => 123,  351 => 141,  327 => 114,  303 => 122,  297 => 276,  291 => 102,  389 => 160,  386 => 159,  380 => 160,  367 => 155,  363 => 126,  345 => 147,  343 => 146,  334 => 141,  331 => 140,  326 => 138,  321 => 112,  315 => 125,  307 => 128,  302 => 125,  296 => 121,  288 => 101,  281 => 114,  276 => 111,  269 => 107,  227 => 86,  222 => 83,  216 => 79,  204 => 69,  172 => 62,  565 => 414,  560 => 261,  555 => 259,  551 => 258,  547 => 411,  539 => 251,  530 => 410,  521 => 244,  517 => 242,  515 => 404,  506 => 237,  500 => 234,  497 => 233,  491 => 230,  485 => 227,  479 => 224,  455 => 209,  447 => 204,  436 => 198,  431 => 189,  428 => 196,  418 => 190,  406 => 182,  388 => 179,  371 => 156,  369 => 173,  350 => 163,  344 => 318,  340 => 145,  338 => 135,  332 => 116,  324 => 113,  316 => 144,  300 => 121,  295 => 275,  289 => 113,  280 => 123,  265 => 96,  253 => 100,  232 => 88,  210 => 77,  202 => 77,  471 => 219,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 195,  421 => 203,  414 => 199,  397 => 191,  390 => 180,  385 => 185,  378 => 157,  373 => 156,  366 => 175,  361 => 146,  347 => 162,  342 => 317,  335 => 134,  330 => 154,  323 => 128,  318 => 111,  311 => 144,  306 => 107,  293 => 120,  274 => 97,  270 => 102,  263 => 95,  255 => 93,  248 => 94,  243 => 92,  236 => 101,  231 => 83,  219 => 92,  212 => 78,  207 => 75,  200 => 72,  195 => 85,  159 => 67,  197 => 71,  544 => 259,  536 => 254,  532 => 249,  527 => 409,  522 => 249,  512 => 240,  504 => 238,  502 => 235,  499 => 236,  493 => 233,  489 => 231,  487 => 228,  484 => 229,  478 => 226,  472 => 223,  463 => 214,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 176,  403 => 188,  400 => 181,  382 => 173,  377 => 176,  370 => 167,  358 => 151,  353 => 121,  346 => 155,  333 => 148,  328 => 139,  313 => 134,  290 => 119,  271 => 116,  266 => 114,  259 => 103,  254 => 108,  242 => 104,  230 => 98,  223 => 92,  218 => 90,  211 => 86,  206 => 86,  194 => 70,  34 => 5,  129 => 47,  217 => 77,  213 => 78,  198 => 80,  190 => 76,  185 => 66,  178 => 64,  118 => 49,  191 => 69,  186 => 56,  179 => 73,  174 => 65,  167 => 66,  155 => 47,  150 => 55,  181 => 65,  153 => 77,  124 => 44,  113 => 38,  104 => 32,  23 => 3,  97 => 51,  76 => 27,  81 => 30,  161 => 63,  152 => 46,  148 => 44,  137 => 46,  102 => 43,  65 => 17,  58 => 14,  184 => 63,  175 => 65,  170 => 84,  192 => 83,  188 => 90,  180 => 78,  146 => 46,  134 => 47,  127 => 35,  110 => 38,  77 => 28,  63 => 21,  100 => 39,  90 => 42,  59 => 17,  53 => 11,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 199,  444 => 149,  440 => 200,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 183,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 164,  384 => 121,  381 => 178,  379 => 119,  374 => 175,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 143,  341 => 118,  337 => 103,  322 => 101,  314 => 99,  312 => 124,  309 => 108,  305 => 132,  298 => 120,  294 => 127,  285 => 125,  283 => 100,  278 => 106,  268 => 117,  264 => 84,  258 => 94,  252 => 80,  247 => 107,  241 => 90,  235 => 85,  229 => 85,  224 => 81,  220 => 81,  214 => 76,  208 => 76,  169 => 53,  143 => 51,  140 => 58,  132 => 42,  128 => 55,  119 => 40,  107 => 37,  71 => 23,  177 => 72,  165 => 83,  160 => 63,  135 => 55,  126 => 41,  114 => 44,  84 => 27,  70 => 19,  67 => 18,  61 => 15,  87 => 32,  31 => 4,  38 => 7,  26 => 3,  93 => 29,  88 => 30,  78 => 24,  46 => 10,  44 => 8,  28 => 3,  201 => 92,  196 => 92,  183 => 79,  171 => 73,  166 => 54,  163 => 82,  158 => 80,  156 => 58,  151 => 59,  142 => 53,  138 => 59,  136 => 71,  121 => 50,  117 => 39,  105 => 34,  91 => 29,  62 => 16,  49 => 12,  21 => 2,  25 => 4,  94 => 38,  89 => 35,  85 => 26,  75 => 22,  68 => 20,  56 => 14,  27 => 4,  24 => 3,  19 => 1,  79 => 29,  72 => 21,  69 => 21,  47 => 10,  40 => 8,  37 => 7,  22 => 2,  246 => 93,  157 => 50,  145 => 74,  139 => 49,  131 => 45,  123 => 61,  120 => 31,  115 => 40,  111 => 47,  108 => 36,  101 => 33,  98 => 34,  96 => 39,  83 => 31,  74 => 22,  66 => 25,  55 => 12,  52 => 12,  50 => 10,  43 => 9,  41 => 7,  35 => 5,  32 => 6,  29 => 3,  209 => 82,  203 => 73,  199 => 93,  193 => 61,  189 => 66,  187 => 75,  182 => 87,  176 => 86,  173 => 85,  168 => 61,  164 => 65,  162 => 59,  154 => 60,  149 => 58,  147 => 75,  144 => 42,  141 => 73,  133 => 57,  130 => 46,  125 => 42,  122 => 41,  116 => 57,  112 => 39,  109 => 47,  106 => 51,  103 => 39,  99 => 31,  95 => 34,  92 => 31,  86 => 28,  82 => 26,  80 => 24,  73 => 27,  64 => 19,  60 => 20,  57 => 20,  54 => 15,  51 => 37,  48 => 10,  45 => 11,  42 => 7,  39 => 10,  36 => 7,  33 => 6,  30 => 5,);
    }
}
