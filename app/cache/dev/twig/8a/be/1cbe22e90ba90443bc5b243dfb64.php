<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_8abe1cbe22e90ba90443bc5b243dfb64 extends Twig_Template
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
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  70 => 26,  38 => 13,  87 => 20,  55 => 13,  25 => 3,  21 => 2,  92 => 21,  89 => 20,  79 => 29,  75 => 28,  72 => 16,  56 => 9,  50 => 15,  24 => 2,  201 => 92,  199 => 91,  196 => 90,  187 => 84,  183 => 82,  173 => 74,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  158 => 67,  156 => 66,  151 => 63,  133 => 55,  121 => 46,  117 => 44,  115 => 43,  101 => 24,  91 => 35,  69 => 25,  66 => 25,  62 => 24,  51 => 15,  49 => 19,  39 => 6,  88 => 6,  78 => 40,  46 => 14,  44 => 10,  36 => 7,  27 => 4,  22 => 2,  54 => 21,  43 => 8,  33 => 6,  45 => 13,  41 => 9,  30 => 5,  23 => 3,  19 => 1,  147 => 27,  142 => 59,  138 => 57,  136 => 56,  131 => 26,  128 => 25,  122 => 23,  116 => 16,  112 => 42,  108 => 14,  103 => 13,  100 => 12,  94 => 22,  90 => 8,  86 => 28,  83 => 30,  80 => 19,  74 => 4,  59 => 29,  57 => 16,  52 => 23,  48 => 22,  42 => 12,  40 => 8,  37 => 11,  35 => 7,  31 => 5,  26 => 3,  143 => 6,  140 => 5,  123 => 47,  118 => 50,  114 => 48,  105 => 40,  98 => 40,  93 => 9,  85 => 19,  81 => 40,  77 => 39,  71 => 38,  68 => 14,  64 => 12,  34 => 8,  32 => 6,  29 => 4,);
    }
}
