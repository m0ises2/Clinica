<?php

/* EAMBundle:Inicio:login.html.twig */
class __TwigTemplate_e692af97db27d47d5e770b0dba27b30fcecbf91cd4060df75e69b2b77af40239 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'styles' => array($this, 'block_styles'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Login - Clinica</title>
    ";
        // line 13
        $this->displayBlock('styles', $context, $blocks);
        // line 26
        echo "    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>

<body>

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4 col-md-offset-4\">
                <div class=\"login-panel panel panel-green\">
                    <div class=\"panel-heading\" align=\"center\">
                        <h3 class=\"panel-title\"> Please Sign In</h3>
                    </div>
                    <div class=\"panel-body\">
                        <form role=\"form\" method=\"post\" action = \"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("Login");
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo "\">
                            <fieldset>
                                ";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "Error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 48
            echo "                                    <div class = \"alert alert-danger\" align=\"center\" > 
                                            ";
            // line 49
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
                                    </div>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "
                                ";
        // line 54
        echo "                                ";
        if (((isset($context["error"]) ? $context["error"] : null) == true)) {
            // line 55
            echo "                                    <div class = \"alert alert-danger\" align=\"center\" > 
                                        ";
            // line 56
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "nombreUsuario", array()), 'errors');
            echo "
                                        ";
            // line 57
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contrasenha", array()), 'errors');
            echo "
                                    </div>
                                ";
        }
        // line 60
        echo "
                                <div class=\"form-group\">
                                   <!-- <input class=\"form-control\" placeholder=\"E-mail\" name=\"email\" type=\"email\" autofocus>-->
                                    
                                    ";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "nombreUsuario", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Usuario")));
        echo "
                                </div>
                                <div class=\"form-group\">
                                    <!--<input class=\"form-control\" placeholder=\"Password\" name=\"password\" type=\"password\" value=\"\">-->
                                   
                                    ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contrasenha", array()), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "Contraseña")));
        echo "
                                </div>
                                ";
        // line 71
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "nombre", array()), "setRendered", array());
        // line 72
        echo "                                ";
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "apellido", array()), "setRendered", array());
        // line 73
        echo "                                ";
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fechaNac", array()), "setRendered", array());
        // line 74
        echo "                                ";
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "seguroSocial", array()), "setRendered", array());
        // line 75
        echo "                                ";
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "direccion", array()), "setRendered", array());
        // line 76
        echo "                                ";
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "rol", array()), "setRendered", array());
        // line 77
        echo "                                ";
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "fechaInicio", array()), "setRendered", array());
        // line 78
        echo "                                ";
        $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "telefono", array()), "setRendered", array());
        // line 79
        echo "                                ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                                <!-- Change this to a button or input when using this as a form -->
                                <div style=\"padding-top: 1cm;\">
                                    <input type=\"submit\" name=\"submit\" value=\"Entrar\" class=\"btn btn-lg btn-success btn-block\"/>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/jquery.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/metisMenu.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Custom Theme JavaScript -->
    <script src=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/sb-admin-2.js"), "html", null, true);
        echo "\"></script>

</body>

</html>
";
    }

    // line 13
    public function block_styles($context, array $blocks = array())
    {
        // line 14
        echo "        <!-- Bootstrap Core CSS -->
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- MetisMenu CSS -->
        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/metisMenu.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- Custom CSS -->
        <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/sb-admin-2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- Custom Fonts -->
        <link href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    ";
    }

    public function getTemplateName()
    {
        return "EAMBundle:Inicio:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 24,  205 => 21,  199 => 18,  193 => 15,  190 => 14,  187 => 13,  177 => 102,  171 => 99,  165 => 96,  159 => 93,  141 => 79,  138 => 78,  135 => 77,  132 => 76,  129 => 75,  126 => 74,  123 => 73,  120 => 72,  118 => 71,  113 => 69,  105 => 64,  99 => 60,  93 => 57,  89 => 56,  86 => 55,  83 => 54,  80 => 52,  71 => 49,  68 => 48,  64 => 47,  57 => 45,  36 => 26,  34 => 13,  20 => 1,);
    }
}
