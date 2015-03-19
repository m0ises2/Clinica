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
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 16
            echo "    \t\t\t<div class = \"alert alert-danger alert-dismissable\">
    \t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
    \t\t\t\t<i class=\"fa fa-exclamation\"></i> ";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
            echo "
    \t\t\t</div>
    \t\t";
        }
        // line 21
        echo "    \t\t<form method=\"POST\" action = \"";
        echo $this->env->getExtension('routing')->getPath("Nuevo_empleado");
        echo "\" >
\t    \t\t<div class = \"form-group\" >
\t\t    \t\t";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'label');
        echo "
\t\t    \t\t";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombreUsuario", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'label');
        echo "
\t\t    \t\t";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contrasenha", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'label');
        echo "
\t\t    \t\t";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nombre", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'label');
        echo "
\t\t    \t\t";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "apellido", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'label');
        echo "
\t\t    \t\t";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaNac", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'label');
        echo "
\t\t    \t\t";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "seguroSocial", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'label');
        echo "
\t\t    \t\t";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "direccion", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'label');
        echo "
\t\t    \t\t";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "telefono", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'label');
        echo "
\t\t    \t\t";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fechaInicio", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "

\t\t    \t\t<label> Roles de empleado </label>

\t\t\t    \t<div class = \"checkbox\" >
\t\t\t    \t\t<label>
\t\t\t    \t\t\t<input name = \"administrativo\" type=\"checkbox\" value=\"Administrativo\"> Administrativo
\t\t\t    \t\t</label>
\t\t\t    \t</div>

\t\t\t    \t<div class = \"checkbox\" >
\t\t\t    \t\t<label>
\t\t\t    \t\t\t<input name = \"medico\" type=\"checkbox\" value=\"Medico\"> Médico
\t\t\t    \t\t</label>
\t\t\t    \t</div>

\t\t\t    \t<div class = \"checkbox\" >
\t\t\t    \t\t<label>
\t\t\t    \t\t\t<input name = \"enfermera\" type=\"checkbox\" value=\"Enfermera\"> Enfermera
\t\t\t    \t\t</label>
\t\t\t    \t</div>
\t\t    \t</div>

\t\t    \t<div>
\t\t    \t\t";
        // line 72
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Guardar", array()), 'widget', array("attr" => array("class" => "btn btn-primary")));
        echo "
\t\t    \t\t";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Guardar_otro", array()), 'widget', array("attr" => array("class" => "btn btn-success")));
        echo "
\t\t    \t\t";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "Cancelar", array()), 'widget', array("attr" => array("class" => "btn btn-danger")));
        echo "
\t\t    \t<div/>
\t\t    \t";
        // line 76
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
        return array (  191 => 76,  186 => 74,  182 => 73,  178 => 72,  151 => 48,  147 => 47,  142 => 45,  138 => 44,  133 => 42,  129 => 41,  124 => 39,  120 => 38,  115 => 36,  111 => 35,  106 => 33,  102 => 32,  97 => 30,  93 => 29,  88 => 27,  84 => 26,  79 => 24,  75 => 23,  69 => 21,  63 => 18,  59 => 16,  57 => 15,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
