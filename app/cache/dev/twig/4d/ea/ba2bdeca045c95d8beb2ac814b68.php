<?php

/* UsuarioBundle:Default:login.html.twig */
class __TwigTemplate_4deaba2bdeca045c95d8beb2ac814b68 extends Twig_Template
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
        echo "
    <div class=\"titulo\">FORMULARIO DE ACCESO</div>

    ";
        // line 13
        $this->displayBlock('mensaje', $context, $blocks);
        // line 18
        echo "


    <form action=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("usuario_login_check");
        echo "\" method=\"post\">

        <table id=\"table-login\">
            <tr>
                <td colspan=2 align=center class=\"titulo-form\">INGRESAR DATOS</td>
            </tr>

            <tr>
                <th>Usuario:</th>
                <td><input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\"   placeholder=\"Ingrese usuario...\" data-placement=\"right\" data-content=\"Puede ingresar el mismo usuario y clave de su correo Zimbra. Ante cualquier inconveniente comunicarse con la extensión 264/339.\" title=\"USUARIO\"></td>
            </tr>

            <tr>
                <th>Clave:</th>
                <td><input type=\"password\" id=\"password\" name=\"_password\" placeholder=\"Ingrese clave...\"></td>
            </tr>

            <tr>
                <td colspan=2 align=center><button class=\"btn\" type=\"submit\">Ingresar</button></td>
            </tr>
        </table>

        <div style=\"margin-top:10px;\"><a href=\"#\" class=\"recordar\">Recordar contraseña</a></div>
    </form>

    <br><br>

    <script>\$('#username').popover();</script>
";
    }

    // line 13
    public function block_mensaje($context, array $blocks = array())
    {
        // line 14
        echo "        ";
        if ($this->getContext($context, "error")) {
            // line 15
            echo "            <div class=\"alert\" style=\"text-align: center;\"><strong>Alerta!</strong> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getContext($context, "error"), "message")), "html", null, true);
            echo "</div>
        ";
        }
        // line 17
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
        return array (  108 => 17,  102 => 15,  99 => 14,  96 => 13,  72 => 30,  60 => 21,  55 => 18,  53 => 13,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
