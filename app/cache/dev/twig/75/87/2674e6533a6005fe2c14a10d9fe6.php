<?php

/* DistribucionBundle:Operador:new.html.twig */
class __TwigTemplate_75872674e6533a6005fe2c14a10d9fe6 extends Twig_Template
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
        echo "Distribucion - Telesur";
    }

    // line 6
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 7
        echo "    OPERADORES
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <div class=\"titulo\">CREAR OPERADOR</div>

    <form name=\"form1\" class=\"formNewEditOperador\" novalidate action=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("operador_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">

        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "_token"), 'widget');
        echo "

        <fieldset>
            <legend id=\"a\"><div class=\"divisor\">DATOS DE OPERADOR</div></legend>
            <div id=\"operador\">
                <div class=\"form-contenedor\">
                    <div>";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombre"), 'errors');
        echo "</div>
                    <div class=\"labels\">Operador:</div>
                    <div class=\"widgets\">";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "nombre"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tipooperador"), 'errors');
        echo "</div>
                    <div class=\"labels\">Tipo operador:</div>
                    <div class=\"widgets\">";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tipooperador"), 'widget');
        echo "</div>
                </div>
  
                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "pais"), 'errors');
        echo "</div>
                    <div class=\"labels\">Pais:</div>
                    <div class=\"widgets\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "pais"), 'widget');
        echo "</div>
                </div>
                
                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "estado"), 'errors');
        echo "</div>
                    <div class=\"labels\">Estado:</div>
                    <div id=\"estado\">
                        <div class=\"widgets\">";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "estado"), 'widget');
        echo "</div>
                    </div>
                </div>
                <div class=\"form-contenedor\" id=\"franjatransmision\" style=\"display:none;\">
                    <div>";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "franjatransmision"), 'errors');
        echo "</div>
                    <div class=\"labels\">Franja transmision:</div>
                    <div class=\"widgets\">";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "franjatransmision"), 'widget');
        echo "</div>
                </div>
                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cobertura"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cobertura:</div>
                    <div class=\"widgets\">";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cobertura"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "zona"), 'errors');
        echo "</div>
                    <div class=\"labels\">Zona:</div>
                    <div class=\"widgets\">";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "zona"), 'widget');
        echo "</div>
                </div>
                    
                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "numeroabonados"), 'errors');
        echo "</div>
                    <div class=\"labels\" id=\"usuario\">Nro. Abonados:</div>
                    <div class=\"widgets\">";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "numeroabonados"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "dialUrl"), 'errors');
        echo "</div>
                    <div class=\"labels\" id=\"ubicacion1\">Dial1:</div>
                    <div class=\"widgets\">";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "dialUrl"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "dialUrl2"), 'errors');
        echo "</div>
                    <div class=\"labels\" id=\"ubicacion2\">Dial2:</div>
                    <div class=\"widgets\">";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "dialUrl2"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "direccion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Direccion:</div>
                    <div class=\"widgets\">";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "direccion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 91
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 93
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "observacion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 97
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "estatus"), 'errors');
        echo "</div>
                    <div class=\"labels\">Activo:</div>
                    <div class=\"widgets\">";
        // line 99
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "estatus"), 'widget', array("attr" => array("checked" => "checked")));
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 103
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "paquete"), 'errors');
        echo "</div>
                    <div class=\"labels\">Paquete:</div>
                    <div class=\"widgets\">";
        // line 105
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "paquete"), 'widget');
        echo "</div>
                </div>

                 <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 109
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urlweb"), 'errors');
        echo "</div>
                    <div class=\"labels\">Url Web:</div>
                    <div class=\"widgets\">";
        // line 111
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urlweb"), 'widget');
        echo "</div>
                </div>

                 <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 115
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urlfacebook"), 'errors');
        echo "</div>
                    <div class=\"labels\"><img width=\"25px\" src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/facebook.png"), "html", null, true);
        echo "\"></div>
                    <div class=\"widgets\">";
        // line 117
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urlfacebook"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 121
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urltwitter"), 'errors');
        echo "</div>
                    <div class=\"labels\"><img width=\"22px\" src=\"";
        // line 122
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/twitter.png"), "html", null, true);
        echo "\"></div>
                    <div class=\"widgets\">";
        // line 123
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urltwitter"), 'widget');
        echo "</div>
                </div>
            </div> 
        </fieldset>
        
        <br>
        
        <fieldset>
            <legend id=\"b\"><div class=\"divisor\">DATOS DE COMODATO</div></legend>
            <div id=\"comodato\">

                <div class=\"form-contenedor\">
                    <div>";
        // line 135
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "fechainicioacuerdo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fecha Inicio:</div>
                    <div class=\"widgets\">";
        // line 137
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "fechainicioacuerdo"), 'widget');
        echo "</div>
                </div>


                <div class=\"form-contenedor\">
                    <div>";
        // line 142
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "fechafinacuerdo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fecha Fin:</div>
                    <div class=\"widgets\">";
        // line 144
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "fechafinacuerdo"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 148
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "recibereceptor"), 'errors');
        echo "</div>
                    <div class=\"labels\">Recibe receptor:</div>
                    <div class=\"widgets\">";
        // line 150
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "recibereceptor"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 154
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 156
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "observacion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 160
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "objetocomodato"), 'errors');
        echo "</div>
                    <div class=\"labels\">Objeto Comodato:</div>
                    <div class=\"widgets\">";
        // line 162
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "objetocomodato"), 'widget');
        echo "</div>
                </div>
            </div>
        </fieldset>
        
        <br>
        
        <fieldset>
            <legend id=\"c\"><div class=\"divisor\">DATOS DE REPRESENTANTE</div> </legend>
            <div id=\"representante\">
                <div class=\"form-contenedor\">
                    <div>";
        // line 173
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "nombres"), 'errors');
        echo "</div>
                    <div class=\"labels\">Nombres:</div>
                    <div class=\"widgets\">";
        // line 175
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "nombres"), 'widget');
        echo "</div>
                </div>  

                <div class=\"form-contenedor\">
                    <div>";
        // line 179
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "apellidos"), 'errors');
        echo "</div>
                    <div class=\"labels\">Apellidos:</div>
                    <div class=\"widgets\">";
        // line 181
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "apellidos"), 'widget');
        echo "</div>
                </div>  

                <div class=\"form-contenedor\">
                    <div>";
        // line 185
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "cargo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cargo:</div>
                    <div class=\"widgets\">";
        // line 187
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "cargo"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 191
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "correo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Correo:</div>
                    <div class=\"widgets\">";
        // line 193
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "correo"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 197
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "telefono1"), 'errors');
        echo "</div>
                    <div class=\"labels\">Telefono1:</div>
                    <div class=\"widgets\">";
        // line 199
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "telefono1"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 203
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "telefono2"), 'errors');
        echo "</div>
                    <div class=\"labels\">Telefono2:</div>
                    <div class=\"widgets\">";
        // line 205
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "telefono2"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 209
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "fax"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fax:</div>
                    <div class=\"widgets\">";
        // line 211
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "fax"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 215
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 217
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "observacion"), 'widget');
        echo "</div>
                </div> 
            </div>
        </fieldset>


        <br>
       <button class=\"btn\" type=\"submit\">Crear</button> |
        <a class=\"btn\" href=\"";
        // line 225
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">Volver</a>

    


    </form>
    <div id=\"cod\"></div>
    <script src=\"";
        // line 232
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/distribucion/operador_new.js"), "html", null, true);
        echo "\"></script>

