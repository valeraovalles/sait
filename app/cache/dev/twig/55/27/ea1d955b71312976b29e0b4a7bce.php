<?php

/* DistribucionBundle:Operador:show.html.twig */
class __TwigTemplate_5527ea1d955b71312976b29e0b4a7bce extends Twig_Template
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
        echo "Inicio - Telesur";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    DISTRIBUCIÓN OPERADORES
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

<div class=\"titulo\">EL OPERADOR (";
        // line 13
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombre")), "html", null, true);
        echo ") ESTÁ ";
        if (($this->getAttribute($this->getContext($context, "entity"), "estatus") == 1)) {
            echo "(ACTIVO)";
        } else {
            echo "<br><br><div class='Redflash-notice'>INACTIVO</div>";
        }
        echo "</div>


    <div id=\"a\"><div class=\"divisor\">DATOS DE OPERADOR</div></div>
    <div id=\"operador\">
    <div class=\"form-show\">
        <div class=\"contenedor\">
            <div class=\"labelshow\">Nombre:</div>
            <div class=\"dato\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombre"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">Tipo Operador:</div>
                <div class=\"dato\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "tipooperador"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">Pais:</div>
                <div class=\"dato\">";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "pais"), "pais"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">Estado:</div>
                <div class=\"dato\">
                    ";
        // line 37
        $context["cont"] = 0;
        // line 38
        echo "                    ";
        $context["largo"] = twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "estado"));
        // line 39
        echo "                    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "entity"), "estado"));
        foreach ($context['_seq'] as $context["_key"] => $context["es"]) {
            echo " 
                        ";
            // line 40
            $context["cont"] = ($this->getContext($context, "cont") + 1);
            // line 41
            echo "                        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "es"), "estado"), "html", null, true);
            if (($this->getContext($context, "cont") == ($this->getContext($context, "largo") - 1))) {
                echo " y";
            } elseif ((($this->getContext($context, "largo") > 1) && ($this->getContext($context, "cont") < ($this->getContext($context, "largo") - 1)))) {
                echo ",";
            } else {
                echo ".";
            }
            // line 42
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['es'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                </div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">Cobertura:</div>
                <div class=\"dato\">";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "cobertura"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">Zona:</div>
                <div class=\"dato\">";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "zona"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">
                    ";
        // line 58
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "tipooperador"), "id") == 4)) {
            // line 59
            echo "                        Potenciales televidentes:
                    ";
        } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "tipooperador"), "id") == 5)) {
            // line 61
            echo "                        Suscriptores:
                    ";
        } else {
            // line 63
            echo "                        Abonados:
                    ";
        }
        // line 65
        echo "                </div>
                <div class=\"dato\">";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "numeroabonados"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
                <div class=\"labelshow\">
                    ";
        // line 71
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "tipooperador"), "id") == 4)) {
            // line 72
            echo "                        Canal1:
                    ";
        } else {
            // line 74
            echo "                        Dial1:
                    ";
        }
        // line 76
        echo "                </div>
                <div class=\"dato\">";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dialurl"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 80
        if (($this->getAttribute($this->getContext($context, "entity"), "dialurl2") != "")) {
            // line 81
            echo "            <div class=\"contenedor\">
                <div class=\"labelshow\">
                    ";
            // line 83
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "tipooperador"), "id") == 4)) {
                // line 84
                echo "                        Canal2:
                    ";
            } else {
                // line 86
                echo "                        Dial2:
                    ";
            }
            // line 88
            echo "                </div>
                    <div class=\"dato\">";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "dialurl2"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 92
        echo "
        <div class=\"contenedor\">
                <div class=\"labelshow\">Direccion:</div>
                <div class=\"dato\">";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "direccion"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 98
        if (($this->getAttribute($this->getContext($context, "entity"), "observacion") != "")) {
            // line 99
            echo "            <div class=\"contenedor\">
                    <div class=\"labelshow\">Observacion:</div>
                    <div class=\"dato\">";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "observacion"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 104
        echo "
        <div class=\"contenedor\">
                <div class=\"labelshow\">Paquete:</div>
                <div class=\"dato\">";
        // line 107
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "paquete"), "paquete"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 110
        if (($this->getAttribute($this->getContext($context, "entity"), "urlweb") != "")) {
            // line 111
            echo "            <div class=\"contenedor\">
                    <div class=\"labelshow\">Url Web:</div>
                    <div class=\"dato\">";
            // line 113
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "urlweb"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 116
        echo "
        ";
        // line 117
        if (($this->getAttribute($this->getContext($context, "entity"), "urlfacebook") != "")) {
            // line 118
            echo "            <div class=\"contenedor\">
                    <div class=\"labelshow\">Url Facebook:</div>
                    <div class=\"dato\">";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "urlfacebook"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 123
        echo "
        ";
        // line 124
        if (($this->getAttribute($this->getContext($context, "entity"), "urltwitter") != "")) {
            // line 125
            echo "            <div class=\"contenedor\">
                    <div class=\"labelshow\">Url Twitter:</div>
                    <div class=\"dato\">";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "urltwitter"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 130
        echo "
            <div class=\"contenedor\">
                <div class=\"labelshow\">Última Modificación:</div>
                <div class=\"dato\">";
        // line 133
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "primernombre")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "user"), "primerapellido")), "html", null, true);
        echo "</div>
            </div>

    </div>
    </div>

    <div id=\"b\"><div class=\"divisor\">DATOS DE COMODATO</div></div>
    <div id=\"comodato\">
    <div class=\"form-show\">
        <div class=\"contenedor\">
            <div class=\"labelshow\">Código:</div>
            <div class=\"dato\">";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "comodato"), "codigo"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Fecha Inicio:</div>
            <div class=\"dato\">";
        // line 149
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "comodato"), "fechainicioacuerdo"), "m/d/Y"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Fecha Fin:</div>
            <div class=\"dato\">";
        // line 154
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "comodato"), "fechafinacuerdo"), "m/d/Y"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 157
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "comodato"), "observacion") != "")) {
            // line 158
            echo "            <div class=\"contenedor\">
                    <div class=\"labelshow\">Observacion:</div>
                    <div class=\"dato\">";
            // line 160
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "comodato"), "observacion"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 163
        echo "
        <div class=\"contenedor\">
                <div class=\"labelshow\">Recibe receptor:</div>
                <div class=\"dato\">";
        // line 166
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "comodato"), "recibereceptor") == "1")) {
            echo "Sí";
        } else {
            echo "No";
        }
        echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Objetos de Comodato:</div>
                <div class=\"dato\">

                    ";
        // line 173
        $context["cont"] = 0;
        // line 174
        echo "                    ";
        $context["largo"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "comodato"), "objetocomodato"));
        // line 175
        echo "                    ";
        if (($this->getContext($context, "largo") == 0)) {
            // line 176
            echo "                    Ninguno
                    ";
        } else {
            // line 178
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "entity"), "comodato"), "objetocomodato"));
            foreach ($context['_seq'] as $context["_key"] => $context["co"]) {
                echo " 
                        ";
                // line 179
                $context["cont"] = ($this->getContext($context, "cont") + 1);
                // line 180
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "co"), "objeto"), "html", null, true);
                if (($this->getContext($context, "cont") == ($this->getContext($context, "largo") - 1))) {
                    echo " y";
                } elseif ((($this->getContext($context, "largo") > 1) && ($this->getContext($context, "cont") < ($this->getContext($context, "largo") - 1)))) {
                    echo ",";
                } else {
                    echo ".";
                }
                // line 181
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['co'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 182
            echo "                    ";
        }
        // line 183
        echo "              </div>
        </div>
    </div>
    </div>


    <div id=\"c\"><div class=\"divisor\">DATOS DE REPRESENTANTE</div></div>
    <div><a href=\"";
        // line 190
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("representante_new_add", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">(Agregar Nuevo Representante)</a></div>
    <br>
    <div id=\"representante\">
    <div class=\"form-show\">

    ";
        // line 195
        $context["cont"] = 0;
        // line 196
        echo "    ";
        $context["largo"] = twig_length_filter($this->env, $this->getContext($context, "representante"));
        // line 197
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "representante"));
        foreach ($context['_seq'] as $context["_key"] => $context["re"]) {
            // line 198
            echo "
        <div style=\"background-color:
#e9f5fe; padding-bottom:5px;font-weight:bold;\">REPRESENTANTE ";
            // line 200
            echo twig_escape_filter($this->env, ($this->getContext($context, "cont") + 1), "html", null, true);
            echo "</div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Nombres:</div>
            <div class=\"dato\">";
            // line 204
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "nombres"), "html", null, true);
            echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Apellidos:</div>
            <div class=\"dato\">";
            // line 209
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "apellidos"), "html", null, true);
            echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Cargo:</div>
            <div class=\"dato\">";
            // line 214
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "cargo"), "html", null, true);
            echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">correo:</div>
            <div class=\"dato\">";
            // line 219
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "correo"), "html", null, true);
            echo "</div>
        </div>

        <div class=\"contenedor\">
            <div class=\"labelshow\">Telefono 1:</div>
            <div class=\"dato\">";
            // line 224
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "telefono1"), "html", null, true);
            echo "</div>
        </div>

        ";
            // line 227
            if (($this->getAttribute($this->getContext($context, "re"), "telefono2") != "")) {
                // line 228
                echo "            <div class=\"contenedor\">
                <div class=\"labelshow\">Telefono 2:</div>
                <div class=\"dato\">";
                // line 230
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "telefono2"), "html", null, true);
                echo "</div>
            </div>
        ";
            }
            // line 233
            echo "
        ";
            // line 234
            if (($this->getAttribute($this->getContext($context, "re"), "fax") != "")) {
                // line 235
                echo "            <div class=\"contenedor\">
                <div class=\"labelshow\">Fax:</div>
                <div class=\"dato\">";
                // line 237
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "fax"), "html", null, true);
                echo "</div>
            </div>
        ";
            }
            // line 240
            echo "
        ";
            // line 241
            if (($this->getAttribute($this->getContext($context, "re"), "observacion") != "")) {
                // line 242
                echo "            <div class=\"contenedor\">
                <div class=\"labelshow\">Observacion:</div>
                <div class=\"dato\">";
                // line 244
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "observacion"), "html", null, true);
                echo "</div>
            </div>
        ";
            }
            // line 247
            echo "
        ";
            // line 248
            $context["cont"] = ($this->getContext($context, "cont") + 1);
            // line 249
            echo "      
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['re'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 251
        echo "    </div>
</div>



<br>
<a class=\"btn\" href=\"";
        // line 257
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">Ir a lista</a> |
<a class=\"btn\" href=\"";
        // line 258
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Ir a editar</a> |
<a class=\"btn\" href=\"";
        // line 259
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_new", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Ir a nuevo</a>
<br><br>
<form action=\"";
        // line 261
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('¿Seguro que desea borrar el operador y sus representantes?')\">
    <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
    ";
        // line 263
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "delete_form"), 'widget');
        echo "
    <button class=\"btn btn-danger\" type=\"submit\">Desactivar</button>
