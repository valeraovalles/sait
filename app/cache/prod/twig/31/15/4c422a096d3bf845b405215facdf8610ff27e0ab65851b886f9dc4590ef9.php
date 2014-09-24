<?php

/* SitBundle:Seguimiento:_comentario.html.twig */
class __TwigTemplate_31154c422a096d3bf845b405215facdf8610ff27e0ab65851b886f9dc4590ef9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Modal -->
<div class=\"modal fade\" id=\"comentario\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" style=\"width: 1500px;\">
    <div class=\"modal-content\" style=\"width: 1500px;\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">COMENTARIO</h4>
      </div>
      <div class=\"modal-body\">
            <script type=\"text/javascript\">
                tinyMCE.init({
                        // General options
                        mode : \"exact\",
                        elements : \"elm2\",
                        theme : \"advanced\",
                        plugins : \"autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave\",

                        // Theme options
                        theme_advanced_buttons1 : \"save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect\",
                        theme_advanced_buttons2 : \"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,insertdate,inserttime,preview,|,forecolor,backcolor\",
                        theme_advanced_buttons3 : \"tablecontrols,|,hr,removeformat,visualaid,|,charmap,emotions,iespell,advhr,print\",
                        theme_advanced_toolbar_location : \"top\",
                        theme_advanced_toolbar_align : \"left\",
                        theme_advanced_statusbar_location : \"bottom\",
                        theme_advanced_resizing : true,

                        // Example content CSS (should be your site CSS)
                        content_css : \"css/content.css\",

                        // Drop lists for link/image/media/template dialogs
                        template_external_list_url : \"lists/template_list.js\",
                        external_link_list_url : \"lists/link_list.js\",
                        external_image_list_url : \"lists/image_list.js\",
                        media_external_list_url : \"lists/media_list.js\",

                        // Replace values for the template plugin
                        template_replace_values : {
                                username : \"Some User\",
                                staffid : \"991234\"
                        }
                });
            </script>

            ";
        // line 44
        if (((isset($context["errorc"]) ? $context["errorc"] : $this->getContext($context, "errorc")) != null)) {
            // line 45
            echo "            <div class=\"alert alert-danger errores\" style=\"width:80%; text-align: left;\">
                <div><b>Alerta! Ha ocurrido un error en al enviar el correo:</b><br><br></div>
                ";
            // line 47
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errorc"]) ? $context["errorc"] : $this->getContext($context, "errorc")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                echo "<div><ul><li>";
                echo twig_escape_filter($this->env, (isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "html", null, true);
                echo "</li></ul></div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "            </div>
            <script>
                \$('#comentario').modal(\"show\")
            </script>
            ";
        }
        // line 53
        echo "            
            <div style=\"width: 80%;\"  class=\"alert alert-info\">AL REALIZAR UN COMENTARIO, SERÁ ENVIADO UN CORREO AL SOLICITANTE Y AL RESPONSABLE DEL TICKET</div>
            <form method=\"post\" action=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sit_guardacomentario", array("idticket" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "id"))), "html", null, true);
        echo "\">
                <textarea id=\"elm2\" name=\"elm2\" rows=\"15\" cols=\"80\" style=\"width: 80%; height: 300px;\">
                </textarea><br>
                <input class=\"btn btn-primary\" type=\"submit\" value=\"ENVIAR COMENTARIO\">
            </form>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">CERRAR</button>
      </div>
    </div>
  </div>
</div>


";
    }

    public function getTemplateName()
    {
        return "SitBundle:Seguimiento:_comentario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 47,  192 => 117,  158 => 86,  151 => 82,  141 => 75,  137 => 74,  117 => 60,  111 => 59,  89 => 51,  85 => 50,  73 => 47,  69 => 45,  67 => 44,  30 => 10,  157 => 59,  153 => 58,  150 => 57,  148 => 56,  140 => 52,  130 => 50,  120 => 46,  118 => 45,  115 => 44,  113 => 43,  108 => 40,  106 => 39,  97 => 35,  92 => 55,  86 => 30,  81 => 48,  71 => 26,  64 => 44,  59 => 20,  52 => 16,  41 => 12,  35 => 9,  29 => 6,  24 => 4,  19 => 1,  236 => 89,  230 => 85,  223 => 82,  221 => 81,  218 => 80,  213 => 78,  208 => 77,  206 => 76,  200 => 72,  189 => 69,  181 => 68,  178 => 67,  170 => 65,  167 => 64,  165 => 63,  161 => 62,  156 => 60,  152 => 59,  149 => 58,  145 => 55,  131 => 45,  128 => 44,  125 => 43,  123 => 63,  119 => 40,  110 => 37,  107 => 57,  103 => 38,  100 => 52,  91 => 31,  88 => 53,  84 => 29,  77 => 48,  66 => 45,  63 => 18,  55 => 13,  51 => 12,  48 => 11,  45 => 14,  40 => 7,  37 => 6,  31 => 7,);
    }
}
