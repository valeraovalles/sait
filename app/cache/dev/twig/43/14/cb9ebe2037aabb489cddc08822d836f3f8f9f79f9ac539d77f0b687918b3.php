<?php

/* DistribucionBundle:Operador:edit.html.twig */
class __TwigTemplate_4314cb9ebe2037aabb489cddc08822d836f3f8f9f79f9ac539d77f0b687918b3 extends Twig_Template
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
        echo "EDITAR OPERADOR";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    EDITAR OPERADOR ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre")), "html", null, true);
        echo " ";
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estatus") == 1)) {
            echo "(ACTIVO)";
        } else {
            echo "<br><br><div class='Redflash-notice'>INACTIVO</div>";
        }
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
  <li class=\"active\">EDITAR OPERADOR</li>

</ol>
";
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
        // line 20
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    ";
        // line 22
        if (((isset($context["verifica"]) ? $context["verifica"] : $this->getContext($context, "verifica")) != null)) {
            // line 23
            echo "        <div class=\"alert alert-danger\">
            ";
            // line 24
            echo twig_escape_filter($this->env, (isset($context["verifica"]) ? $context["verifica"] : $this->getContext($context, "verifica")), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 27
        echo "
    <form novalidate class=\"formNewEditOperador\" action=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_update", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'enctype');
        echo ">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "_token"), 'widget');
        echo "


        <div class=\"alert alert-info\">DATOS DE OPERADOR</div>
            <div class=\"formShow\">
                <div class=\"contenedorform\">
                    <div class=\"text-danger\">";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "nombre"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Operador:</div>
                    <div class=\"widgetform\">";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "nombre"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "tipooperador"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Tipo operador:</div>
                    <div class=\"widgetform\">";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "tipooperador"), 'widget');
        echo "</div>
                </div>
  
                <div class=\"contenedorform\">
                    <div>";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "pais"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Pais:</div>
                    <div class=\"widgetform\">";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "pais"), 'widget');
        echo "</div>
                </div>
                
                <div class=\"contenedorform\">
                    <div>";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "estado"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Estado:</div>
                    <div id=\"estado\">
                        <div class=\"widgetform\">";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "estado"), 'widget');
        echo "</div>
                    </div>
                </div>

                <div class=\"contenedorform\" id=\"franjatransmision\" style=\"display:none;\">
                    <div>";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "franjatransmision"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Franja transmision:</div>
                    <div class=\"widgetform\">";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "franjatransmision"), 'widget');
        echo "</div>
                </div>
                 
                <div class=\"contenedorform\">
                    <div>";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cobertura"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Cobertura:</div>
                    <div class=\"widgetform\">";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cobertura"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "zona"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Zona:</div>
                    <div class=\"widgetform\">";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "zona"), 'widget');
        echo "</div>
                </div>
                    
                <div class=\"contenedorform\">
                    <div>";
        // line 80
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "numeroabonados"), 'errors');
        echo "</div>
                    <div class=\"labelform\" id=\"usuario\">Nro. Abonados:</div>
                    <div class=\"widgetform\">";
        // line 82
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "numeroabonados"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "dialUrl"), 'errors');
        echo "</div>
                    <div class=\"labelform\" id=\"ubicacion1\">Dial1:</div>
                    <div class=\"widgetform\">";
        // line 88
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "dialUrl"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "dialUrl2"), 'errors');
        echo "</div>
                    <div class=\"labelform\" id=\"ubicacion2\">Dial2:</div>
                    <div class=\"widgetform\">";
        // line 94
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "dialUrl2"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 98
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "direccion"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Direccion:</div>
                    <div class=\"widgetform\">";
        // line 100
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "direccion"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 104
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Observacion:</div>
                    <div class=\"widgetform\">";
        // line 106
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "observacion"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 110
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "estatus"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Activo:</div>
                    <div class=\"widgetform\">";
        // line 112
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "estatus"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 116
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "paquete"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Paquete:</div>
                    <div class=\"widgetform\">";
        // line 118
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "paquete"), 'widget');
        echo "</div>
                </div>

                 <div class=\"contenedorform\">
                    <div>";
        // line 122
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "urlweb"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Url Web:</div>
                    <div class=\"widgetform\">";
        // line 124
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "urlweb"), 'widget');
        echo "</div>
                </div>

                 <div class=\"contenedorform\">
                    <div>";
        // line 128
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "urlfacebook"), 'errors');
        echo "</div>
                    <div class=\"labelform\"><img width=\"25px\" src=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/facebook.png"), "html", null, true);
        echo "\"></div>
                    <div class=\"widgetform\">";
        // line 130
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "urlfacebook"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 134
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "urltwitter"), 'errors');
        echo "</div>
                    <div class=\"labelform\"><img width=\"22px\" src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/twitter.png"), "html", null, true);
        echo "\"></div>
                    <div class=\"widgetform\">";
        // line 136
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "urltwitter"), 'widget');
        echo "</div>
                </div>
            </div> 

        <br>
        
            <div class=\"alert alert-info\">DATOS DE COMODATO</div>
            <div class=\"formShow\">
                <div class=\"contenedorform\">
                    <div>";
        // line 145
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "fechainicioacuerdo"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Fecha Inicio:</div>
                    <div class=\"widgetform\">";
        // line 147
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "fechainicioacuerdo"), 'widget');
        echo "</div>
                </div>


                <div class=\"contenedorform\">
                    <div>";
        // line 152
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "fechafinacuerdo"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Fecha Fin:</div>
                    <div class=\"widgetform\">";
        // line 154
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "fechafinacuerdo"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 158
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "recibereceptor"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Recibe receptor:</div>
                    <div class=\"widgetform\">";
        // line 160
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "recibereceptor"), 'widget');
        echo "</div>
                </div>
                
                <div class=\"contenedorform\">
                    <div>";
        // line 164
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "fecharecepcion"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Fecha recepción:</div>
                    <div class=\"widgetform\">";
        // line 166
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "fecharecepcion"), 'widget');
        echo "</div>
                </div>
                
                <div class=\"contenedorform\">
                    <div>";
        // line 170
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "observacion"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Observacion:</div>
                    <div class=\"widgetform\">";
        // line 172
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "observacion"), 'widget');
        echo "</div>
                </div>

                <div class=\"contenedorform\">
                    <div>";
        // line 176
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "objetocomodato"), 'errors');
        echo "</div>
                    <div class=\"labelform\">Objeto Comodato:</div>
                    <div class=\"widgetform\">";
        // line 178
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "comodato"), "objetocomodato"), 'widget');
        echo "</div>
                </div>
            </div>
        </fieldset>

        <br>        

        <div class=\"alert alert-info\">DATOS DE REPRESENTANTE</div>
        <div class=\"formShow\">
            <div class=\"form-show_edit\">

                ";
        // line 189
        $context["cont"] = 0;
        // line 190
        echo "                ";
        $context["largo"] = twig_length_filter($this->env, (isset($context["representante"]) ? $context["representante"] : $this->getContext($context, "representante")));
        // line 191
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["representante"]) ? $context["representante"] : $this->getContext($context, "representante")));
        foreach ($context['_seq'] as $context["_key"] => $context["re"]) {
            // line 192
            echo "
                    <div class=\"alert alert-warning\"><a onclick=\"return confirm('No olvide guardar los datos del formulario principal o los datos se perderán, ¿desea continuar?')\" href=\"";
            // line 193
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("representante_edit", array("id" => $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "id"))), "html", null, true);
            echo "\">EDITAR REPRESENTANTE ";
            echo twig_escape_filter($this->env, ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1), "html", null, true);
            echo "</a></div>
                    <div class=\"contenedorform\">
                        <div class=\"labelform\">Nombres:</div>
                        <div class=\"widgetform\">";
            // line 196
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "nombres"), "html", null, true);
            echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"labelform\">Apellidos:</div>
                        <div class=\"widgetform\">";
            // line 201
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "apellidos"), "html", null, true);
            echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"labelform\">Cargo:</div>
                        <div class=\"widgetform\">";
            // line 206
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "cargo"), "html", null, true);
            echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"labelform\">correo:</div>
                        <div class=\"widgetform\">";
            // line 211
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "correo"), "html", null, true);
            echo "</div>
                    </div>

                    <div class=\"contenedorform\">
                        <div class=\"labelform\">Telefono 1:</div>
                        <div class=\"widgetform\">";
            // line 216
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "telefono1"), "html", null, true);
            echo "</div>
                    </div>

                    ";
            // line 219
            if (($this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "telefono2") != "")) {
                // line 220
                echo "                        <div class=\"contenedorform\">
                            <div class=\"labelform\">Telefono 2:</div>
                            <div class=\"widgetform\">";
                // line 222
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "telefono2"), "html", null, true);
                echo "</div>
                        </div>
                    ";
            }
            // line 225
            echo "
                    ";
            // line 226
            if (($this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "fax") != "")) {
                // line 227
                echo "                        <div class=\"contenedorform\">
                            <div class=\"labelform\">Fax:</div>
                            <div class=\"widgetform\">";
                // line 229
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "fax"), "html", null, true);
                echo "</div>
                        </div>
                    ";
            }
            // line 232
            echo "
                    ";
            // line 233
            if (($this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "observacion") != "")) {
                // line 234
                echo "                        <div class=\"contenedorform\">
                            <div class=\"labelform\">Observacion:</div>
                            <div class=\"widgetform\">";
                // line 236
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "observacion"), "html", null, true);
                echo "</div>
                        </div>
                    ";
            }
            // line 239
            echo "
                    ";
            // line 240
            $context["cont"] = ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1);
            // line 241
            echo "
                   
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['re'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 244
        echo "            </div>
        </div>
        <br>
        <button class=\"btn btn-primary\" type=\"submit\">EDITAR</button>

    </form>

    <form action=\"";
        // line 251
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\" onsubmit=\"return confirm('¿Seguro que desea borrar el operador y sus representantes?')\">
        <input class=\"btn\" type=\"hidden\" name=\"_method\" value=\"DELETE\" />
        ";
        // line 253
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
        <button class=\"btn btn-danger\" type=\"submit\">DESACTIVAR</button> | 
        <a class=\"btn btn-default\" href=\"";
        // line 255
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">LISTA DE OPERADORES</a> | 
        <a class=\"btn btn-default\" href=\"";
        // line 256
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_list", array("idpais" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pais"), "id"), "idtipooperador" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "id"))), "html", null, true);
        echo "\">LISTA DE TIPO OPERADOR POR PAÍS</a> | 
        <a class=\"btn btn-default\" href=\"";
        // line 257
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">IR A CONSULTAR</a>
    </form>

    <br>

    <script type=\"text/javascript\">
        \$(document).ready(function () {
            //ajax de pais
            \$('#frontend_distribucionbundle_operadortype_pais').change(function(){
                    var dato = \$(\"#frontend_distribucionbundle_operadortype_pais\").val();
                    var ruta = \"";
        // line 267
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
        // line 292
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
        return array (  592 => 292,  564 => 267,  551 => 257,  547 => 256,  543 => 255,  538 => 253,  533 => 251,  524 => 244,  516 => 241,  514 => 240,  511 => 239,  505 => 236,  501 => 234,  499 => 233,  496 => 232,  490 => 229,  486 => 227,  484 => 226,  481 => 225,  475 => 222,  471 => 220,  469 => 219,  463 => 216,  455 => 211,  447 => 206,  439 => 201,  431 => 196,  423 => 193,  420 => 192,  415 => 191,  412 => 190,  410 => 189,  396 => 178,  391 => 176,  384 => 172,  379 => 170,  372 => 166,  367 => 164,  360 => 160,  355 => 158,  348 => 154,  343 => 152,  335 => 147,  330 => 145,  318 => 136,  314 => 135,  310 => 134,  303 => 130,  299 => 129,  295 => 128,  288 => 124,  283 => 122,  276 => 118,  271 => 116,  264 => 112,  259 => 110,  252 => 106,  247 => 104,  240 => 100,  235 => 98,  228 => 94,  223 => 92,  216 => 88,  211 => 86,  204 => 82,  199 => 80,  192 => 76,  187 => 74,  180 => 70,  175 => 68,  168 => 64,  163 => 62,  155 => 57,  149 => 54,  142 => 50,  137 => 48,  130 => 44,  125 => 42,  118 => 38,  113 => 36,  104 => 30,  97 => 28,  94 => 27,  88 => 24,  85 => 23,  83 => 22,  77 => 20,  74 => 19,  65 => 13,  61 => 12,  57 => 11,  54 => 10,  51 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
