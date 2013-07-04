<?php

/* DistribucionBundle:Operador:info.html.twig */
class __TwigTemplate_697a77ce4057b4bb0e7054ba28667985 extends Twig_Template
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
        echo "    DISTRIBUCIÓN - TOTALIZACIÓN
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "  ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

  <div class=\"titulo\">TOTALIZACIÓN POR PAÍSES</div>

    <table class=\"records_list\" cellpadding=5px cellspacing=1 class=\"infooperador\">
        <tr>
          <th>País</th>
          ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tipooperador"));
        foreach ($context['_seq'] as $context["_key"] => $context["top"]) {
            // line 18
            echo "            <th>";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getContext($context, "top"), "operador")), "html", null, true);
            echo "</th>
           ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['top'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "         </tr>


        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "datos"));
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
        foreach ($context['_seq'] as $context["key"] => $context["dato"]) {
            // line 24
            echo "          <tr ";
            if (($this->getAttribute($this->getContext($context, "loop"), "index") % 2 == 1)) {
                echo "style=\"background-color: #e9f5fe;\"";
            }
            echo ">
            <td><a href=\"\">";
            // line 25
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "</a></td>
            ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "cantidadtipooperador")));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 27
                echo "              <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "dato"), $this->getContext($context, "i"), array(), "array"), "cantidad", array(), "array"), "html", null, true);
                echo " | ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "dato"), $this->getContext($context, "i"), array(), "array"), "totalabonados", array(), "array"), "html", null, true);
                echo "</td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "          </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['dato'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "    </table>
    <br>

  <a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("operador");
        echo "\">Volver</a>
  <br><br>
";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Operador:info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 34,  134 => 31,  119 => 29,  108 => 27,  104 => 26,  100 => 25,  93 => 24,  76 => 23,  71 => 20,  62 => 18,  58 => 17,  47 => 10,  44 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
