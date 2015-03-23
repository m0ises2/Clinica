<?php

/* EAMBundle:Empleado:Edit.html.twig */
class __TwigTemplate_9fe306991e45a17aceaffb6d98a5967eb294e98a3f1bd8ebe87eadc366f64fb2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::baseClinica.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::baseClinica.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Editar ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
        <div class=\"col-lg-12\">
            <h2 class=\"page-header\"> Editar Empleado </h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class = \"row\">
    \t<div class = \"col-lg-3 col-lg-offset-4\">
    \t\t<form method=\"POST\" action = \"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Actualizar", array("id" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")))), "html", null, true);
        echo "\" >
\t    \t\t<div class = \"form-group\" >
\t    \t\t\t";
        // line 17
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'errors')) {
            // line 18
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 20
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 23
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'label');
        echo "
\t\t    \t\t";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 26
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'errors')) {
            // line 27
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 29
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 32
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'label', array("label" => "Contraseña"));
        echo "
\t\t    \t\t";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 35
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'errors')) {
            // line 36
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 38
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 41
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'label');
        echo "
\t\t    \t\t";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 44
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'errors')) {
            // line 45
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 47
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 50
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'label');
        echo "
\t\t    \t\t";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 53
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'errors')) {
            // line 54
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 56
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 59
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'label');
        echo "
\t\t    \t\t";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "dia/mes/año")));
        echo "

\t\t    \t\t";
        // line 62
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'errors')) {
            // line 63
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t    ";
            // line 65
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 68
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'label', array("label" => "Número de seguro social"));
        echo "
\t\t    \t\t";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 71
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'errors')) {
            // line 72
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 74
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 77
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'label', array("label" => "Dirección"));
        echo "
\t\t    \t\t";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 80
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'errors')) {
            // line 81
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 83
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 86
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'label', array("label" => "Teléfono"));
        echo "
\t\t    \t\t";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 89
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'errors')) {
            // line 90
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 92
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 95
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'label', array("label" => "Fecha de ingreso"));
        echo "
\t\t    \t\t";
        // line 96
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "dia/mes/año")));
        echo "

\t\t    \t\t<label> Roles disponibles </label>
\t\t\t    \t<div class=\"radio\" style=\"padding-left:50px;\">
\t\t\t\t    \t ";
        // line 100
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipo", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 101
            echo "\t\t\t\t    \t \t<div div class=\"row\">
\t\t\t\t    \t \t\t";
            // line 102
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["type"], 'widget');
            echo "
\t\t\t\t    \t \t\t";
            // line 103
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["type"], 'label');
            echo "
\t\t\t\t    \t \t</div>
\t\t\t\t    \t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 106
        echo "\t\t\t\t   \t</div>
\t\t\t    </div>

\t\t    \t<div>
\t\t    \t\t";
        // line 110
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Guardar", array()), 'widget', array("attr" => array("class" => "btn btn-outline btn-primary")));
        echo "
\t\t    \t\t
\t\t    \t\t";
        // line 112
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Cancelar", array()), 'widget', array("attr" => array("class" => "btn btn-outline btn-danger")));
        echo "
\t\t    \t<div/>
\t\t    \t";
        // line 114
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "\t    \t\t
\t    \t</form>
    \t</div>
    </div>
    <!-- /.row -->

";
    }

    public function getTemplateName()
    {
        return "EAMBundle:Empleado:Edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  298 => 114,  293 => 112,  288 => 110,  282 => 106,  273 => 103,  269 => 102,  266 => 101,  262 => 100,  255 => 96,  250 => 95,  244 => 92,  240 => 90,  238 => 89,  233 => 87,  228 => 86,  222 => 83,  218 => 81,  216 => 80,  211 => 78,  206 => 77,  200 => 74,  196 => 72,  194 => 71,  189 => 69,  184 => 68,  178 => 65,  174 => 63,  172 => 62,  167 => 60,  162 => 59,  156 => 56,  152 => 54,  150 => 53,  145 => 51,  140 => 50,  134 => 47,  130 => 45,  128 => 44,  123 => 42,  118 => 41,  112 => 38,  108 => 36,  106 => 35,  101 => 33,  96 => 32,  90 => 29,  86 => 27,  84 => 26,  79 => 24,  74 => 23,  68 => 20,  64 => 18,  62 => 17,  57 => 15,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
