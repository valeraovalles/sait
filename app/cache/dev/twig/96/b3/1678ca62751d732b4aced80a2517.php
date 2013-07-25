<?php

/* TwigBundle:Exception:trace.txt.twig */
class __TwigTemplate_96b31678ca62751d732b4aced80a2517 extends Twig_Template
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
        if ($this->getAttribute($this->getContext($context, "trace"), "function")) {
            // line 2
            echo "    at ";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "trace"), "class") . $this->getAttribute($this->getContext($context, "trace"), "type")) . $this->getAttribute($this->getContext($context, "trace"), "function")), "html", null, true);
            echo "(";
            echo twig_escape_filter($this->env, $this->env->getExtension('code')->formatArgsAsText($this->getAttribute($this->getContext($context, "trace"), "args")), "html", null, true);
            echo ")
";
        } else {
            // line 4
            echo "    at n/a
";
        }
        // line 6
        if (($this->getAttribute($this->getContext($context, "trace", true), "file", array(), "any", true, true) && $this->getAttribute($this->getContext($context, "trace", true), "line", array(), "any", true, true))) {
            // line 7
            echo "        in ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "trace"), "file"), "html", null, true);
            echo " line ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "trace"), "line"), "html", null, true);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:trace.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 13,  87 => 20,  55 => 13,  25 => 3,  21 => 2,  92 => 21,  89 => 20,  79 => 18,  75 => 17,  72 => 16,  56 => 9,  50 => 8,  24 => 4,  201 => 92,  199 => 91,  196 => 90,  187 => 84,  183 => 82,  173 => 74,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  158 => 67,  156 => 66,  151 => 63,  133 => 55,  121 => 46,  117 => 44,  115 => 43,  101 => 24,  91 => 31,  69 => 25,  66 => 15,  62 => 23,  51 => 15,  49 => 19,  39 => 6,  88 => 6,  78 => 40,  46 => 7,  44 => 10,  36 => 7,  27 => 4,  22 => 2,  54 => 21,  43 => 8,  33 => 6,  45 => 13,  41 => 9,  30 => 3,  23 => 3,  19 => 1,  147 => 27,  142 => 59,  138 => 57,  136 => 56,  131 => 26,  128 => 25,  122 => 23,  116 => 16,  112 => 42,  108 => 14,  103 => 13,  100 => 12,  94 => 22,  90 => 8,  86 => 28,  83 => 6,  80 => 19,  74 => 4,  59 => 29,  57 => 16,  52 => 23,  48 => 22,  42 => 14,  40 => 8,  37 => 11,  35 => 7,  31 => 5,  26 => 5,  143 => 6,  140 => 5,  123 => 47,  118 => 50,  114 => 48,  105 => 40,  98 => 40,  93 => 9,  85 => 19,  81 => 40,  77 => 39,  71 => 38,  68 => 14,  64 => 12,  34 => 8,  32 => 12,  29 => 4,);
    }
}
