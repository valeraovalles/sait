<?php

/* DistribucionBundle:Default:index.html.twig */
class __TwigTemplate_ece55e102368f55e83c0422245bc35dc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::distribucion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'javascripts' => array($this, 'block_javascripts'),
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Inicio - Telesur";
    }

    // line 4
    public function block_javascripts($context, array $blocks = array())
    {
        // line 5
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script type=\"text/javascript\"
      src=\"http://maps.googleapis.com/maps/api/js?key=AIzaSyDaX5WySgrnP70Br7a83wkzFJb7d6onGis&sensor=true&language=es\">
    </script>

 \t<script type=\"text/javascript\">
      function initialize() {

        var myLatlng = new google.maps.LatLng(19.311143,-3.515625);
        var mapOptions = {
          zoom: 2,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        }

                var mapOptions2 = {
          zoom: 2,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        }

        var map = new google.maps.Map(document.getElementById(\"map_canvas\"), mapOptions);

        ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "paises"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["pais"]) {
            // line 29
            echo "            
            ";
            // line 30
            ob_start();
            // line 31
            echo "                <table cellpadding=5px cellspacing=1 class=\"infomapa\"><tr><th colspan=3>País: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pais"), "pais"), "html", null, true);
            echo "</th></tr><tr><th>Operador</th><th>Cantidad</th><th>Abonados</th></tr>
                    ";
            // line 32
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "operadores"));
            foreach ($context['_seq'] as $context["_key"] => $context["operador"]) {
                // line 33
                echo "                        ";
                if (twig_in_filter($this->getAttribute($this->getContext($context, "pais"), "pais"), $this->getAttribute($this->getContext($context, "operador"), "pais"))) {
                    // line 34
                    echo "                            <tr>
                               <td><a href='";
                    // line 35
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_list", array("idpais" => $this->getAttribute($this->getContext($context, "pais"), "id"), "idtipooperador" => $this->getAttribute($this->getContext($context, "operador"), "id"))), "html", null, true);
                    echo "'>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "operador"), "operador"), "html", null, true);
                    echo "</a></td>
                               <td>";
                    // line 36
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "operador"), "cantidad"), "html", null, true);
                    echo "</td>
                               <td>";
                    // line 37
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "operador"), "totalabonados"), "html", null, true);
                    echo "</td>
                            </tr>
                        ";
                }
                // line 39
                echo "                    
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['operador'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "                </table>
            ";
            $context["datos"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 43
            echo "
            var contentString";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo " = '";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getContext($context, "datos"), "js"), "html", null, true);
            echo "';

            var infowindow";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo " = new google.maps.InfoWindow({content: contentString";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "});

            var image = 'http://www.telesurtv.net/favicon.ico';

            var marker";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo " = new google.maps.Marker({position: new google.maps.LatLng(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pais"), "latitud"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pais"), "longitud"), "html", null, true);
            echo "),title:\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pais"), "pais"), "html", null, true);
            echo "\", icon:image});

            google.maps.event.addListener(marker";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo ",'click', function() {infowindow";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo ".open(map,marker";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo ");});
            marker";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo ".setMap(map);

            
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pais'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "

        }

  </script>
";
    }

    // line 64
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 65
        echo "    PÁGINA PRINCIPAL DISTRIBUCIÓN
