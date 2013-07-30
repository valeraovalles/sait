<?php

/* DistribucionBundle:Operador:edit.html.twig */
class __TwigTemplate_26ea8093eab052741543b1129edca5e5 extends Twig_Template
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
        echo "    DISTRIBUCIÓN - EDITAR OPERADOR
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"titulo\">EDITAR OPERADOR ";
        // line 14
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombre")), "html", null, true);
        echo " ";
        if (($this->getAttribute($this->getContext($context, "entity"), "estatus") == 1)) {
            echo "(ACTIVO)";
        } else {
            echo "<br><br><div class='Redflash-notice'>INACTIVO</div>";
        }
        echo "</div>

    ";
        // line 16
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "started")) {
            // line 17
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 18
                echo "            <div class=\"Greenflash-notice\">
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
    <form novalidate class=\"formNewEditOperador\" action=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_update", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "edit_form"), 'enctype');
;
        echo ">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "_token"), 'widget');
        echo "


        <fieldset>
            <legend id=\"a\"><div class=\"divisor\">EDITAR DATOS DE OPERADOR</div></legend>

            <div id=\"operador\">
                <div class=\"form-contenedor\">
                    <div>";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "nombre"), 'errors');
        echo "</div>
                    <div class=\"labels\">Operador:</div>
                    <div class=\"widgets\">";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "nombre"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "tipooperador"), 'errors');
        echo "</div>
                    <div class=\"labels\">Tipo operador:</div>
                    <div class=\"widgets\">";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "tipooperador"), 'widget');
        echo "</div>
                </div>
  
                <div class=\"form-contenedor\">
                    <div>";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "pais"), 'errors');
        echo "</div>
                    <div class=\"labels\">Pais:</div>
                    <div class=\"widgets\">";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "pais"), 'widget');
        echo "</div>
                </div>
                
                <div class=\"form-contenedor\">
                    <div>";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "estado"), 'errors');
        echo "</div>
                    <div class=\"labels\">Estado:</div>
                    <div id=\"estado\">
                        <div class=\"widgets\">";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "estado"), 'widget');
        echo "</div>
                    </div>
                </div>

                <div class=\"form-contenedor\" id=\"franjatransmision\" style=\"display:none;\">
                    <div>";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "franjatransmision"), 'errors');
        echo "</div>
                    <div class=\"labels\">Franja transmision:</div>
                    <div class=\"widgets\">";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "franjatransmision"), 'widget');
        echo "</div>
                </div>
                 
                <div class=\"form-contenedor\">
                    <div>";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "cobertura"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cobertura:</div>
                    <div class=\"widgets\">";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "cobertura"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 72
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "zona"), 'errors');
        echo "</div>
                    <div class=\"labels\">Zona:</div>
                    <div class=\"widgets\">";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "zona"), 'widget');
        echo "</div>
                </div>
                    
                <div class=\"form-contenedor\">
                    <div>";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "numeroabonados"), 'errors');
        echo "</div>
                    <div class=\"labels\" id=\"usuario\">Nro. Abonados:</div>
                    <div class=\"widgets\">";
        // line 80
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "numeroabonados"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 84
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "dialUrl"), 'errors');
        echo "</div>
                    <div class=\"labels\" id=\"ubicacion1\">Dial1:</div>
                    <div class=\"widgets\">";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "dialUrl"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 90
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "dialUrl2"), 'errors');
        echo "</div>
                    <div class=\"labels\" id=\"ubicacion2\">Dial2:</div>
                    <div class=\"widgets\">";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "dialUrl2"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 96
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "direccion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Direccion:</div>
                    <div class=\"widgets\">";
        // line 98
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "direccion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 102
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 104
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "observacion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 108
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "estatus"), 'errors');
        echo "</div>
                    <div class=\"labels\">Activo:</div>
                    <div class=\"widgets\">";
        // line 110
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "estatus"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 114
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "paquete"), 'errors');
        echo "</div>
                    <div class=\"labels\">Paquete:</div>
                    <div class=\"widgets\">";
        // line 116
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "paquete"), 'widget');
        echo "</div>
                </div>

                 <div class=\"form-contenedor\">
                    <div>";
        // line 120
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "urlweb"), 'errors');
        echo "</div>
                    <div class=\"labels\">Url Web:</div>
                    <div class=\"widgets\">";
        // line 122
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "urlweb"), 'widget');
        echo "</div>
                </div>

                 <div class=\"form-contenedor\">
                    <div>";
        // line 126
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "urlfacebook"), 'errors');
        echo "</div>
                    <div class=\"labels\"><img width=\"25px\" src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/facebook.png"), "html", null, true);
        echo "\"></div>
                    <div class=\"widgets\">";
        // line 128
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "urlfacebook"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 132
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "urltwitter"), 'errors');
        echo "</div>
                    <div class=\"labels\"><img width=\"22px\" src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/twitter.png"), "html", null, true);
        echo "\"></div>
                    <div class=\"widgets\">";
        // line 134
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "edit_form"), "urltwitter"), 'widget');
        echo "</div>
                </div>
            </div> 
        </fieldset>
        
        <br>
        
        <fieldset>
            <legend id=\"b\"><div class=\"divisor\">EDITAR DATOS DE COMODATO</div></legend>
            <div id=\"comodato\">

                <div class=\"form-contenedor\">
                    <div>";
        // line 146
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "fechainicioacuerdo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fecha Inicio:</div>
                    <div class=\"widgets\">";
        // line 148
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "fechainicioacuerdo"), 'widget');
        echo "</div>
                </div>


                <div class=\"form-contenedor\">
                    <div>";
        // line 153
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "fechafinacuerdo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fecha Fin:</div>
                    <div class=\"widgets\">";
        // line 155
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "fechafinacuerdo"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 159
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "recibereceptor"), 'errors');
        echo "</div>
                    <div class=\"labels\">Recibe receptor:</div>
                    <div class=\"widgets\">";
        // line 161
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "recibereceptor"), 'widget');
        echo "</div>
                </div>
                
                <div class=\"form-contenedor\">
                    <div>";
        // line 165
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 167
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "observacion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 171
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "objetocomodato"), 'errors');
        echo "</div>
                    <div class=\"labels\">Objeto Comodato:</div>
                    <div class=\"widgets\">";
        // line 173
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "edit_form"), "comodato"), "objetocomodato"), 'widget');
        echo "</div>
                </div>
            </div>
        </fieldset>

        <br>        

        <fieldset>
            <legend id=\"c\"><div class=\"divisor\">DATOS DE REPRESENTANTE</div> </legend>
            <div id=\"representante\">

            <div class=\"form-show_edit\">

            ";
        // line 186
        $context["cont"] = 0;
        // line 187
        echo "            ";
        $context["largo"] = twig_length_filter($this->env, $this->getContext($context, "representante"));
        // line 188
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "representante"));
        foreach ($context['_seq'] as $context["_key"] => $context["re"]) {
            // line 189
            echo "
                <div class=\"divisor_representante\"><a onclick=\"return confirm('No olvide guardar los datos del formulario principal o los datos se perderán, ¿desea continuar?')\" href=\"";
            // line 190
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("representante_edit", array("id" => $this->getAttribute($this->getContext($context, "re"), "id"))), "html", null, true);
            echo "\">EDITAR REPRESENTANTE ";
            echo twig_escape_filter($this->env, ($this->getContext($context, "cont") + 1), "html", null, true);
            echo "</a></div>
                <div class=\"form-contenedor\">
                    <div class=\"labels\">Nombres:</div>
                    <div class=\"widgets\">";
            // line 193
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "nombres"), "html", null, true);
            echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"labels\">Apellidos:</div>
                    <div class=\"widgets\">";
            // line 198
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "apellidos"), "html", null, true);
            echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"labels\">Cargo:</div>
                    <div class=\"widgets\">";
            // line 203
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "cargo"), "html", null, true);
            echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"labels\">correo:</div>
                    <div class=\"widgets\">";
            // line 208
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "correo"), "html", null, true);
            echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"labels\">Telefono 1:</div>
                    <div class=\"widgets\">";
            // line 213
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "telefono1"), "html", null, true);
            echo "</div>
                </div>

                ";
            // line 216
            if (($this->getAttribute($this->getContext($context, "re"), "telefono2") != "")) {
                // line 217
                echo "                    <div class=\"form-contenedor\">
                        <div class=\"labels\">Telefono 2:</div>
                        <div class=\"widgets\">";
                // line 219
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "telefono2"), "html", null, true);
                echo "</div>
                    </div>
                ";
            }
            // line 222
            echo "
                ";
            // line 223
            if (($this->getAttribute($this->getContext($context, "re"), "fax") != "")) {
                // line 224
                echo "                    <div class=\"form-contenedor\">
                        <div class=\"labels\">Fax:</div>
                        <div class=\"widgets\">";
                // line 226
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "fax"), "html", null, true);
                echo "</div>
                    </div>
                ";
            }
            // line 229
            echo "
                ";
            // line 230
            if (($this->getAttribute($this->getContext($context, "re"), "observacion") != "")) {
                // line 231
                echo "                    <div class=\"form-contenedor\">
                        <div class=\"labels\">Observacion:</div>
                        <div class=\"widgets\">";
                // line 233
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "re"), "observacion"), "html", null, true);
                echo "</div>
                    </div>
                ";
            }
            // line 236
            echo "
                ";
            // line 237
            $context["cont"] = ($this->getContext($context, "cont") + 1);
            // line 238
            echo "
               
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['re'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 241
        echo "            </div>
        </div>
        </fieldset>
        <br>
        <button class=\"btn\" type=\"submit\">Editar</button>

    </form>

    <form action=\"";
        // line 249
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('¿Seguro que desea borrar el operador y sus representantes?')\">
        <input class=\"btn\" type=\"hidden\" name=\"_method\" value=\"DELETE\" />
        ";
        // line 251
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "delete_form"), 'widget');
        echo "
        <button class=\"btn btn-danger\" type=\"submit\">Desactivar</button> | 
        <a class=\"btn\" href=\"";
        // line 253
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">Ir a lista</a> | 
        <a class=\"btn\" href=\"";
        // line 254
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Ir a consultar</a>
    </form>

    <br>

    <script src=\"";
        // line 259
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/distribucion/operador_new.js"), "html", null, true);
        echo "\"></script>

