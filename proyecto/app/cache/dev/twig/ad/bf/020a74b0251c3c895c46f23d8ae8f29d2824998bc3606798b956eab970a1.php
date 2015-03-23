<?php

/* EAMBundle:Empleado:show.html.twig */
class __TwigTemplate_adbf020a74b0251c3c895c46f23d8ae8f29d2824998bc3606798b956eab970a1 extends Twig_Template
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
            'styles' => array($this, 'block_styles'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
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
    public function block_styles($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("styles", $context, $blocks);
        echo "
\t<!-- DataTables Responsive CSS -->
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/datatablesresponsive/css/dataTables.responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    
    <!-- DataTables CSS -->
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/datatablesplugins/integration/bootstrap/3/dataTables.bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        echo "  Mostrar ";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "
\t<div class=\"row\">
\t\t<div class=\"col-lg-12\">
\t\t\t<h2 class=\"page-header\"> Empleados activos en la clinica </h2>
\t\t</div>
\t</div>
\t<div class = \"row\">
\t\t<div class = \"col-lg-10 col-lg-offset-1\">

\t\t\t";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "Eliminado"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 25
            echo "\t\t\t\t<div class=\"alert alert-danger alert-dismissable\">
\t\t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t\t\t\t";
            // line 27
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "\t\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "Actualizado"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 31
            echo "\t\t\t\t<div class=\"alert alert-success alert-dismissable\">
\t\t\t\t\t<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>
\t\t\t\t\t";
            // line 33
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
\t\t\t<div class = \"panel panel-info\" >
\t\t\t\t<div class = \"panel-body\" >
\t\t\t\t\t<div class = \"dataTable_wrapper\">
\t\t\t\t\t\t<table class=\"table table-striped table-bordered table-hover table-compact\" id=\"dataTables-example\" >
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<th>Nombre</th>
\t\t\t\t\t\t\t\t\t<th>Apellido</th>
\t\t\t\t\t\t\t\t\t<th>Nombre de Usuario</th>
\t\t\t\t\t\t\t\t\t<th>Rol</th>
\t\t\t\t\t\t\t\t\t<th>Más</th>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entidades"]) ? $context["entidades"] : $this->getContext($context, "entidades")));
        foreach ($context['_seq'] as $context["_key"] => $context["usuario"]) {
            // line 52
            echo "\t\t\t\t\t\t\t\t\t<tr class=\"even gradeA\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td> ";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "nombre", array()), "html", null, true);
            echo " </td>
\t\t\t\t\t\t\t\t\t\t<td> ";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "apellido", array()), "html", null, true);
            echo " </td>
\t\t\t\t\t\t\t\t\t\t<td> ";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "nombreUsuario", array()), "html", null, true);
            echo " </td>
\t\t\t\t\t\t\t\t\t\t<td> ";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "tipo", array()), "html", null, true);
            echo " </td>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<form method=\"POST\" action=\"";
            // line 60
            echo $this->env->getExtension('routing')->getPath("Ver");
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "id", array()), "html", null, true);
            echo "\" name=\"id\" >
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline btn-info\" type=\"submit\">Detalles</button>
\t\t\t\t\t\t\t\t\t\t\t\t</form>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usuario'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    // line 78
    public function block_javascript($context, array $blocks = array())
    {
        // line 79
        echo "\t";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "

\t<script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/jquery.dataTables.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/dataTables.bootstrap.min.js"), "html", null, true);
        echo "\"></script>

\t<script>
    \$(document).ready(function() {
        \$('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

";
    }

    public function getTemplateName()
    {
        return "EAMBundle:Empleado:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 82,  196 => 81,  190 => 79,  187 => 78,  176 => 69,  162 => 61,  158 => 60,  152 => 57,  148 => 56,  144 => 55,  140 => 54,  136 => 52,  132 => 51,  115 => 36,  106 => 33,  102 => 31,  97 => 30,  88 => 27,  84 => 25,  80 => 24,  69 => 15,  66 => 14,  60 => 12,  54 => 9,  48 => 6,  42 => 4,  39 => 3,  11 => 1,);
    }
}
