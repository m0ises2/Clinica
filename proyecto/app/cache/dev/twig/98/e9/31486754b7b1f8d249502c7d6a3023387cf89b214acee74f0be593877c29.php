<?php

/* EAMBundle:Empleado:User_details.html.twig */
class __TwigTemplate_98e931486754b7b1f8d249502c7d6a3023387cf89b214acee74f0be593877c29 extends Twig_Template
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
        echo "  Mostrar ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        echo "\t
\t<div class=\"row\">
\t\t<div class=\"col-lg-12\">
\t\t\t<h2 class=\"page-header\"> Detalles </h2>
\t\t</div>
\t</div>

\t<div class=\"row\">
\t\t<div class=\"col-lg-4\" style=\"padding-left:140px;\">
\t\t\t<img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/images/user.png"), "html", null, true);
        echo "\" alt=\"profile_picture\" style=\"width:160px; height:180px\">
\t\t</div>

\t\t<div class=\"col-lg-4\">
\t\t\t<div class = \"panel panel-info\">
\t\t\t\t<div class = \"panel-body\">
\t\t\t\t\t<div class = \"table-responsive\">
\t\t\t\t\t\t<table class = \"table\">
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Nombre:</b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "nombre", array()), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Apellido: </b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "apellido", array()), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Nombre de Usuario: </b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "nombreUsuario", array()), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Tipo de empleado: </b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "tipo", array()), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Fecha de Nacimiento: </b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 41
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "fechaNac", array()), "d-m-y"), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Número de seguro social: </b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "seguroSocial", array()), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Dirección: </b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "direccion", array()), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Fecha de Ingreso: </b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 53
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "fechaInicio", array()), "d-m-y"), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td> <b> Teléfono: </b> </td>
\t\t\t\t\t\t\t\t\t<td> ";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "telefono", array()), "html", null, true);
        echo " </td>
\t\t\t\t\t\t\t\t</tr>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</body>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<form method=\"POST\" action=\"";
        // line 64
        echo $this->env->getExtension('routing')->getPath("Ver_empleados");
        echo "\">
\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entidad"]) ? $context["entidad"] : $this->getContext($context, "entidad")), "id", array()), "html", null, true);
        echo "\" name=\"id\" >
\t\t\t\t\t\t\t<button class=\"btn btn-outline btn-primary\" type=\"submit\">Regresar</button>
\t\t\t\t\t\t</form>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "EAMBundle:Empleado:User_details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 65,  136 => 64,  126 => 57,  119 => 53,  112 => 49,  105 => 45,  98 => 41,  91 => 37,  84 => 33,  77 => 29,  70 => 25,  56 => 14,  43 => 5,  37 => 3,  11 => 1,);
    }
}
