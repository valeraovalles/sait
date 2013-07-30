<?php

/* LicenciasBundle:Licencias:vencidas.html.twig */
class __TwigTemplate_d81290bf3928f7c3adb1c70f90c1dcf0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::licencias.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::licencias.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "Licencias - Lista";
    }

    // line 13
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 14
        echo "    LICENCIAS
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <div class=\"titulo\">LISTA DE LICENCIAS VENCIDAS</div>
    <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"display\" id=\"tablalista\">
        <thead>
            <tr>
                <th width=\"5%\" align=\"center\">Codigo</th>
                <th width=\"30%\" align=\"center\">Nombre</th>
                <th width=\"17%\" align=\"center\">Fecha de Compra</th>
                <th width=\"20%\" align=\"center\">Fecha de Vencimiento</th>
                <th width=\"5%\">Acciones</th>
            </tr> 
        </thead>
        <tbody>
            ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 32
            echo "                <tr>
                    <td align=\"center\"><a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "codigo"), "html", null, true);
            echo "</a></td>
                    <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombre"), "html", null, true);
            echo "</td>
                    <td align=\"center\">";
            // line 35
            if ($this->getAttribute($this->getContext($context, "entity"), "fechaCompra")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaCompra"), "Y-m-d"), "html", null, true);
            }
            echo "</td>
                    <td align=\"center\">";
            // line 36
            if ($this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento"), "Y-m-d"), "html", null, true);
            }
            echo "</td>
                    
                    <td>
                            <a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
            echo "\"><img width=\"15px\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/lupa.png"), "html", null, true);
            echo "\"></a>
                        ";
            // line 40
            if (($this->getContext($context, "rol") == 1)) {
                echo " 
                            <a href=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
                echo "\"><img width=\"15px\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/edit.png"), "html", null, true);
                echo "\"></a>
                            <a href=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
                echo "\"><img width=\"15px\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/mal.png"), "html", null, true);
                echo "\"></a>
                        ";
            }
            // line 44
            echo "                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "        </tbody>
    </table>
    <br><br><br><br>
        <a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("reporte_pdf");
        echo "\"><img width=\"40px\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/pdf.gif"), "html", null, true);
        echo "\"></a> &nbsp;
        <a href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("reporte_pdf");
        echo "\"><img width=\"40px\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excel.png"), "html", null, true);
        echo "\"></a> &nbsp;
    <br><br>
";
    }

    public function getTemplateName()
    {
        return "LicenciasBundle:Licencias:vencidas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 50,  151 => 49,  146 => 46,  139 => 44,  132 => 42,  126 => 41,  122 => 40,  116 => 39,  108 => 36,  102 => 35,  98 => 34,  92 => 33,  89 => 32,  85 => 31,  69 => 18,  66 => 17,  61 => 14,  58 => 13,  52 => 11,  45 => 8,  42 => 7,  35 => 4,  32 => 3,);
    }
}
