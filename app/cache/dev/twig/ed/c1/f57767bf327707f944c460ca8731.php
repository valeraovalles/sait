<?php

/* DistribucionBundle:Operador:new.html.twig */
class __TwigTemplate_edc1f57767bf327707f944c460ca8731 extends Twig_Template
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

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cobertura"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cobertura:</div>
                    <div class=\"widgets\">";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "cobertura"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "zona"), 'errors');
        echo "</div>
                    <div class=\"labels\">Zona:</div>
                    <div class=\"widgets\">";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "zona"), 'widget');
        echo "</div>
                </div>
                    
                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "numeroabonados"), 'errors');
        echo "</div>
                    <div class=\"labels\">Nro. Abonados:</div>
                    <div class=\"widgets\">";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "numeroabonados"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "direccion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Direccion:</div>
                    <div class=\"widgets\">";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "direccion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "observacion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "estatus"), 'errors');
        echo "</div>
                    <div class=\"labels\">Estatus:</div>
                    <div class=\"widgets\">";
        // line 83
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "estatus"), 'widget', array("attr" => array("checked" => "checked")));
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "paquete"), 'errors');
        echo "</div>
                    <div class=\"labels\">Paquete:</div>
                    <div class=\"widgets\">";
        // line 89
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "paquete"), 'widget');
        echo "</div>
                </div>

                 <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 93
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urlweb"), 'errors');
        echo "</div>
                    <div class=\"labels\">Url Web:</div>
                    <div class=\"widgets\">";
        // line 95
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urlweb"), 'widget');
        echo "</div>
                </div>

                 <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 99
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urlfacebook"), 'errors');
        echo "</div>
                    <div class=\"labels\"><img width=\"25px\" src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/facebook.png"), "html", null, true);
        echo "\"></div>
                    <div class=\"widgets\">";
        // line 101
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urlfacebook"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div class=\"text-warning\">";
        // line 105
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "urltwitter"), 'errors');
        echo "</div>
                    <div class=\"labels\"><img width=\"22px\" src=\"";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/twitter.png"), "html", null, true);
        echo "\"></div>
                    <div class=\"widgets\">";
        // line 107
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
        // line 119
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "fechainicioacuerdo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fecha Inicio:</div>
                    <div class=\"widgets\">";
        // line 121
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "fechainicioacuerdo"), 'widget');
        echo "</div>
                </div>


                <div class=\"form-contenedor\">
                    <div>";
        // line 126
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "fechafinacuerdo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fecha Fin:</div>
                    <div class=\"widgets\">";
        // line 128
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "fechafinacuerdo"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 132
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "dialUrl"), 'errors');
        echo "</div>
                    <div class=\"labels\">Dial|Url (1):</div>
                    <div class=\"widgets\">";
        // line 134
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "dialUrl"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 138
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "dialUrl2"), 'errors');
        echo "</div>
                    <div class=\"labels\">Dial|Url (2):</div>
                    <div class=\"widgets\">";
        // line 140
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "dialUrl2"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 144
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 146
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "observacion"), 'widget');
        echo "</div>
                </div>

                <div class=\"form-contenedor\">
                    <div>";
        // line 150
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "comodato"), "objetocomodato"), 'errors');
        echo "</div>
                    <div class=\"labels\">Objeto Comodato:</div>
                    <div class=\"widgets\">";
        // line 152
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
        // line 163
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "nombres"), 'errors');
        echo "</div>
                    <div class=\"labels\">Nombres:</div>
                    <div class=\"widgets\">";
        // line 165
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "nombres"), 'widget');
        echo "</div>
                </div>  

                <div class=\"form-contenedor\">
                    <div>";
        // line 169
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "apellidos"), 'errors');
        echo "</div>
                    <div class=\"labels\">Apellidos:</div>
                    <div class=\"widgets\">";
        // line 171
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "apellidos"), 'widget');
        echo "</div>
                </div>  

                <div class=\"form-contenedor\">
                    <div>";
        // line 175
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "cargo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Cargo:</div>
                    <div class=\"widgets\">";
        // line 177
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "cargo"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 181
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "correo"), 'errors');
        echo "</div>
                    <div class=\"labels\">Correo:</div>
                    <div class=\"widgets\">";
        // line 183
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "correo"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 187
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "telefono1"), 'errors');
        echo "</div>
                    <div class=\"labels\">Telefono1:</div>
                    <div class=\"widgets\">";
        // line 189
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "telefono1"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 193
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "telefono2"), 'errors');
        echo "</div>
                    <div class=\"labels\">Telefono2:</div>
                    <div class=\"widgets\">";
        // line 195
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "telefono2"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 199
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "fax"), 'errors');
        echo "</div>
                    <div class=\"labels\">Fax:</div>
                    <div class=\"widgets\">";
        // line 201
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "fax"), 'widget');
        echo "</div>
                </div> 

                <div class=\"form-contenedor\">
                    <div>";
        // line 205
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labels\">Observacion:</div>
                    <div class=\"widgets\">";
        // line 207
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form2"), "observacion"), 'widget');
        echo "</div>
                </div> 
            </div>
        </fieldset>


        <br>
       <button class=\"btn\" type=\"submit\">Crear</button> |
        <a class=\"btn\" href=\"";
        // line 215
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">Volver</a>

    


    </form>



    


    <script src=\"";
        // line 227
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
        return array (  454 => 227,  439 => 215,  428 => 207,  423 => 205,  416 => 201,  411 => 199,  404 => 195,  399 => 193,  392 => 189,  387 => 187,  380 => 183,  375 => 181,  368 => 177,  363 => 175,  356 => 171,  351 => 169,  344 => 165,  339 => 163,  325 => 152,  320 => 150,  313 => 146,  308 => 144,  301 => 140,  296 => 138,  289 => 134,  284 => 132,  277 => 128,  272 => 126,  264 => 121,  259 => 119,  244 => 107,  240 => 106,  236 => 105,  229 => 101,  225 => 100,  221 => 99,  214 => 95,  209 => 93,  202 => 89,  197 => 87,  190 => 83,  185 => 81,  178 => 77,  173 => 75,  166 => 71,  161 => 69,  154 => 65,  149 => 63,  142 => 59,  137 => 57,  130 => 53,  125 => 51,  117 => 46,  111 => 43,  104 => 39,  99 => 37,  92 => 33,  87 => 31,  80 => 27,  75 => 25,  66 => 19,  62 => 18,  54 => 16,  47 => 12,  44 => 11,  39 => 7,  36 => 6,  30 => 3,);
    }
}
