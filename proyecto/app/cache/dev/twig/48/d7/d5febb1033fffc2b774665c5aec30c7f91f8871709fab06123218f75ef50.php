<?php

/* ::baseClinica.html.twig */
class __TwigTemplate_48d7d5febb1033fffc2b774665c5aec30c7f91f8871709fab06123218f75ef50 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'styles' => array($this, 'block_styles'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
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

    ";
        // line 12
        $this->displayBlock('title', $context, $blocks);
        // line 15
        echo "
    ";
        // line 16
        $this->displayBlock('styles', $context, $blocks);
        // line 31
        echo "    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>

<body>

    <div id=\"wrapper\">

        <!-- Navigation -->
        <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"";
        // line 53
        echo $this->env->getExtension('routing')->getPath("Home");
        echo "\"> Clinica del Dr. Chapatin </a>
            </div>
            <!-- /.navbar-header -->

            <ul class=\"nav navbar-top-links navbar-right\">
              <!-- /.dropdown -->
                <li class=\"dropdown\">
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-user fa-fw\"></i>  <i class=\"fa fa-caret-down\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-user\">
                         <li>
                            <a href=\"";
        // line 65
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\"><i class=\"fa fa-sign-out fa-fw\"></i> Cerrar Sesión - ";
        echo twig_escape_filter($this->env, (isset($context["nombre"]) ? $context["nombre"] : $this->getContext($context, "nombre")), "html", null, true);
        echo "</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class=\"navbar-default sidebar\" role=\"navigation\">
                <div class=\"sidebar-nav navbar-collapse\">
                    <ul class=\"nav\" id=\"side-menu\">
                        <li class=\"sidebar-search\">
                            <div class=\"input-group custom-search-form\">
                                <input type=\"text\" class=\"form-control\" placeholder=\"Search...\">
                                <span class=\"input-group-btn\">
                                    <button class=\"btn btn-default\" type=\"button\">
                                        <i class=\"fa fa-search\"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        ";
        // line 89
        echo "                        ";
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 90
            echo "                            <li>
                                <a href=\"#\">
                                    <i class=\"fa fa-users fa-fw\"></i> Empleados <span class=\"fa arrow\"></span></a>
                                <ul class=\"nav nav-second-level\">
                                    <li>
                                        <a href=\"#\"><i class=\"fa fa-plus-square\"></i> Añadir </a>
                                    </li>
                                    <li>
                                        <a href=\"#\"><i class=\"fa fa-refresh\"></i> Actualizar </a>
                                    </li>
                                    <li>
                                        <a href=\"#\"><i class=\"fa fa-minus-square\"></i> Eliminar </a>
                                    </li>
                                    <li>
                                        <a href=\"#\"><i class=\"fa fa-pencil-square-o\"></i> Editar privilegios </a>
                                    </li>                                
                                    <li>
                                        <a href=\"#\"><i class=\"fa fa-list\"></i> Mostrar </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        ";
        }
        // line 113
        echo "                        <li>
                            <a href=\"#\"> !\"#/(=)(/\" </a>
                        </li>
                        <li>
                            <a href=\"forms.html\"> !#\"\$/()=?\" </a>
                        </li>
                        <li>
                            <a href=\"#\"> !\"\$%/()\" <span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"#\">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href=\"#\">Buttons</a>
                                </li>
                                <li>
                                    <a href=\"#\">Notifications</a>
                                </li>
                                <li>
                                    <a href=\"#\">Typography</a>
                                </li>
                                <li>
                                    <a href=\"#\"> Icons</a>
                                </li>
                                <li>
                                    <a href=\"#\">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=\"#\"> =)(/%\$#\" <span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"#\">Second Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Second Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Third Level <span class=\"fa arrow\"></span></a>
                                    <ul class=\"nav nav-third-level\">
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href=\"#\">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                             <a href=\"";
        // line 174
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\"> <i class=\"fa fa-sign-out\"></i> Cerrar Sesión </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id=\"page-wrapper\">
            <div class=\"container-fluid\">
                ";
        // line 187
        echo "                ";
        $this->displayBlock('content', $context, $blocks);
        // line 196
        echo "            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    ";
        // line 204
        $this->displayBlock('javascript', $context, $blocks);
        // line 217
        echo "
</body>

</html>
";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        // line 13
        echo "        <title>Clinica - Home</title>
    ";
    }

    // line 16
    public function block_styles($context, array $blocks = array())
    {
        // line 17
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/images/icon.png"), "html", null, true);
        echo "\" rel='icon' type='image/png'>

        <!-- Bootstrap Core CSS -->
        <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- MetisMenu CSS -->
        <link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/metisMenu.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- Custom CSS -->
        <link href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/sb-admin-2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

        <!-- Custom Fonts -->
        <link href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/css/fontawesome/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    ";
    }

    // line 187
    public function block_content($context, array $blocks = array())
    {
        // line 188
        echo "                    <div class=\"row\">
                        <div class=\"col-lg-12\">
                            <h1 class=\"page-header\"> Aqui va el contenido de cada vista </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                <!-- /.row -->
                ";
    }

    // line 204
    public function block_javascript($context, array $blocks = array())
    {
        // line 205
        echo "       <!-- jQuery -->
        <script src=\"";
        // line 206
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/jquery.min.js"), "html", null, true);
        echo "\"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=\"";
        // line 209
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src=\"";
        // line 212
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/metisMenu.min.js"), "html", null, true);
        echo "\"></script>

        <!-- Custom Theme JavaScript -->
        <script src=\"";
        // line 215
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eam/js/sb-admin-2.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "::baseClinica.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  319 => 215,  313 => 212,  307 => 209,  301 => 206,  298 => 205,  295 => 204,  284 => 188,  281 => 187,  275 => 29,  269 => 26,  263 => 23,  257 => 20,  250 => 17,  247 => 16,  242 => 13,  239 => 12,  231 => 217,  229 => 204,  219 => 196,  216 => 187,  201 => 174,  138 => 113,  113 => 90,  110 => 89,  82 => 65,  67 => 53,  43 => 31,  41 => 16,  38 => 15,  36 => 12,  23 => 1,);
    }
}
