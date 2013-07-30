<?php

/* DistribucionBundle:Operador:info.html.twig */
class __TwigTemplate_2289e6015db6df645832b822fd06fa5c extends Twig_Template
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
        echo "    DISTRIBUCIÓN - TOTALIZACIÓN
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "  ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

  <div class=\"titulo\">TOTALIZACIÓN POR PAÍSES</div>

    <table class=\"records_list\" cellpadding=5px cellspacing=1 class=\"infooperador\">
        <tr>
          <th>País</th>
          ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tipooperador"));
        foreach ($context['_seq'] as $context["_key"] => $context["top"]) {
            // line 18
            echo "            <th>";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getContext($context, "top"), "operador")), "html", null, true);
            echo "</th>
           ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['top'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "         </tr>


        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "datos"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["dato"]) {
            // line 24
            echo "          <tr ";
            if (($this->getAttribute($this->getContext($context, "loop"), "index") % 2 == 1)) {
                echo "style=\"background-color: #e9f5fe;\"";
            }
            echo ">
            <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "</td>
            ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "cantidadtipooperador")));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 27
                echo "              <td><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_list", array("idpais" => $this->getAttribute($this->getAttribute($this->getContext($context, "dato"), $this->getContext($context, "i"), array(), "array"), "idpais", array(), "array"), "idtipooperador" => $this->getAttribute($this->getAttribute($this->getContext($context, "dato"), $this->getContext($context, "i"), array(), "array"), "idtipooperador", array(), "array"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "dato"), $this->getContext($context, "i"), array(), "array"), "cantidad", array(), "array"), "html", null, true);
                echo " | ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "dato"), $this->getContext($context, "i"), array(), "array"), "totalabonados", array(), "array"), "html", null, true);
                echo "</a></td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "          </tr>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['dato'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "    </table>
    <br>

  <a class=\"btn\" href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">Ir a lista de operadores</a>
  <br><br>
";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Operador:info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  544 => 259,  536 => 254,  532 => 253,  527 => 251,  522 => 249,  512 => 241,  504 => 238,  502 => 237,  499 => 236,  493 => 233,  489 => 231,  487 => 230,  484 => 229,  478 => 226,  472 => 223,  463 => 219,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 187,  382 => 173,  377 => 171,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 110,  254 => 108,  242 => 102,  230 => 96,  223 => 92,  218 => 90,  211 => 86,  206 => 84,  194 => 78,  34 => 11,  129 => 55,  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 73,  178 => 69,  118 => 39,  191 => 81,  186 => 79,  179 => 73,  174 => 71,  167 => 67,  155 => 61,  150 => 55,  181 => 66,  153 => 66,  124 => 38,  113 => 36,  104 => 26,  23 => 3,  97 => 26,  76 => 23,  81 => 23,  161 => 61,  152 => 66,  148 => 65,  137 => 48,  102 => 42,  65 => 22,  58 => 17,  184 => 77,  175 => 68,  170 => 66,  192 => 83,  188 => 83,  180 => 78,  146 => 55,  134 => 57,  127 => 47,  110 => 37,  77 => 23,  63 => 14,  100 => 25,  90 => 32,  59 => 16,  53 => 14,  480 => 162,  474 => 224,  469 => 222,  461 => 155,  457 => 216,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 106,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 128,  294 => 127,  285 => 89,  283 => 122,  278 => 120,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 104,  241 => 77,  235 => 98,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 55,  140 => 55,  132 => 46,  128 => 25,  119 => 50,  107 => 37,  71 => 20,  177 => 65,  165 => 81,  160 => 49,  135 => 47,  126 => 47,  114 => 48,  84 => 27,  70 => 19,  67 => 18,  61 => 18,  87 => 26,  31 => 4,  38 => 8,  26 => 1,  93 => 24,  88 => 34,  78 => 29,  46 => 9,  44 => 9,  28 => 6,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 63,  163 => 62,  158 => 60,  156 => 75,  151 => 59,  142 => 51,  138 => 59,  136 => 31,  121 => 29,  117 => 49,  105 => 35,  91 => 25,  62 => 18,  49 => 8,  21 => 1,  25 => 3,  94 => 33,  89 => 24,  85 => 24,  75 => 20,  68 => 23,  56 => 17,  27 => 4,  24 => 3,  19 => 1,  79 => 24,  72 => 24,  69 => 17,  47 => 10,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 67,  145 => 46,  139 => 42,  131 => 49,  123 => 43,  120 => 40,  115 => 45,  111 => 49,  108 => 27,  101 => 31,  98 => 31,  96 => 39,  83 => 22,  74 => 19,  66 => 17,  55 => 12,  52 => 11,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 80,  193 => 73,  189 => 71,  187 => 74,  182 => 72,  176 => 53,  173 => 67,  168 => 66,  164 => 59,  162 => 65,  154 => 57,  149 => 65,  147 => 44,  144 => 52,  141 => 34,  133 => 41,  130 => 45,  125 => 42,  122 => 43,  116 => 45,  112 => 43,  109 => 39,  106 => 33,  103 => 35,  99 => 33,  95 => 31,  92 => 30,  86 => 23,  82 => 30,  80 => 29,  73 => 22,  64 => 16,  60 => 14,  57 => 15,  54 => 16,  51 => 11,  48 => 16,  45 => 7,  42 => 6,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
