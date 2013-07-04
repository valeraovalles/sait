<?php

/* DistribucionBundle:Default:index.html.twig */
class __TwigTemplate_8945fcb1a6ece6d3db92eda836486df6 extends Twig_Template
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
        return array (  207 => 70,  204 => 69,  199 => 65,  196 => 64,  187 => 57,  169 => 53,  161 => 52,  150 => 50,  141 => 46,  134 => 44,  131 => 43,  127 => 41,  120 => 39,  114 => 37,  110 => 36,  104 => 35,  101 => 34,  98 => 33,  94 => 32,  89 => 31,  87 => 30,  84 => 29,  67 => 28,  40 => 5,  37 => 4,  31 => 2,);
    }
}