";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Operador:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  471 => 232,  450 => 217,  445 => 215,  438 => 211,  433 => 209,  426 => 205,  421 => 203,  414 => 199,  397 => 191,  390 => 187,  385 => 185,  378 => 181,  373 => 179,  366 => 175,  361 => 173,  347 => 162,  342 => 160,  335 => 156,  330 => 154,  323 => 150,  318 => 148,  311 => 144,  306 => 142,  293 => 135,  274 => 122,  270 => 121,  263 => 117,  255 => 115,  248 => 111,  243 => 109,  236 => 105,  231 => 103,  219 => 97,  212 => 93,  207 => 91,  200 => 87,  195 => 85,  159 => 67,  197 => 62,  544 => 259,  536 => 254,  532 => 253,  527 => 251,  522 => 249,  512 => 241,  504 => 238,  502 => 237,  499 => 236,  493 => 233,  489 => 231,  487 => 230,  484 => 229,  478 => 226,  472 => 223,  463 => 219,  459 => 217,  451 => 213,  443 => 208,  419 => 193,  411 => 190,  408 => 189,  403 => 188,  400 => 187,  382 => 173,  377 => 171,  370 => 167,  358 => 161,  353 => 159,  346 => 155,  333 => 148,  328 => 146,  313 => 134,  290 => 126,  271 => 116,  266 => 114,  259 => 116,  254 => 108,  242 => 102,  230 => 96,  223 => 92,  218 => 90,  211 => 86,  206 => 84,  194 => 78,  34 => 11,  129 => 52,  217 => 90,  213 => 89,  198 => 80,  190 => 75,  185 => 73,  178 => 69,  118 => 37,  191 => 81,  186 => 56,  179 => 73,  174 => 71,  167 => 67,  155 => 61,  150 => 55,  181 => 66,  153 => 66,  124 => 50,  113 => 36,  104 => 39,  23 => 3,  97 => 35,  76 => 23,  81 => 23,  161 => 61,  152 => 63,  148 => 65,  137 => 48,  102 => 42,  65 => 15,  58 => 13,  184 => 77,  175 => 68,  170 => 66,  192 => 83,  188 => 81,  180 => 78,  146 => 55,  134 => 57,  127 => 47,  110 => 37,  77 => 19,  63 => 14,  100 => 25,  90 => 32,  59 => 16,  53 => 14,  480 => 162,  474 => 224,  469 => 222,  461 => 225,  457 => 216,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 203,  430 => 144,  427 => 198,  423 => 142,  413 => 134,  409 => 197,  407 => 131,  402 => 193,  398 => 186,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 165,  362 => 110,  360 => 109,  355 => 106,  341 => 153,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 133,  305 => 132,  298 => 137,  294 => 127,  285 => 89,  283 => 122,  278 => 123,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 104,  241 => 77,  235 => 98,  229 => 73,  224 => 99,  220 => 70,  214 => 69,  208 => 68,  169 => 60,  143 => 55,  140 => 57,  132 => 40,  128 => 39,  119 => 50,  107 => 37,  71 => 20,  177 => 52,  165 => 81,  160 => 49,  135 => 55,  126 => 47,  114 => 48,  84 => 27,  70 => 19,  67 => 18,  61 => 18,  87 => 31,  31 => 4,  38 => 8,  26 => 1,  93 => 24,  88 => 34,  78 => 29,  46 => 9,  44 => 11,  28 => 6,  201 => 92,  196 => 90,  183 => 79,  171 => 73,  166 => 63,  163 => 62,  158 => 60,  156 => 46,  151 => 59,  142 => 51,  138 => 59,  136 => 41,  121 => 29,  117 => 46,  105 => 35,  91 => 25,  62 => 18,  49 => 8,  21 => 1,  25 => 3,  94 => 33,  89 => 24,  85 => 24,  75 => 25,  68 => 16,  56 => 17,  27 => 4,  24 => 3,  19 => 1,  79 => 24,  72 => 24,  69 => 17,  47 => 12,  40 => 6,  37 => 5,  22 => 2,  246 => 32,  157 => 67,  145 => 46,  139 => 42,  131 => 49,  123 => 43,  120 => 40,  115 => 36,  111 => 43,  108 => 27,  101 => 31,  98 => 31,  96 => 39,  83 => 22,  74 => 19,  66 => 19,  55 => 12,  52 => 11,  50 => 11,  43 => 8,  41 => 9,  35 => 6,  32 => 4,  29 => 3,  209 => 82,  203 => 82,  199 => 80,  193 => 61,  189 => 71,  187 => 74,  182 => 72,  176 => 75,  173 => 67,  168 => 66,  164 => 69,  162 => 65,  154 => 57,  149 => 44,  147 => 61,  144 => 52,  141 => 34,  133 => 41,  130 => 45,  125 => 42,  122 => 43,  116 => 45,  112 => 43,  109 => 39,  106 => 33,  103 => 35,  99 => 37,  95 => 31,  92 => 33,  86 => 23,  82 => 30,  80 => 27,  73 => 22,  64 => 16,  60 => 14,  57 => 15,  54 => 16,  51 => 11,  48 => 16,  45 => 7,  42 => 6,  39 => 7,  36 => 6,  33 => 4,  30 => 3,);
    }
}
