<?php

/* DistribucionBundle:Operador:show.html.twig */
class __TwigTemplate_94df9c94f1a41f91633d57fb7d6f9e5d8ba61dba9f74f408ad4a3211faa0d2ca extends Twig_Template
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
        echo "CONSULTAR OPERADOR";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    EL OPERADOR ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre")), "html", null, true);
        echo " ESTÁ ";
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
  <li class=\"active\">CONSULTAR OPERADOR</li>

</ol>
";
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
        // line 20
        echo "
";
        // line 21
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div class=\"alert alert-info\">DATOS DE OPERADOR</div>
    <div id=\"operador\">
    <div class=\"formShow\">
        <div class=\"contenedorform\">
            <div class=\"labelform\">Nombre:</div>
            <div class=\"widgetform\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
                <div class=\"labelform\">Tipo Operador:</div>
                <div class=\"widgetform\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
                <div class=\"labelform\">Pais:</div>
                <div class=\"widgetform\">";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pais"), "pais"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
                <div class=\"labelform\">Estado:</div>
                <div class=\"widgetform\">
                    ";
        // line 44
        $context["cont"] = 0;
        // line 45
        echo "                    ";
        $context["largo"] = twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estado"));
        // line 46
        echo "                    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "estado"));
        foreach ($context['_seq'] as $context["_key"] => $context["es"]) {
            echo " 
                        ";
            // line 47
            $context["cont"] = ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1);
            // line 48
            echo "                        ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["es"]) ? $context["es"] : $this->getContext($context, "es")), "estado"), "html", null, true);
            if (((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) == ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1))) {
                echo " y";
            } elseif ((((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) > 1) && ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) < ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1)))) {
                echo ",";
            } else {
                echo ".";
            }
            // line 49
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['es'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                </div>
        </div>

        <div class=\"contenedorform\">
                <div class=\"labelform\">Cobertura:</div>
                <div class=\"widgetform\">";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cobertura"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
                <div class=\"labelform\">Zona:</div>
                <div class=\"widgetform\">";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "zona"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
                <div class=\"labelform\">
                    ";
        // line 65
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "id") == 4)) {
            // line 66
            echo "                        Potenciales televidentes:
                    ";
        } elseif (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "id") == 5)) {
            // line 68
            echo "                        Suscriptores:
                    ";
        } else {
            // line 70
            echo "                        Abonados:
                    ";
        }
        // line 72
        echo "                </div>
                <div class=\"widgetform\">";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "numeroabonados"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
                <div class=\"labelform\">
                    ";
        // line 78
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "id") == 4)) {
            // line 79
            echo "                        Canal1:
                    ";
        } else {
            // line 81
            echo "                        Dial1:
                    ";
        }
        // line 83
        echo "                </div>
                <div class=\"widgetform\">";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dialurl"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 87
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dialurl2") != "")) {
            // line 88
            echo "            <div class=\"contenedorform\">
                <div class=\"labelform\">
                    ";
            // line 90
            if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "id") == 4)) {
                // line 91
                echo "                        Canal2:
                    ";
            } else {
                // line 93
                echo "                        Dial2:
                    ";
            }
            // line 95
            echo "                </div>
                    <div class=\"widgetform\">";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dialurl2"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 99
        echo "
        <div class=\"contenedorform\">
                <div class=\"labelform\">Direccion:</div>
                <div class=\"widgetform\">";
        // line 102
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "direccion"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 105
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "observacion") != "")) {
            // line 106
            echo "            <div class=\"contenedorform\">
                    <div class=\"labelform\">Observacion:</div>
                    <div class=\"widgetform\">";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "observacion"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 111
        echo "
        <div class=\"contenedorform\">
                <div class=\"labelform\">Paquete:</div>
                <div class=\"widgetform\">";
        // line 114
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "paquete"), "paquete"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 117
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "urlweb") != "")) {
            // line 118
            echo "            <div class=\"contenedorform\">
                    <div class=\"labelform\">Url Web:</div>
                    <div class=\"widgetform\">";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "urlweb"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 123
        echo "
        ";
        // line 124
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "urlfacebook") != "")) {
            // line 125
            echo "            <div class=\"contenedorform\">
                    <div class=\"labelform\">Url Facebook:</div>
                    <div class=\"widgetform\">";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "urlfacebook"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 130
        echo "
        ";
        // line 131
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "urltwitter") != "")) {
            // line 132
            echo "            <div class=\"contenedorform\">
                    <div class=\"labelform\">Url Twitter:</div>
                    <div class=\"widgetform\">";
            // line 134
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "urltwitter"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 137
        echo "
            <div class=\"contenedorform\">
                <div class=\"labelform\">Última Modificación:</div>
                <div class=\"widgetform\">";
        // line 140
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "primernombre")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user"), "primerapellido")), "html", null, true);
        echo "</div>
            </div>

    </div>
    </div>

    <div class=\"alert alert-info\">DATOS DE COMODATO</div>
    <div id=\"comodato\">
    <div class=\"formShow\">
        <div class=\"contenedorform\">
            <div class=\"labelform\">Código:</div>
            <div class=\"widgetform\">";
        // line 151
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "codigo"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">Fecha Inicio:</div>
            <div class=\"widgetform\">";
        // line 156
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "fechainicioacuerdo"), "m/d/Y"), "html", null, true);
        echo "</div>
        </div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">Fecha Fin:</div>
            <div class=\"widgetform\">";
        // line 161
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "fechafinacuerdo"), "m/d/Y"), "html", null, true);
        echo "</div>
        </div>

        ";
        // line 164
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "observacion") != "")) {
            // line 165
            echo "            <div class=\"contenedorform\">
                    <div class=\"labelform\">Observacion:</div>
                    <div class=\"widgetform\">";
            // line 167
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "observacion"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 170
        echo "
        <div class=\"contenedorform\">
                <div class=\"labelform\">Recibe receptor:</div>
                <div class=\"widgetform\">";
        // line 173
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "recibereceptor") == "1")) {
            echo "Sí";
        } else {
            echo "No";
        }
        echo "</div>
        </div>

        ";
        // line 176
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "fecharecepcion") != "")) {
            // line 177
            echo "            <div class=\"contenedorform\">
                <div class=\"labelform\">Fecha recepción:</div>
                <div class=\"widgetform\">";
            // line 179
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "fecharecepcion"), "m/d/Y"), "html", null, true);
            echo "</div>
            </div>
        ";
        }
        // line 182
        echo "
        <div class=\"contenedorform\">
            <div class=\"labelform\">Objetos de Comodato:</div>
                <div class=\"widgetform\">

                    ";
        // line 187
        $context["cont"] = 0;
        // line 188
        echo "                    ";
        $context["largo"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "objetocomodato"));
        // line 189
        echo "                    ";
        if (((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) == 0)) {
            // line 190
            echo "                    Ninguno
                    ";
        } else {
            // line 192
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "comodato"), "objetocomodato"));
            foreach ($context['_seq'] as $context["_key"] => $context["co"]) {
                echo " 
                        ";
                // line 193
                $context["cont"] = ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1);
                // line 194
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["co"]) ? $context["co"] : $this->getContext($context, "co")), "objeto"), "html", null, true);
                if (((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) == ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1))) {
                    echo " y";
                } elseif ((((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) > 1) && ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) < ((isset($context["largo"]) ? $context["largo"] : $this->getContext($context, "largo")) - 1)))) {
                    echo ",";
                } else {
                    echo ".";
                }
                // line 195
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['co'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 196
            echo "                    ";
        }
        // line 197
        echo "              </div>
        </div>
    </div>
    </div>


    <div class=\"alert alert-info\">DATOS DE REPRESENTANTE</div>
    ";
        // line 204
        if ($this->env->getExtension('security')->isGranted("ROLE_DISTRIBUCION_ADMINISTRADOR")) {
            // line 205
            echo "    <div><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("representante_new_add", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">(Agregar Nuevo Representante)</a></div>
    <br>
    ";
        }
        // line 208
        echo "    <div id=\"representante\">
    <div class=\"formShow\">

    ";
        // line 211
        $context["cont"] = 0;
        // line 212
        echo "    ";
        $context["largo"] = twig_length_filter($this->env, (isset($context["representante"]) ? $context["representante"] : $this->getContext($context, "representante")));
        // line 213
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["representante"]) ? $context["representante"] : $this->getContext($context, "representante")));
        foreach ($context['_seq'] as $context["_key"] => $context["re"]) {
            // line 214
            echo "
        <div style=\"background-color:
#e9f5fe; padding-bottom:5px;font-weight:bold;\">REPRESENTANTE ";
            // line 216
            echo twig_escape_filter($this->env, ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1), "html", null, true);
            echo "</div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">Nombres:</div>
            <div class=\"widgetform\">";
            // line 220
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "nombres"), "html", null, true);
            echo "</div>
        </div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">Apellidos:</div>
            <div class=\"widgetform\">";
            // line 225
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "apellidos"), "html", null, true);
            echo "</div>
        </div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">Cargo:</div>
            <div class=\"widgetform\">";
            // line 230
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "cargo"), "html", null, true);
            echo "</div>
        </div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">correo:</div>
            <div class=\"widgetform\">";
            // line 235
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "correo"), "html", null, true);
            echo "</div>
        </div>

        <div class=\"contenedorform\">
            <div class=\"labelform\">Telefono 1:</div>
            <div class=\"widgetform\">";
            // line 240
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "telefono1"), "html", null, true);
            echo "</div>
        </div>

        ";
            // line 243
            if (($this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "telefono2") != "")) {
                // line 244
                echo "            <div class=\"contenedorform\">
                <div class=\"labelform\">Telefono 2:</div>
                <div class=\"widgetform\">";
                // line 246
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "telefono2"), "html", null, true);
                echo "</div>
            </div>
        ";
            }
            // line 249
            echo "
        ";
            // line 250
            if (($this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "fax") != "")) {
                // line 251
                echo "            <div class=\"contenedorform\">
                <div class=\"labelform\">Fax:</div>
                <div class=\"widgetform\">";
                // line 253
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "fax"), "html", null, true);
                echo "</div>
            </div>
        ";
            }
            // line 256
            echo "
        ";
            // line 257
            if (($this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "observacion") != "")) {
                // line 258
                echo "            <div class=\"contenedorform\">
                <div class=\"labelform\">Observacion:</div>
                <div class=\"widgetform\">";
                // line 260
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["re"]) ? $context["re"] : $this->getContext($context, "re")), "observacion"), "html", null, true);
                echo "</div>
            </div>
        ";
            }
            // line 263
            echo "
        ";
            // line 264
            $context["cont"] = ((isset($context["cont"]) ? $context["cont"] : $this->getContext($context, "cont")) + 1);
            // line 265
            echo "      
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['re'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 267
        echo "    </div>
</div>

<br>


<a class=\"btn btn-default\" href=\"";
        // line 273
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">LISTA DE OPERADORES</a> | 
<a class=\"btn btn-default\" href=\"";
        // line 274
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_list", array("idpais" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pais"), "id"), "idtipooperador" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipooperador"), "id"))), "html", null, true);
        echo "\">LISTA DE TIPO OPERADOR POR PAÍS</a>";
        if ($this->env->getExtension('security')->isGranted("ROLE_DISTRIBUCION_ADMINISTRADOR")) {
            echo " |
<a class=\"btn btn-default\" href=\"";
            // line 275
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">IR A EDITAR</a> |
<a class=\"btn btn-default\" href=\"";
            // line 276
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_new", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">IR A NUEVO</a>
";
        }
        // line 278
        echo "
