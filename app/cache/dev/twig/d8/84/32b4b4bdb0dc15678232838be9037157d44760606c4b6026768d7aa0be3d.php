<?php

/* SitBundle:Seguimiento:_enviocorreo.html.twig */
class __TwigTemplate_d88432b4b4bdb0dc15678232838be9037157d44760606c4b6026768d7aa0be3d extends Twig_Template
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
<div class=\"modal fade\" id=\"correo\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" style=\"width: 1200px;\">
    <div class=\"modal-content\" style=\"width: 1200px;\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">ENVÍO DE CORREO</h4>
      </div>
      <div class=\"modal-body\">
            <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("libs/tinymce/jscripts/tiny_mce/tiny_mce.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\">
                tinyMCE.init({
                        // General options
                        mode : \"exact\",
                        elements : \"correo_cuerpo\",
                        theme : \"advanced\",
                        plugins : \"autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave\",

                        // Theme options
                        theme_advanced_buttons1 : \"save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect\",
                        theme_advanced_buttons2 : \"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,insertdate,inserttime,preview,|,forecolor,backcolor|tablecontrols,|,hr,removeformat,visualaid,|,charmap,emotions,iespell,advhr,print\",
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
        if ((((($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "cuerpo"), 'errors') || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "para"), 'errors')) || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "asunto"), 'errors')) || $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "file"), 'errors')) || ((isset($context["errore"]) ? $context["errore"] : $this->getContext($context, "errore")) != null))) {
            // line 45
            echo "            <div class=\"alert alert-danger errores\" style=\"width:80%; text-align: left;\">
                <div><b>Alerta! Ha ocurrido un error en al enviar el correo:</b><br><br></div>
                <div>";
            // line 47
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "cuerpo"), 'errors');
            echo "</div>
                <div>";
            // line 48
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "para"), 'errors');
            echo "</div>
                <div>";
            // line 49
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "asunto"), 'errors');
            echo "</div>
                <div>";
            // line 50
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "file"), 'errors');
            echo "</div>
                ";
            // line 51
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errore"]) ? $context["errore"] : $this->getContext($context, "errore")));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                echo "<div><ul><li>";
                echo twig_escape_filter($this->env, (isset($context["e"]) ? $context["e"] : $this->getContext($context, "e")), "html", null, true);
                echo "</li></ul></div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "            </div>
            <script>
                \$('#correo').modal(\"show\")
            </script>
            ";
        }
        // line 57
        echo "            
            <div style=\"width: 100%;\"  class=\"alert alert-info\">ENVÍA UN CORREO SOLO SI DESEAS INFORMAR A OTRA PERSONA QUE NO SEA EL SOLICITANTE O EL RESPONSABLE DEL TICKET.</div>
            <form novalidate method=\"post\" action=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sit_guardacorreo", array("idticket" => $this->getAttribute((isset($context["ticket"]) ? $context["ticket"] : $this->getContext($context, "ticket")), "id"))), "html", null, true);
        echo "\"  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), 'enctype');
        echo ">
                ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "_token"), 'widget');
        echo "
                <div class=\"row\">
                <div class=\"col-md-6\">
                    ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "cuerpo"), 'widget', array("attr" => array("style" => "width:50%;height:300px;")));
        echo "
                </div>
                <div class=\"col-md-6\">
                    <table class=\"table table-bordered\" style=\"width: 70%;\">
                        <tr>
                            <th colspan=\"2\" style=\"text-align: center;\">DATOS DE ENVÍO</th>
                        </tr>
                        <tr>
                            <th>Para: </th>
                            <td>
                                <input type=\"text\" id=\"buscar\" placeholder=\"Buscar\">
                                ";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "para"), 'widget', array("attr" => array("autocomplete" => "off", "style" => "display:none;")));
        echo "
                                <div id=\"loading\" style=\"display:none;\"><img src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/cargando.gif"), "html", null, true);
        echo "\"></div>
                                <div id=\"ajaxlistado\"></div>
                                <div id=\"tags\"></div>
                            </td>
                        </tr>
                        <tr>
                            <th>Asunto: </th>
                            <td>";
        // line 82
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "asunto"), 'widget');
        echo "</td>
                        </tr>
                        <tr>
                            <th>Archivo: </th>
                            <td>";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formcs"]) ? $context["formcs"] : $this->getContext($context, "formcs")), "file"), 'widget');
        echo "</td>
                        </tr>
                        <tr>
                            <td colspan=\"2\" style=\"text-align: center;\"><input class=\"btn btn-primary\" type=\"submit\" value=\"ENVIAR\"></td>
                        </tr>
                    </table>
                </div>
            </div>
            </form>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">CERRAR</button>
      </div>
    </div>
  </div>
