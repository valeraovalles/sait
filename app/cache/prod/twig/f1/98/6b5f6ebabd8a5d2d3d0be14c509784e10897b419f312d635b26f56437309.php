<?php

/* UsuarioBundle:Default:login.html.twig */
class __TwigTemplate_f1986b5f6ebabd8a5d2d3d0be14c509784e10897b419f312d635b26f56437309 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::login.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'titulobanner' => array($this, 'block_titulobanner'),
            'body' => array($this, 'block_body'),
            'mensaje' => array($this, 'block_mensaje'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::login.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "FORMULARIO DE ACCESO";
    }

    // line 5
    public function block_titulobanner($context, array $blocks = array())
    {
        // line 6
        echo "    FORMULARIO DE ACCESO
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "<ol class=\"breadcrumb\" style=\"text-align: left;font-weight: bold;\">
<li><a href=\"http://intranet.telesurtv.net\">VOLVER A LA INTRANET</a></li>
<li><a href=\"http://telesurtv.net\">IR A LA WEB DE TELESUR</a></li>
<li class=\"active\">SAIT</li>
<span class=\"text-danger\" style=\"float: right;font-size: 13px;\">SE RECOMIENDA EL USO DE FIREFOX O CHROME <a href=\"http://www.google.co.ve/intl/es-419/chrome/\"><img width=\"20px\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/chrome.png"), "html", null, true);
        echo "\"></a>  <a href=\"https://www.mozilla.org/\"><img width=\"20px\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/firefox.png"), "html", null, true);
        echo "\"></a></span>
</ol>
  
  
    <script type=\"text/javascript\">
        if(navigator.appVersion.indexOf(\"MSIE 7.\")!=-1){

        alert(\"Esta aplicación no funciona correctamente en internet explorer, por favor cambie a Chrome o Firefox.\");

        \$(\"#botonsubmit\").css(\"display\", \"none\");
    }
    </script>

    
    
    ";
        // line 29
        $this->displayBlock('mensaje', $context, $blocks);
        // line 34
        echo "
    ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 36
            echo "        <div class=\"alert alert-success\">
            ";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    

    <h3>APLICACIONES TELESUR</h3>
    

      <form novalidate class=\"form-signin\" action=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("usuario_login_check");
        echo "\" method=\"post\">
        <h4 class=\"form-signin-heading\">INGRESE SUS DATOS</h4>
        <input required type=\"text\" id=\"username\" name=\"_username\" class=\"input-block-level\"placeholder=\"Ingrese usuario...\" data-placement=\"right\" data-content=\"Puede ingresar el mismo usuario y clave de su correo Zimbra. Ante cualquier inconveniente comunicarse con la extensión 264/339.\" title=\"USUARIO\">
        <input required type=\"password\" name=\"_password\" class=\"input-block-level\" placeholder=\"Ingrese clave...\">
        <button class=\"btn btn-large btn-primary\" type=\"submit\" id=\"botonsubmit\">INGRESAR</button>
      </form>


    <div class=\"text-danger\" style=\"cursor:pointer\" data-toggle=\"modal\" href=\"#myModal\"><b>¿OLVIDÓ SU CLAVE?</b></div>

    <br>

    <script>\$('#username').popover();</script>

    
    
    <!-- Modal -->
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">NOTIFICAR</h4>
      </div>
      <div class=\"modal-body\">
            <div class=\"alert alert-warning fade in\" style=\"display:none;\">
                <strong>Alerta!!</strong> Todos los campos son obligatorios.
              </div>

            <form id=\"notif\" action=\"";
        // line 74
        echo $this->env->getExtension('routing')->getPath("notificar");
        echo "\" method=\"post\">
              <table class=\"table table-striped\">
                <tr>
                    <th>Nombres: </th>
                    <td><input id=\"nombre\" type=\"text\" name=\"form[nombre]\"></td>
                </tr>
                <tr>
                    <th>Apellidos: </th>
                    <td><input id=\"apellido\" type=\"text\" name=\"form[apellido]\"></td>
                </tr>
                <tr>
                    <th>Cedula: </th>
                    <td><input id=\"cedula\" type=\"text\" name=\"form[cedula]\"></td>
                </tr>
                <tr>
                    <th>Extensión: </th>
                    <td><input id=\"extension\" type=\"text\" name=\"form[extension]\"></td>
                </tr>
                <tr>
                    <th>Comentario: </th>
                    <td><textarea id=\"comentario\" name=\"form[comentario]\"></textarea>
                </tr>
                <tr>
                    
                </tr>
              </table>
            </form>

            <script type=\"text/javascript\">
                function validar() {
                  if(\$(\"#nombre\").val()=='' || \$(\"#apellido\").val()=='' || \$(\"#cedula\").val()=='' || \$(\"#extension\").val()=='' || \$(\"#comentario\").val()=='') \$(\".alert\").show(); else \$(\"#notif\").submit()
                };

            </script>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
        <input type=\"button\" onclick=\"validar()\" class=\"btn btn-primary\" value=\"Notificar\">
      </div>
    </div>
  </div>
</div>
    
    
    
    
    
    
    

    ";
        // line 125
        echo "    <div style=\"width:500px;left:52%;\" id=\"myModal\" class=\"modal hide fade\" tabindex=\"5\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
              <h3 id=\"myModalLabel\">NOTIFICAR</h3>
         </div>
        <div class=\"modal-body\">


        </div>
        <div class=\"modal-footer\">
          <button class=\"btn\" data-dismiss=\"modal\">Cerrar</button>
        </div>
    </div>

";
    }

    // line 29
    public function block_mensaje($context, array $blocks = array())
    {
        // line 30
        echo "        ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 31
            echo "            <div class=\"alert alert-warning\" style=\"text-align: center;\"><strong>Alerta!</strong> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message")), "html", null, true);
            echo "</div>
        ";
        }
        // line 33
        echo "    ";
    }

    public function getTemplateName()
    {
        return "UsuarioBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 33,  211 => 31,  208 => 30,  205 => 29,  187 => 125,  134 => 74,  102 => 45,  95 => 40,  86 => 37,  83 => 36,  79 => 35,  76 => 34,  74 => 29,  54 => 14,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
