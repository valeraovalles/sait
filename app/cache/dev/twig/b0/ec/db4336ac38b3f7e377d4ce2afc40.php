<?php

/* LicenciasBundle:Licencias:index.html.twig */
class __TwigTemplate_b0ecdb4336ac38b3f7e377d4ce2afc40 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::licencias.html.twig");

        $this->blocks = array(
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
    public function block_title($context, array $blocks = array())
    {
        echo "Licencias - Lista";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    LICENCIAS
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    <div class=\"titulo\">LISTA DE LICENCIAS</div>


    <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"display\" id=\"tablalista\">
        <thead>
            <tr>
                <th width=\"5%\">Codigo</th>
                <th width=\"25%\">Nombre</th>
                <th width=\"17%\">Fecha de Compra</th>
                <th width=\"20%\">Fecha de Vencimiento</th>
                <th>STATUS</th>
                <th>Acciones</th>
            </tr> 
        </thead>
        <tbody>

            ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 28
            echo "                <tr>
                    <td align=\"center\"><a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "codigo"), "html", null, true);
            echo "</a></td>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nombre"), "html", null, true);
            echo "</td>
                    <td align=\"center\">";
            // line 31
            if ($this->getAttribute($this->getContext($context, "entity"), "fechaCompra")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaCompra"), "Y-m-d"), "html", null, true);
            }
            echo "</td>
                    <td align=\"center\">";
            // line 32
            if ($this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento"), "Y-m-d"), "html", null, true);
            }
            echo "</td>
                    ";
            // line 33
            if (((twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento"), "Y-m-d") > $this->getContext($context, "hoy")) && (twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento"), "Y-m-d") > $this->getContext($context, "mes")))) {
                // line 34
                echo "                       <td align=\"center\"> ACTIVO </td>
                    ";
            } elseif (((twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento"), "Y-m-d") >= $this->getContext($context, "hoy")) && (twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento"), "Y-m-d") <= $this->getContext($context, "mes")))) {
                // line 36
                echo "                        <td align=\"center\" style=\"color:red;\"> POR VENCER </td>
                    ";
            } elseif ((twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fechaVencimiento"), "Y-m-d") < $this->getContext($context, "hoy"))) {
                // line 38
                echo "                        <td  align=\"center\" style=\"color:red;\"> VENCIDO </td>
                    ";
            }
            // line 40
            echo "                    <td>
                           <a href=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
            echo "\"><img width=\"15px\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/lupa.png"), "html", null, true);
            echo "\"></a>
                        
                        ";
            // line 43
            if (($this->getContext($context, "rol") == 1)) {
                echo " 
                            <a href=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
                echo "\"><img width=\"15px\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/edit.png"), "html", null, true);
                echo "\"></a>
                            <a href=\"";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("licencias_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"), "retorno" => $this->getContext($context, "retorno"))), "html", null, true);
                echo "\"><img width=\"15px\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/mal.png"), "html", null, true);
                echo "\"></a>
                        ";
            }
            // line 46
            echo " 
                   </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "        </tbody>
    </table>
<br>
        <a href=\"";
        // line 53
        echo $this->env->getExtension('routing')->getPath("reporte_pdf");
        echo "\"><img width=\"40px\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/pdf.jpg"), "html", null, true);
        echo "\"></a> &nbsp;
        <a href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getPath("reporte_pdf");
        echo "\"><img width=\"40px\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excel.png"), "html", null, true);
        echo "\"></a> &nbsp;
    <br><br>
";
    }

    public function getTemplateName()
    {
        return "LicenciasBundle:Licencias:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 54,  151 => 53,  146 => 50,  137 => 46,  130 => 45,  124 => 44,  120 => 43,  113 => 41,  110 => 40,  106 => 38,  102 => 36,  98 => 34,  96 => 33,  90 => 32,  84 => 31,  80 => 30,  74 => 29,  71 => 28,  67 => 27,  47 => 10,  44 => 9,  39 => 6,  36 => 5,  30 => 3,);
    }
}