</div>




    <script type=\"text/javascript\">

    //ajax para buscar usuarios
    \$(document).ready(function () {
      \$('#buscar').keyup(function(){

        if(\$('#buscar').val()==''){
            \$('#ajaxlistado').html(\"\");
        }
        else {
             var ruta= \"";
        // line 117
        echo $this->env->getExtension('routing')->getPath("ajax_listadocorreo", array("letra" => "letra"));
        echo "\";
             ruta = ruta.replace(\"letra\",  \$('#buscar').val());

             \$.ajax({
               url: ruta,
               type : 'POST',
               beforeSend: function(){
                \$(\"#loading\").show();
               },
               complete: function(){
                 \$(\"#loading\").hide();
               },
               success: function(data){
                \$('#ajaxlistado').html(data);
               }
             });
        }
      });


    });

    //armar lista de usuarios seleccionados
    function armarlista(correo){

        listaoculta = \$('#correo_para').val()

        //valido que no se agregue dos veces el mismo usuario
        listaarray=listaoculta.split(\",\");
        if(jQuery.inArray(correo, listaarray)!=-1){\$('#ajaxlistausuario').hide();\$('#buscar').val('');return;}


        if(listaoculta=='')
            listaoculta=correo
        else
            listaoculta=listaoculta+','+correo

        \$('#correo_para').val(listaoculta)
        \$('#ajaxlistausuario').hide()
        \$('#buscar').val('')

        tags()
    }

    //agrego las etiquetas
    function tags(){

        \$('#tags').html('');
        listaoculta = \$('#correo_para').val()

        //transformo la lista en un array
        listaarray=listaoculta.split(\",\");tag=\"\";
        for(var i=0;i<listaarray.length;i++){
            user=listaarray[i].replace(\"@telesurtv.net\",\"\")
            tag='<div class=\"tags\" id=\"'+user+'\" onclick=\"eliminartag(\\''+user+'\\')\">'+user+'@telesurtv.net</div>';
            \$('#tags').append(tag)
        }
    }

    //eliminar usuarios
    function eliminartag(user){
        \$('#'+user).remove()
        \$('#'+user).remove()

        listaoculta = \$('#correo_para').val()
        listaoculta=listaoculta.replace(\",\"+user+\"@telesurtv.net\",\"\")
        listaoculta=listaoculta.replace(user+\"@telesurtv.net,\",\"\")
        listaoculta=listaoculta.replace(user+\"@telesurtv.net\",\"\")
        \$('#correo_para').val(listaoculta)
    }

    //
    if(\$('#correo_para').val()!=''){
        tags()
    }

</script>";
    }

    public function getTemplateName()
    {
        return "SitBundle:Seguimiento:_enviocorreo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 117,  158 => 86,  141 => 75,  117 => 60,  111 => 59,  107 => 57,  89 => 51,  85 => 50,  77 => 48,  73 => 47,  67 => 44,  167 => 64,  157 => 59,  153 => 58,  150 => 57,  145 => 55,  140 => 52,  123 => 63,  120 => 46,  118 => 45,  115 => 44,  113 => 43,  108 => 40,  103 => 38,  97 => 35,  92 => 33,  86 => 30,  71 => 26,  64 => 22,  59 => 20,  52 => 16,  45 => 14,  41 => 12,  35 => 9,  31 => 7,  29 => 6,  24 => 4,  19 => 1,  232 => 86,  226 => 82,  219 => 79,  217 => 78,  214 => 77,  209 => 75,  204 => 74,  202 => 73,  196 => 69,  185 => 66,  177 => 65,  174 => 64,  171 => 63,  161 => 61,  154 => 59,  151 => 82,  148 => 56,  146 => 56,  142 => 55,  137 => 74,  133 => 52,  130 => 50,  126 => 50,  112 => 38,  109 => 37,  106 => 39,  104 => 35,  100 => 52,  91 => 30,  88 => 31,  84 => 28,  81 => 49,  72 => 24,  69 => 45,  65 => 22,  58 => 20,  47 => 12,  44 => 11,  39 => 7,  36 => 6,  30 => 10,);
    }
}
