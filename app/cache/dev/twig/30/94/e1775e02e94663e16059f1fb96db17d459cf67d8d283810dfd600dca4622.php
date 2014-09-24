<?php

/* TransporteBundle:Solicitudes:new.html.twig */
class __TwigTemplate_3094e1775e02e94663e16059f1fb96db17d459cf67d8d283810dfd600dca4622 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::transporte.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulo' => array($this, 'block_titulo'),
            'ubicacion' => array($this, 'block_ubicacion'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::transporte.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Crear Solicitud";
    }

    // line 5
    public function block_titulo($context, array $blocks = array())
    {
        // line 6
        echo "    CREAR SOLICITUD
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
  <li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("missolicitudes");
        echo "\">LISTADO DE MIS SOLICITUDES</a></li>
  <li class=\"active\">CREAR SOLICITUD</li>
</ol>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        $this->displayParentBlock("body", $context, $blocks);
        echo "


  <form novalidate action=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("solicitudes_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "               
    <div class=\"formShow\"><br>
      <div class=\"contenedorform\">
        <div class=\"labelform\">Fecha de Solicitud:</div> 
        <div class=\"widgetform\">";
        // line 25
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "m/d/Y"), "html", null, true);
        echo "</div>
      </div>
      <div class=\"contenedorform\">
        <div class=\"text-error\">";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaSalida"), 'errors');
        echo "</div>
        <div class=\"labelform\">Fecha Salida:</div>
        <div class=\"widgetform\">                
          ";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaSalida"), 'widget', array("attr" => array("class" => "fecha", "readOnly" => 0)));
        echo "
        </div>
      </div>        
      <div class=\"contenedorform\">
          <div class=\"text-error\">";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "horaSalida"), 'errors');
        echo "</div>
          <div class=\"labelform\">Hora Salida:</div>
          <div class=\"widgetform\">";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "horaSalida"), 'widget', array("attr" => array("class" => "hora")));
        echo "</div>   
      </div>        
      <div class=\"contenedorform\">
          <div class=\"labelform\">Tipo de Personal:</div>
          <div class=\"widgetform\">
              <select name=\"tipop\" id=\"tipop\" title=\"Seleccione el tipo de personal a trasladar para Buscar en el siguiente campo...\">
                  <option value=\"I\">Interno</option>
                  <option value=\"E\">Externo</option>
              </select>
          </div>            
      </div>    
      <div class=\"contenedorform\">                       
        <div class=\"labelform\">Personal a Trasladar:</div>
        <div class=\"widgetform\" id=\"lista\">
          <input type=\"text\" id=\"buscar\" placeholder=\"Coloque aqui la cédula o nombre a buscar\" title=\"Escriba los nombres para listar. Recuerde diferenciar  minúsculas de mayúsculas\" style=\"width:400px;height:50px;\" autocomplete=off>
        </div>
      </div>
      <div class=\"contenedorform\">                       
        <div class=\"labelform\"></div>
        <div class=\"widgetform\"> 
                    
                  <div class=\"widgetform\" id=\"ajaxlistado\" 'attr': {'style': 'width:350%;height:200px;' title=\"Haga click para eliminar de la lista\"  >
                  </div>

                  ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "asistentes"), 'widget', array("attr" => array("style" => "display:none")));
        echo "  
                  <div id=\"tags\"></div>
            </div>
        </div>           
        <div class=\"contenedorform\">
            <div class=\"text-error\">";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccionDesde"), 'errors');
        echo "</div>
            <div class=\"labelform\">Direccion Desde u Origen:</div>
            <div class=\"widgetform\">";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccionDesde"), 'widget', array("attr" => array("style" => "width:80%;height:100px;")));
        echo "</div> 
        </div>       
        <div class=\"contenedorform\">
            <div class=\"text-error\">";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccionHasta"), 'errors');
        echo "</div>
            <div class=\"labelform\">Direccion Hasta o Destino:</div>
            <div class=\"widgetform\">";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccionHasta"), 'widget', array("attr" => array("style" => "width:80%;height:100px;")));
        echo "</div>
        </div>        
        <div class=\"contenedorform\">
            <div class=\"text-error\">";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcionEquipos"), 'errors');
        echo "</div>
            <div class=\"labelform\">Equipos/Implementos a trasladar:</div>
            <div class=\"widgetform\">";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descripcionEquipos"), 'widget', array("attr" => array("style" => "width:80%;height:100px;")));
        echo "</div>
        </div>        
        <div class=\"contenedorform\">
            <div class=\"text-error\">";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "datosInteresRazon"), 'errors');
        echo "</div>
            <div class=\"labelform\">Motivo de la Solicitud:</div>
            <div class=\"widgetform\">";
        // line 83
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "datosInteresRazon"), 'widget', array("attr" => array("style" => "width:80%;height:100px;")));
        echo "</div>
        </div>  
      </div>
        <br>
            <button class=\"btn btn-primary\" type=\"submit\">CREAR</button> |
        <a class=\"btn btn-default\" href=\"";
        // line 88
        echo $this->env->getExtension('routing')->getPath("missolicitudes");
        echo "\">IR AL LISTADO</a>
        <br>
    </form>