<br><br>

";
        // line 281
        if ($this->env->getExtension('security')->isGranted("ROLE_DISTRIBUCION_ADMINISTRADOR")) {
            // line 282
            echo "<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" method=\"post\" onsubmit=\"return confirm('¿Seguro que desea borrar el operador y sus representantes?')\">
    <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
    ";
            // line 284
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
            echo "
    <button class=\"btn btn-danger\" type=\"submit\">DESACTIVAR</button>
</form>
";
        }
        // line 288
        echo "





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
        return array (  625 => 288,  618 => 284,  612 => 282,  610 => 281,  605 => 278,  600 => 276,  596 => 275,  590 => 274,  586 => 273,  578 => 267,  571 => 265,  569 => 264,  566 => 263,  560 => 260,  556 => 258,  554 => 257,  551 => 256,  545 => 253,  541 => 251,  539 => 250,  536 => 249,  530 => 246,  526 => 244,  524 => 243,  518 => 240,  510 => 235,  502 => 230,  494 => 225,  486 => 220,  479 => 216,  475 => 214,  470 => 213,  467 => 212,  465 => 211,  460 => 208,  453 => 205,  451 => 204,  442 => 197,  439 => 196,  433 => 195,  423 => 194,  421 => 193,  414 => 192,  410 => 190,  407 => 189,  404 => 188,  402 => 187,  395 => 182,  389 => 179,  385 => 177,  383 => 176,  373 => 173,  368 => 170,  362 => 167,  358 => 165,  356 => 164,  350 => 161,  342 => 156,  334 => 151,  318 => 140,  313 => 137,  307 => 134,  303 => 132,  301 => 131,  298 => 130,  292 => 127,  288 => 125,  286 => 124,  283 => 123,  277 => 120,  273 => 118,  271 => 117,  265 => 114,  260 => 111,  254 => 108,  250 => 106,  248 => 105,  242 => 102,  237 => 99,  231 => 96,  228 => 95,  224 => 93,  220 => 91,  218 => 90,  214 => 88,  212 => 87,  206 => 84,  203 => 83,  199 => 81,  195 => 79,  193 => 78,  185 => 73,  182 => 72,  178 => 70,  174 => 68,  170 => 66,  168 => 65,  160 => 60,  152 => 55,  145 => 50,  139 => 49,  129 => 48,  127 => 47,  120 => 46,  117 => 45,  115 => 44,  106 => 38,  98 => 33,  90 => 28,  80 => 21,  77 => 20,  74 => 19,  65 => 13,  61 => 12,  57 => 11,  54 => 10,  51 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