";
    }

    // line 69
    public function block_body($context, array $blocks = array())
    {
        // line 70
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"titulo\">BIENVENIDO AL SISTEMA DE DISTRIBUCIÓN</div>
    <div id=\"map_canvas\" style=\"width:900px; height:400px\"></div>







<script>
  \$(document).ready(function() {
    initialize()
  });
</script>

<br><br>

";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 69,  172 => 51,  565 => 263,  560 => 261,  555 => 259,  551 => 258,  547 => 257,  539 => 251,  530 => 248,  521 => 244,  517 => 242,  515 => 241,  506 => 237,  500 => 234,  497 => 233,  491 => 230,  485 => 227,  479 => 224,  455 => 209,  447 => 204,  436 => 198,  431 => 197,  428 => 196,  418 => 190,  406 => 182,  388 => 179,  371 => 174,  369 => 173,  350 => 163,  344 => 160,  340 => 158,  338 => 157,  332 => 154,  324 => 149,  316 => 144,  300 => 133,  295 => 130,  289 => 127,  280 => 123,  265 => 116,  253 => 110,  232 => 99,  210 => 88,  202 => 84,  471 => 219,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 195,  421 => 203,  414 => 199,  397 => 191,  390 => 180,  385 => 185,  378 => 181,  373 => 179,  366 => 175,  361 => 173,  347 => 162,  342 => 160,  335 => 156,  330 => 154,  323 => 150,  318 => 148,  311 => 144,  306 => 142,  293 => 135,  274 => 120,  270 => 118,  263 => 117,  255 => 111,  248 => 111,  243 => 109,  236 => 101,  231 => 103,  219 => 92,  212 => 93,  207 => 70,  200 => 83,  195 => 85,  159 => 67,  197 => 62,  544 => 259,  536 => 254,  532 => 249,  527 => 247,  522 => 249,  512 => 240,  504 => 238,  502 => 235,  499 => 236,  493 => 233,  489 => 231,  487 => 228,  484 => 229,  478 => 226,  472 => 223,  463 => 214,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 181,  382 => 173,  377 => 176,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 113,  254 => 108,  242 => 104,  230 => 98,  223 => 92,  218 => 90,  211 => 86,  206 => 86,  194 => 80,  34 => 8,  129 => 52,  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 59,  178 => 55,  118 => 37,  191 => 81,  186 => 56,  179 => 73,  174 => 71,  167 => 66,  155 => 61,  150 => 50,  181 => 74,  153 => 66,  124 => 38,  113 => 36,  104 => 35,  23 => 3,  97 => 37,  76 => 21,  81 => 23,  161 => 52,  152 => 59,  148 => 44,  137 => 40,  102 => 37,  65 => 15,  58 => 14,  184 => 77,  175 => 71,  170 => 66,  192 => 83,  188 => 77,  180 => 78,  146 => 55,  134 => 44,  127 => 41,  110 => 36,  77 => 19,  63 => 16,  100 => 25,  90 => 32,  59 => 16,  53 => 13,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 151,  444 => 149,  440 => 200,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 183,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 178,  379 => 119,  374 => 175,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 166,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 137,  294 => 127,  285 => 125,  283 => 124,  278 => 123,  268 => 117,  264 => 84,  258 => 81,  252 => 80,  247 => 107,  241 => 77,  235 => 98,  229 => 73,  224 => 95,  220 => 70,  214 => 69,  208 => 68,  169 => 53,  143 => 43,  140 => 57,  132 => 40,  128 => 39,  119 => 50,  107 => 37,  71 => 20,  177 => 72,  165 => 81,  160 => 63,  135 => 55,  126 => 47,  114 => 37,  84 => 29,  70 => 19,  67 => 28,  61 => 18,  87 => 30,  31 => 2,  38 => 8,  26 => 1,  93 => 24,  88 => 31,  78 => 29,  46 => 9,  44 => 9,  28 => 6,  201 => 92,  196 => 64,  183 => 79,  171 => 73,  166 => 63,  163 => 62,  158 => 60,  156 => 61,  151 => 59,  142 => 53,  138 => 59,  136 => 57,  121 => 42,  117 => 46,  105 => 35,  91 => 25,  62 => 18,  49 => 8,  21 => 2,  25 => 4,  94 => 32,  89 => 31,  85 => 24,  75 => 20,  68 => 21,  56 => 17,  27 => 4,  24 => 3,  19 => 1,  79 => 21,  72 => 19,  69 => 22,  47 => 10,  40 => 5,  37 => 4,  22 => 2,  246 => 32,  157 => 67,  145 => 46,  139 => 42,  131 => 43,  123 => 43,  120 => 39,  115 => 45,  111 => 41,  108 => 27,  101 => 34,  98 => 33,  96 => 39,  83 => 22,  74 => 24,  66 => 16,  55 => 14,  52 => 11,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 65,  193 => 61,  189 => 71,  187 => 57,  182 => 72,  176 => 75,  173 => 67,  168 => 66,  164 => 65,  162 => 65,  154 => 57,  149 => 44,  147 => 61,  144 => 52,  141 => 46,  133 => 41,  130 => 45,  125 => 42,  122 => 49,  116 => 36,  112 => 43,  109 => 35,  106 => 33,  103 => 38,  99 => 38,  95 => 27,  92 => 33,  86 => 27,  82 => 22,  80 => 26,  73 => 23,  64 => 17,  60 => 15,  57 => 15,  54 => 16,  51 => 11,  48 => 16,  45 => 7,  42 => 6,  39 => 5,  36 => 9,  33 => 4,  30 => 2,);
    }
}
