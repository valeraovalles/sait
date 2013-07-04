<?php

/* DistribucionBundle:Tipooperador:index.html.twig */
class __TwigTemplate_15f4d67867414afa9a6e9bfe256a1b35 extends Twig_Template
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Distribución";
    }

    // line 4
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 5
        echo "    TIPO DE OPERADOR - LISTA
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <div class=\"titulo\">LISTA DE TIPOS OPERADOR</div>

    ";
        // line 13
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "started")) {
            // line 14
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 15
                echo "            <div class=\"Greenflash-notice\">
                ";
                // line 16
                echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "
        ";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flashbag"), "get", array(0 => "alert"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 21
                echo "            <div class=\"Redflash-notice\">
                ";
                // line 22
                echo twig_escape_filter($this->env, $this->getContext($context, "flashMessage"), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "
    ";
        }
        // line 27
        echo "
    <table class=\"records_list\" cellpaddin=0 cellspacing=0>
        <thead>
            <tr>
                <th>Id</th>
                <th>Operador</th>
                <th>Codigo</th>
                <th>Userid</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 40
            echo "            <tr ";
            if (($this->getAttribute($this->getContext($context, "loop"), "index") % 2 == 1)) {
                echo "style=\"background-color: #e9f5fe;\"";
            }
            echo ">
                <td><a href=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tipooperador_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
            echo "</a></td>
                <td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "operador"), "html", null, true);
            echo "</td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "codigo"), "html", null, true);
            echo "</td>
                <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "user"), "html", null, true);
            echo "</td>
                <td>
          
                    <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tipooperador_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\"><img width=\"15px\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/busca.png"), "html", null, true);
            echo "\"></a>
         
                    <a href=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("tipooperador_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\"><img width=\"15px\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/edit.png"), "html", null, true);
            echo "\"></a>
  
                </td>
            </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "        </tbody>
    </table>

    <br>
    <a class=\"btn\" href=\"";
        // line 58
        echo $this->env->getExtension('routing')->getPath("tipooperador_new");
        echo "\">
        Ir a nuevo
    </a>
    <br><br>

    ";
    }

    public function getTemplateName()
    {
        return "DistribucionBundle:Tipooperador:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 58,  181 => 54,  160 => 49,  153 => 47,  147 => 44,  143 => 43,  139 => 42,  133 => 41,  126 => 40,  109 => 39,  95 => 27,  91 => 25,  82 => 22,  79 => 21,  75 => 20,  72 => 19,  63 => 16,  60 => 15,  55 => 14,  53 => 13,  47 => 10,  44 => 9,  39 => 5,  36 => 4,  30 => 2,);
    }
}
