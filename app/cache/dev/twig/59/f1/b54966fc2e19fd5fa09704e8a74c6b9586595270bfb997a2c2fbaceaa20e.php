<?php

/* DistribucionBundle:Operador:new.html.twig */
class __TwigTemplate_59f1b54966fc2e19fd5fa09704e8a74c6b9586595270bfb997a2c2fbaceaa20e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::distribucion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
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
        echo "NUEVO OPERADOR";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    NUEVO OPERADOR
";
    }

    // line 9
    public function block_ubicacion($context, array $blocks = array())
    {
        // line 10
        echo "<ol class=\"breadcrumb\">
  <li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("usuario_homepage");
        echo "\">INICIO</a></li>
  <li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("distribucion_homepage");
        echo "\">DISTRIBUCIÓN INICIO</a></li>
  <li><a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">LISTA DE OPERADORES</a></li>
  <li class=\"active\">NUEVO OPERADOR</li>

</ol>
";
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
        // line 20
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    
    <form name=\"form1\" class=\"formNewEditOperador\" novalidate action=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("operador_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">

        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "
        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "_token"), 'widget');
        echo "

            <div class=\"alert alert-info\">DATOS DE OPERADOR</div><br>
            <div id=\"operador\">
                <div class=\"formShow\">
                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Operador:</div>
                        <div class=\"widgetform\">";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre"), 'widget');
        echo "</div>
                    </div>
                    
                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipooperador"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Tipo operador:</div>
                        <div class=\"widgetform\">";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipooperador"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pais"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Pais:</div>
                        <div class=\"widgetform\">";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pais"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "estado"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Estado:</div>
                        <div id=\"estado\">
                            <div class=\"widgetform\">";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "estado"), 'widget');
        echo "</div>
                        </div>
                    </div>

                    <div class=\"contenedorform\">
                        <div id=\"franjatransmision\" style=\"display:none;\">
                            <div>";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "franjatransmision"), 'errors');
        echo "</div>
                            <div class=\"labelform\">Franja transmision:</div>
                            <div class=\"widgetform\">";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "franjatransmision"), 'widget');
        echo "</div>
                        </div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cobertura"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Cobertura:</div>
                        <div class=\"widgetform\">";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cobertura"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "zona"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Zona:</div>
                        <div class=\"widgetform\">";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "zona"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 77
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "numeroabonados"), 'errors');
        echo "</div>
                        <div class=\"labelform\" id=\"usuario\">Nro. Abonados:</div>
                        <div class=\"widgetform\">";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "numeroabonados"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 83
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dialUrl"), 'errors');
        echo "</div>
                        <div class=\"labelform\" id=\"ubicacion1\">Dial1:</div>
                        <div class=\"widgetform\">";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dialUrl"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 89
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dialUrl2"), 'errors');
        echo "</div>
                        <div class=\"labelform\" id=\"ubicacion2\">Dial2:</div>
                        <div class=\"widgetform\">";
        // line 91
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "dialUrl2"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 95
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Direccion:</div>
                        <div class=\"widgetform\">";
        // line 97
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 101
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "observacion"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Observacion:</div>
                        <div class=\"widgetform\">";
        // line 103
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "observacion"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 107
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paquete"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Paquete:</div>
                        <div class=\"widgetform\">";
        // line 109
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paquete"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 113
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "urlweb"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Url Web:</div>
                        <div class=\"widgetform\">";
        // line 115
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "urlweb"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 119
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "urlfacebook"), 'errors');
        echo "</div>
                        <div class=\"labelform\"><img width=\"25px\" src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/facebook.png"), "html", null, true);
        echo "\"></div>
                        <div class=\"widgetform\">";
        // line 121
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "urlfacebook"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 125
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "urltwitter"), 'errors');
        echo "</div>
                        <div class=\"labelform\"><img width=\"22px\" src=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/twitter.png"), "html", null, true);
        echo "\"></div>
                        <div class=\"widgetform\">";
        // line 127
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "urltwitter"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 131
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "estatus"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Activo:</div>
                        <div class=\"widgetform\">";
        // line 133
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "estatus"), 'widget', array("attr" => array("checked" => "checked")));
        echo "</div>
                    </div>
                </div>
            </div>        
        <br>
        
        <div class=\"alert alert-info\">DATOS DE COMODATO</div><br>
            <div id=\"comodato\">
                <div class=\"formShow\">
                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 143
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "fechainicioacuerdo"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Fecha Inicio Transmisión:</div>
                        <div class=\"widgetform\">";
        // line 145
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "fechainicioacuerdo"), 'widget', array("attr" => array("readonly" => "readonly")));
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 149
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "fechafinacuerdo"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Fecha Fin Transmisión:</div>
                        <div class=\"widgetform\">";
        // line 151
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "fechafinacuerdo"), 'widget', array("attr" => array("readonly" => "readonly")));
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 155
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "recibereceptor"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Recibe receptor: </div>
                        <div class=\"widgetform\" style=\"margin-bottom:10px;\">";
        // line 157
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "recibereceptor"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 161
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "fecharecepcion"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Fecha recepción:</div>
                        <div class=\"widgetform\">";
        // line 163
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "fecharecepcion"), 'widget', array("attr" => array("readonly" => "readonly")));
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 167
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "observacion"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Observacion:</div>
                        <div class=\"widgetform\">";
        // line 169
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "observacion"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 173
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "objetocomodato"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Objeto Comodato:</div>
                        <div class=\"widgetform\">";
        // line 175
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "comodato"), "objetocomodato"), 'widget');
        echo "</div>
                    </div>
                </div>
            </div>
        
        <br>
        
            <div class=\"alert alert-info\">DATOS DE REPRESENTANTE</div><br>
            <div id=\"representante\">
                <div class=\"formShow\">
                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 186
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "nombres"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Nombres:</div>
                        <div class=\"widgetform\">";
        // line 188
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "nombres"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 192
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "apellidos"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Apellidos:</div>
                        <div class=\"widgetform\">";
        // line 194
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "apellidos"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 198
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "cargo"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Cargo:</div>
                        <div class=\"widgetform\">";
        // line 200
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "cargo"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 204
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "correo"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Correo:</div>
                        <div class=\"widgetform\">";
        // line 206
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "correo"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"text-danger\">";
        // line 210
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "telefono1"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Telefono1:</div>
                        <div class=\"widgetform\">";
        // line 212
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "telefono1"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 216
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "telefono2"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Telefono2:</div>
                        <div class=\"widgetform\">";
        // line 218
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "telefono2"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 222
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "fax"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Fax:</div>
                        <div class=\"widgetform\">";
        // line 224
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "fax"), 'widget');
        echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div>";
        // line 228
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "observacion"), 'errors');
        echo "</div>
                        <div class=\"labelform\">Observacion:</div>
                        <div class=\"widgetform\">";
        // line 230
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form2"]) ? $context["form2"] : $this->getContext($context, "form2")), "observacion"), 'widget');
        echo "</div>
                    </div>
                </div> 
            </div>

        <br>
       <button class=\"btn btn-primary\" type=\"submit\">CREAR</button> |
        <a class=\"btn btn-default\" href=\"";
        // line 237
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">VOLVER</a>

    


    </form>
    <div id=\"cod\"></div>

    <script type=\"text/javascript\">
        \$(document).ready(function () {
            //ajax de pais
            \$('#frontend_distribucionbundle_operadortype_pais').change(function(){
                    var dato = \$(\"#frontend_distribucionbundle_operadortype_pais\").val();
                    var ruta = \"";
        // line 250
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pais_estado_ciudad", array("id" => "variable", "mostrar" => "estado")), "html", null, true);
        echo "\";
                    ruta = ruta.replace(\"variable\", dato);
                    \$('#estado').load(ruta);
            });
        });
    </script>

  <script>
      \$(function() {
        \$( \"#frontend_distribucionbundle_operadortype_comodato_fechainicioacuerdo\" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: \"dd-mm-yy\",
        });
        \$( \"#frontend_distribucionbundle_operadortype_comodato_fechafinacuerdo\" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: \"dd-mm-yy\",
        });
        \$( \"#frontend_distribucionbundle_operadortype_comodato_fecharecepcion\" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: \"dd-mm-yy\",
        });
      });
  </script>

    <script src=\"";
        // line 277
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/distribucion/js/operador_new.js"), "html", null, true);
        echo "\"></script>

    <br>
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
        return array (  540 => 277,  510 => 250,  494 => 237,  484 => 230,  479 => 228,  472 => 224,  467 => 222,  460 => 218,  455 => 216,  448 => 212,  443 => 210,  436 => 206,  431 => 204,  424 => 200,  419 => 198,  412 => 194,  407 => 192,  400 => 188,  395 => 186,  381 => 175,  376 => 173,  369 => 169,  364 => 167,  357 => 163,  352 => 161,  345 => 157,  340 => 155,  333 => 151,  328 => 149,  321 => 145,  316 => 143,  303 => 133,  298 => 131,  291 => 127,  287 => 126,  283 => 125,  276 => 121,  272 => 120,  268 => 119,  261 => 115,  256 => 113,  249 => 109,  244 => 107,  237 => 103,  232 => 101,  225 => 97,  220 => 95,  213 => 91,  208 => 89,  201 => 85,  196 => 83,  189 => 79,  184 => 77,  177 => 73,  172 => 71,  165 => 67,  160 => 65,  152 => 60,  147 => 58,  138 => 52,  132 => 49,  125 => 45,  120 => 43,  113 => 39,  108 => 37,  101 => 33,  96 => 31,  87 => 25,  83 => 24,  76 => 22,  71 => 20,  68 => 19,  59 => 13,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
