<?php

/* DistribucionBundle:Default:index.html.twig */
class __TwigTemplate_49ec2c8ef6696f248960e3bb8e5681e0c0a2d952826d12379a6e92f91ae927b4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::distribucion.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    BIENVENIDO AL SISTEMA DE DISTRIBUCIÓN
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
  <li class=\"active\">DISTRIBUCIÓN INICIO</li>
</ol>
";
    }

    // line 16
    public function block_javascripts($context, array $blocks = array())
    {
        // line 17
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
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paises"]) ? $context["paises"] : $this->getContext($context, "paises")));
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
            // line 41
            echo "            
            ";
            // line 42
            ob_start();
            // line 43
            echo "                <table cellpadding=5px cellspacing=1 class=\"infomapa\"><tr><th colspan=3>País: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pais"]) ? $context["pais"] : $this->getContext($context, "pais")), "pais"), "html", null, true);
            echo "</th></tr><tr><th>Operador</th><th>Cantidad</th><th>Abonados</th></tr>
                    ";
            // line 44
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["operadores"]) ? $context["operadores"] : $this->getContext($context, "operadores")));
            foreach ($context['_seq'] as $context["_key"] => $context["operador"]) {
                // line 45
                echo "                        ";
                if (twig_in_filter($this->getAttribute((isset($context["pais"]) ? $context["pais"] : $this->getContext($context, "pais")), "pais"), $this->getAttribute((isset($context["operador"]) ? $context["operador"] : $this->getContext($context, "operador")), "pais"))) {
                    // line 46
                    echo "                            <tr>
                               <td><a href='";
                    // line 47
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("operador_list", array("idpais" => $this->getAttribute((isset($context["pais"]) ? $context["pais"] : $this->getContext($context, "pais")), "id"), "idtipooperador" => $this->getAttribute((isset($context["operador"]) ? $context["operador"] : $this->getContext($context, "operador")), "id"))), "html", null, true);
                    echo "'>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["operador"]) ? $context["operador"] : $this->getContext($context, "operador")), "operador"), "html", null, true);
                    echo "</a></td>
                               <td>";
                    // line 48
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["operador"]) ? $context["operador"] : $this->getContext($context, "operador")), "cantidad"), "html", null, true);
                    echo "</td>
                               <td>";
                    // line 49
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["operador"]) ? $context["operador"] : $this->getContext($context, "operador")), "totalabonados"), "html", null, true);
                    echo "</td>
                            </tr>
                        ";
                }
                // line 51
                echo "                    
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['operador'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "                </table>
            ";
            $context["datos"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 55
            echo "
            var contentString";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo " = '";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (isset($context["datos"]) ? $context["datos"] : $this->getContext($context, "datos")), "js"), "html", null, true);
            echo "';

            var infowindow";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo " = new google.maps.InfoWindow({content: contentString";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo "});

            var image = 'http://www.telesurtv.net/favicon.ico';

            var marker";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo " = new google.maps.Marker({position: new google.maps.LatLng(";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pais"]) ? $context["pais"] : $this->getContext($context, "pais")), "latitud"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pais"]) ? $context["pais"] : $this->getContext($context, "pais")), "longitud"), "html", null, true);
            echo "),title:\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pais"]) ? $context["pais"] : $this->getContext($context, "pais")), "pais"), "html", null, true);
            echo "\", icon:image});

            google.maps.event.addListener(marker";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo ",'click', function() {infowindow";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo ".open(map,marker";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo ");});
            marker";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
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
        // line 69
        echo "

        }

  </script>
";
    }

    // line 76
    public function block_body($context, array $blocks = array())
    {
        // line 77
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

    <div id=\"map_canvas\" style=\"width:90%; height:500px\"></div>

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
        return array (  222 => 77,  219 => 76,  210 => 69,  192 => 65,  184 => 64,  173 => 62,  164 => 58,  157 => 56,  154 => 55,  150 => 53,  143 => 51,  137 => 49,  133 => 48,  127 => 47,  124 => 46,  121 => 45,  117 => 44,  112 => 43,  110 => 42,  107 => 41,  90 => 40,  63 => 17,  60 => 16,  52 => 11,  49 => 10,  46 => 9,  41 => 6,  38 => 5,  32 => 3,);
    }
}
