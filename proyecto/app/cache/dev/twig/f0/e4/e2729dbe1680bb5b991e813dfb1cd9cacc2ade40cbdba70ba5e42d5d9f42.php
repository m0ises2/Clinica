<?php

/* EAMBundle:Empleado:nuevo.html.twig */
class __TwigTemplate_f0e4e2729dbe1680bb5b991e813dfb1cd9cacc2ade40cbdba70ba5e42d5d9f42 extends Twig_Template
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
        echo "  Nuevo ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "\t<div class=\"row\">
        <div class=\"col-lg-12\">
            <h2 class=\"page-header\"> Nuevo Empleado </h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class = \"row\">
    \t<div class = \"col-lg-3 col-lg-offset-4\">
    \t\t";
        // line 15
        if (((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")) == "user_registered")) {
            // line 16
            echo "    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
    \t\t\t\tEmpleado existente.
    \t\t\t</div>
    \t\t";
        }
        // line 21
        echo "    \t\t
    \t\t<form method=\"POST\" action = \"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("Nuevo_empleado");
        echo "\" >
\t    \t\t<div class = \"form-group\" >
\t    \t\t\t";
        // line 24
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'errors')) {
            // line 25
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 27
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 30
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'label');
        echo "
\t\t    \t\t";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 33
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'errors')) {
            // line 34
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 36
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 39
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'label', array("label" => "Contraseña"));
        echo "
\t\t    \t\t";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 42
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'errors')) {
            // line 43
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 45
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 48
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'label');
        echo "
\t\t    \t\t";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 51
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'errors')) {
            // line 52
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 54
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 57
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'label');
        echo "
\t\t    \t\t";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 60
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'errors')) {
            // line 61
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 63
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 66
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'label');
        echo "
\t\t    \t\t";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "dia/mes/año")));
        echo "

\t\t    \t\t";
        // line 69
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'errors')) {
            // line 70
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t    ";
            // line 72
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 75
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'label', array("label" => "Número de seguro social"));
        echo "
\t\t    \t\t";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 78
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'errors')) {
            // line 79
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 81
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 84
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'label', array("label" => "Dirección"));
        echo "
\t\t    \t\t";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 87
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'errors')) {
            // line 88
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 90
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 93
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'label', array("label" => "Teléfono"));
        echo "
\t\t    \t\t";
        // line 94
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 96
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'errors')) {
            // line 97
            echo "\t\t    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
\t\t    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t    \t\t\t\t";
            // line 99
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'errors');
            echo "
\t\t    \t\t\t</div>
    \t\t\t\t";
        }
        // line 102
        echo "\t\t    \t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'label', array("label" => "Fecha de ingreso"));
        echo "
\t\t    \t\t";
        // line 103
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "dia/mes/año")));
        echo "

\t\t    \t\t<label> Roles disponibles </label>
\t\t\t    \t<div class=\"radio\" style=\"padding-left:50px;\">
\t\t\t\t    \t ";
        // line 107
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tipo", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 108
            echo "\t\t\t\t    \t \t<div div class=\"row\">
\t\t\t\t    \t \t\t";
            // line 109
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["type"], 'widget');
            echo "
\t\t\t\t    \t \t\t";
            // line 110
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["type"], 'label');
            echo "
\t\t\t\t    \t \t</div>
\t\t\t\t    \t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "\t\t\t\t   \t</div>
\t\t\t    </div>

\t\t    \t<div>
\t\t    \t\t";
        // line 117
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Guardar", array()), 'widget', array("attr" => array("class" => "btn btn-outline btn-primary")));
        echo "
\t\t    \t\t";
        // line 118
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Guardar_otro", array()), 'widget', array("attr" => array("class" => "btn btn-outline btn-success")));
        echo "
\t\t    \t\t";
        // line 119
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Cancelar", array()), 'widget', array("attr" => array("class" => "btn btn-outline btn-danger")));
        echo "
\t\t    \t<div/>
\t\t    \t";
        // line 121
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
        return "EAMBundle:Empleado:nuevo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 121,  308 => 119,  304 => 118,  300 => 117,  294 => 113,  285 => 110,  281 => 109,  278 => 108,  274 => 107,  267 => 103,  262 => 102,  256 => 99,  252 => 97,  250 => 96,  245 => 94,  240 => 93,  234 => 90,  230 => 88,  228 => 87,  223 => 85,  218 => 84,  212 => 81,  208 => 79,  206 => 78,  201 => 76,  196 => 75,  190 => 72,  186 => 70,  184 => 69,  179 => 67,  174 => 66,  168 => 63,  164 => 61,  162 => 60,  157 => 58,  152 => 57,  146 => 54,  142 => 52,  140 => 51,  135 => 49,  130 => 48,  124 => 45,  120 => 43,  118 => 42,  113 => 40,  108 => 39,  102 => 36,  98 => 34,  96 => 33,  91 => 31,  86 => 30,  80 => 27,  76 => 25,  74 => 24,  69 => 22,  66 => 21,  59 => 16,  57 => 15,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
