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
        // line 29
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
        // line 48
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo " \">
                            <fieldset>
                                ";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "Error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 51
            echo "                                    <div class = \"alert alert-danger\" align=\"center\" > 
                                            ";
            // line 52
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
                                    </div>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "
                                ";
        // line 57
        echo "                                ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 58
            echo "                                    <div class = \"alert alert-danger\" align=\"center\" > 
                                        ";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array())), "html", null, true);
            echo "
                                    </div>
                                ";
        }
        // line 62
        echo "
                                <div class=\"form-group\">
                                   <input class=\"form-control\" required placeholder=\"Usuario\" name=\"_username\" type=\"text\" autofocus>
                                </div>
                                <div class=\"form-group\">
                                    <input class=\"form-control\" required placeholder=\"Contraseña\" name=\"_password\" type=\"password\" value=\"\">
                                </div>
                                <!-- Redireccionar al usuario en caso de que haya funcionado la verificación -->
                                <input type=\"hidden\" name=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("Home");
        echo "\" value=\"/account\" />
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
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/jquery.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/metisMenu.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Custom Theme JavaScript -->
    <script src=\"";
        // line 93
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
        echo "
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/images/icon.png"), "html", null, true);
        echo "\" rel='icon' type='image/png'>

        <!-- Bootstrap Core CSS -->
        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- MetisMenu CSS -->
        <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/metisMenu.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- Custom CSS -->
        <link href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/sb-admin-2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- Custom Fonts -->
        <link href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/fontawesome/css/font-awesome.css"), "html", null, true);
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
        return array (  178 => 27,  172 => 24,  166 => 21,  160 => 18,  154 => 15,  151 => 14,  148 => 13,  138 => 93,  132 => 90,  126 => 87,  120 => 84,  103 => 70,  93 => 62,  87 => 59,  84 => 58,  81 => 57,  78 => 55,  69 => 52,  66 => 51,  62 => 50,  57 => 48,  36 => 29,  34 => 13,  20 => 1,);
    }
}