";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Operador:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  544 => 259,  536 => 254,  532 => 253,  527 => 251,  522 => 249,  512 => 241,  504 => 238,  502 => 237,  499 => 236,  493 => 233,  489 => 231,  487 => 230,  484 => 229,  478 => 226,  472 => 223,  463 => 219,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 187,  382 => 173,  377 => 171,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 110,  254 => 108,  242 => 102,  230 => 96,  223 => 92,  218 => 90,  211 => 86,  206 => 84,  194 => 78,  34 => 11,  129 => 55,  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 73,  178 => 69,  118 => 39,  191 => 81,  186 => 79,  179 => 73,  174 => 71,  167 => 67,  155 => 61,  150 => 55,  181 => 66,  153 => 66,  124 => 38,  113 => 36,  104 => 43,  23 => 3,  97 => 26,  76 => 23,  81 => 23,  161 => 61,  152 => 66,  148 => 65,  137 => 48,  102 => 42,  65 => 22,  58 => 14,  184 => 77,  175 => 68,  170 => 66,  192 => 83,  188 => 83,  180 => 78,  146 => 55,  134 => 57,  127 => 47,  110 => 37,  77 => 23,  63 => 14,  100 => 37,  90 => 32,  59 => 16,  53 => 14,  480 => 162,  474 => 224,  469 => 222,  461 => 155,  457 => 216,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 106,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 128,  294 => 127,  285 => 89,  283 => 122,  278 => 120,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 104,  241 => 77,  235 => 98,  229 => 73,  224 => 71,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 55,  140 => 55,  132 => 46,  128 => 25,  119 => 50,  107 => 37,  71 => 18,  177 => 65,  165 => 81,  160 => 49,  135 => 47,  126 => 47,  114 => 48,  84 => 27,  70 => 19,  67 => 18,  61 => 18,  87 => 26,  31 => 4,  38 => 8,  26 => 1,  93 => 29,  88 => 34,  78 => 29,  46 => 9,  44 => 11,  28 => 6,  201 => 92,  196 => 90,  183 => 70,  171 => 61,  166 => 63,  163 => 62,  158 => 60,  156 => 75,  151 => 59,  142 => 51,  138 => 59,  136 => 57,  121 => 48,  117 => 49,  105 => 35,  91 => 25,  62 => 17,  49 => 8,  21 => 1,  25 => 3,  94 => 33,  89 => 24,  85 => 24,  75 => 20,  68 => 23,  56 => 17,  27 => 4,  24 => 3,  19 => 1,  79 => 24,  72 => 24,  69 => 17,  47 => 12,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 67,  145 => 46,  139 => 42,  131 => 49,  123 => 43,  120 => 40,  115 => 45,  111 => 49,  108 => 34,  101 => 31,  98 => 31,  96 => 39,  83 => 22,  74 => 19,  66 => 17,  55 => 12,  52 => 11,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 80,  193 => 73,  189 => 71,  187 => 74,  182 => 72,  176 => 53,  173 => 67,  168 => 66,  164 => 59,  162 => 65,  154 => 57,  149 => 65,  147 => 44,  144 => 52,  141 => 53,  133 => 41,  130 => 45,  125 => 42,  122 => 43,  116 => 45,  112 => 43,  109 => 39,  106 => 33,  103 => 35,  99 => 33,  95 => 31,  92 => 30,  86 => 23,  82 => 30,  80 => 29,  73 => 22,  64 => 16,  60 => 14,  57 => 15,  54 => 16,  51 => 11,  48 => 16,  45 => 7,  42 => 6,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