<script type=\"text/javascript\">
  \$(
    function(){
      \$( \".fecha\" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: \"yy-mm-dd\",
        });
    });

  \$(\".hora select\").css(
    {
      'width':'40px',
    });

   //ajax para buscar usuarios
    \$(document).ready(function () 
    {
      \$('#buscar').keyup(function()
      {
        if(\$('#buscar').val()=='')
        {
          \$('#ajaxlistado').html('');
        }else
        {
          if (\$('#tipop').val()==\"I\")
          {
            var ruta= \"";
        // line 120
        echo $this->env->getExtension('routing')->getPath("solicitudes_ajaxusuarios", array("val" => "val"));
        echo "\";
            ruta = ruta.replace(\"val\",  \$('#buscar').val());
          }else
          {
            var ruta= \"";
        // line 124
        echo $this->env->getExtension('routing')->getPath("solicitudes_ajaxexternos", array("val" => "val"));
        echo "\";
            ruta = ruta.replace(\"val\",  \$('#buscar').val());
          }
          \$.ajax
          (
            {
              url: ruta,
              type : 'POST',
              beforeSend: function()
              {
                \$(\"#loading\").show();
              },
              complete: function()
              {
                \$(\"#loading\").hide();
              },
              success: function(data)
              {
                \$('#ajaxlistado').html(data);
              }
            }
          );    
        }
      });
    });

    

    //armar lista de usuarios seleccionados
    function armarlista(valor){

        listaoculta = \$('#form_solicitud_asistentes').val()

        //valido que no se agregue dos veces el mismo usuario
        listaarray=listaoculta.split(\",\");
        if(jQuery.inArray(valor, listaarray)!=-1){return;}

        if(listaoculta=='')
            listaoculta=valor
        else
            listaoculta=listaoculta+','+valor

        \$('#form_solicitud_asistentes').val(listaoculta)
        \$('#ajaxlistausuario').hide()
        \$('#buscar').val('')

        tags()
    }

    //agrego las etiquetas
    function tags(){

        \$('#tags').html('');
        listaoculta = \$('#form_solicitud_asistentes').val()

        //transformo la lista en un array
        listaarray=listaoculta.split(\",\");tag=\"\";
        //alert(listaarray);
        for(var i=0;i<listaarray.length;i++){
            datos=listaarray[i]
            tag='<div style=\"cursor:pointer;\" class=\"tags\" id=\"'+i+'\" onclick=\"eliminartag(\\''+i+'\\',\\''+datos+'\\')\">'+datos+ '<img src=\"";
        // line 184
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/mal.jpeg"), "html", null, true);
        echo "\" height=\"15px\"></div>';
            \$('#tags').append(tag)
        }
    }

    //eliminar usuarios
    function eliminartag(iddiv,datos){
        var r = confirm(\"Desea eliminar?\");
        if (r == true) {
            \$('#'+iddiv).remove()
            \$('#'+iddiv).remove()

          listaoculta = \$('#form_solicitud_asistentes').val()
          listaoculta=listaoculta.replace(\",\"+datos,\"\")
          listaoculta=listaoculta.replace(datos+\",\",\"\")
          listaoculta=listaoculta.replace(datos,\"\")
          \$('#form_solicitud_asistentes').val(listaoculta)
        }        
    }

    //
    if(\$('#form_solicitud_asistentes').val()!=''){
        tags()
    }


</script> 
";
    }

    public function getTemplateName()
    {
        return "TransporteBundle:Solicitudes:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 184,  230 => 124,  223 => 120,  188 => 88,  180 => 83,  175 => 81,  169 => 78,  164 => 76,  158 => 73,  153 => 71,  147 => 68,  142 => 66,  134 => 61,  107 => 37,  102 => 35,  95 => 31,  89 => 28,  83 => 25,  72 => 21,  66 => 18,  63 => 17,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
