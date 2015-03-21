<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // login
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'login');
            }

            return array (  '_controller' => 'EAMBundle\\Controller\\InicioController::loginAction',  '_route' => 'login',);
        }

        // login_check
        if ($pathinfo === '/login_check') {
            return array (  '_controller' => 'EAMBundle\\Controller\\InicioController::loginCheckAction',  '_route' => 'login_check',);
        }

        if (0 === strpos($pathinfo, '/home')) {
            // Home
            if ($pathinfo === '/home') {
                return array (  '_controller' => 'EAMBundle\\Controller\\InicioController::iniciarAction',  '_route' => 'Home',);
            }

            // Nuevo_empleado
            if ($pathinfo === '/home/nuevo') {
                return array (  '_controller' => 'EAMBundle\\Controller\\EmpleadoController::NuevoAction',  '_route' => 'Nuevo_empleado',);
            }

            // Ver_empleados
            if ($pathinfo === '/home/ver') {
                return array (  '_controller' => 'EAMBundle\\Controller\\EmpleadoController::MostrarAction',  '_route' => 'Ver_empleados',);
            }

            // Ver
            if ($pathinfo === '/home/usuario') {
                return array (  '_controller' => 'EAMBundle\\Controller\\EmpleadoController::VerAction',  '_route' => 'Ver',);
            }

        }

        // logout
        if ($pathinfo === '/logout') {
            return array('_route' => 'logout');
        }

        // homepage
        if ($pathinfo === '/app/example') {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