</form>

<script>

    jQuery(\"#a\").click(function  (){
            jQuery(\"#operador\").delay(200).slideToggle();
    });

    jQuery(\"#b\").click(function  (){
            jQuery(\"#comodato\").delay(200).slideToggle();
    });

    jQuery(\"#c\").click(function  (){
            jQuery(\"#representante\").delay(200).slideToggle();
    });

</script>
";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Operador:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  565 => 263,  560 => 261,  555 => 259,  551 => 258,  547 => 257,  539 => 251,  530 => 248,  521 => 244,  517 => 242,  515 => 241,  506 => 237,  500 => 234,  497 => 233,  491 => 230,  485 => 227,  479 => 224,  455 => 209,  447 => 204,  436 => 198,  431 => 197,  428 => 196,  418 => 190,  406 => 182,  388 => 179,  371 => 174,  369 => 173,  350 => 163,  344 => 160,  340 => 158,  338 => 157,  332 => 154,  324 => 149,  316 => 144,  300 => 133,  295 => 130,  289 => 127,  280 => 123,  265 => 116,  253 => 110,  232 => 99,  210 => 88,  202 => 84,  471 => 219,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 195,  421 => 203,  414 => 199,  397 => 191,  390 => 180,  385 => 185,  378 => 181,  373 => 179,  366 => 175,  361 => 173,  347 => 162,  342 => 160,  335 => 156,  330 => 154,  323 => 150,  318 => 148,  311 => 144,  306 => 142,  293 => 135,  274 => 120,  270 => 118,  263 => 117,  255 => 111,  248 => 111,  243 => 109,  236 => 101,  231 => 103,  219 => 92,  212 => 93,  207 => 91,  200 => 83,  195 => 85,  159 => 67,  197 => 62,  544 => 259,  536 => 254,  532 => 249,  527 => 247,  522 => 249,  512 => 240,  504 => 238,  502 => 235,  499 => 236,  493 => 233,  489 => 231,  487 => 228,  484 => 229,  478 => 226,  472 => 223,  463 => 214,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 181,  382 => 173,  377 => 176,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 113,  254 => 108,  242 => 104,  230 => 98,  223 => 92,  218 => 90,  211 => 86,  206 => 86,  194 => 80,  34 => 11,  129 => 52,  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 76,  178 => 69,  118 => 37,  191 => 81,  186 => 56,  179 => 73,  174 => 71,  167 => 66,  155 => 61,  150 => 58,  181 => 74,  153 => 66,  124 => 50,  113 => 36,  104 => 39,  23 => 3,  97 => 37,  76 => 23,  81 => 23,  161 => 61,  152 => 59,  148 => 65,  137 => 48,  102 => 39,  65 => 15,  58 => 13,  184 => 77,  175 => 71,  170 => 66,  192 => 83,  188 => 77,  180 => 78,  146 => 55,  134 => 48,  127 => 43,  110 => 37,  77 => 19,  63 => 14,  100 => 25,  90 => 32,  59 => 16,  53 => 14,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 151,  444 => 149,  440 => 200,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 183,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 178,  379 => 119,  374 => 175,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 166,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 137,  294 => 127,  285 => 125,  283 => 124,  278 => 123,  268 => 117,  264 => 84,  258 => 81,  252 => 80,  247 => 107,  241 => 77,  235 => 98,  229 => 73,  224 => 95,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 55,  140 => 57,  132 => 40,  128 => 39,  119 => 50,  107 => 37,  71 => 20,  177 => 72,  165 => 81,  160 => 63,  135 => 55,  126 => 47,  114 => 48,  84 => 27,  70 => 19,  67 => 18,  61 => 18,  87 => 31,  31 => 4,  38 => 8,  26 => 1,  93 => 24,  88 => 31,  78 => 29,  46 => 9,  44 => 9,  28 => 6,  201 => 92,  196 => 81,  183 => 79,  171 => 73,  166 => 63,  163 => 62,  158 => 60,  156 => 61,  151 => 59,  142 => 53,  138 => 59,  136 => 41,  121 => 42,  117 => 46,  105 => 35,  91 => 25,  62 => 18,  49 => 8,  21 => 1,  25 => 3,  94 => 33,  89 => 24,  85 => 24,  75 => 25,  68 => 16,  56 => 17,  27 => 4,  24 => 3,  19 => 1,  79 => 24,  72 => 21,  69 => 17,  47 => 10,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 67,  145 => 46,  139 => 42,  131 => 49,  123 => 43,  120 => 40,  115 => 36,  111 => 41,  108 => 27,  101 => 31,  98 => 31,  96 => 39,  83 => 22,  74 => 19,  66 => 19,  55 => 13,  52 => 11,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 80,  193 => 61,  189 => 71,  187 => 74,  182 => 72,  176 => 75,  173 => 67,  168 => 66,  164 => 65,  162 => 65,  154 => 57,  149 => 44,  147 => 61,  144 => 52,  141 => 34,  133 => 41,  130 => 45,  125 => 42,  122 => 43,  116 => 45,  112 => 43,  109 => 40,  106 => 33,  103 => 35,  99 => 38,  95 => 31,  92 => 33,  86 => 23,  82 => 30,  80 => 26,  73 => 22,  64 => 16,  60 => 14,  57 => 15,  54 => 16,  51 => 11,  48 => 16,  45 => 7,  42 => 6,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
