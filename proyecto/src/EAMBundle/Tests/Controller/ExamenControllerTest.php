<?php

namespace EAMBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExamenControllerTest extends WebTestCase
{
    public function testNuevo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/examen/nuevo');
    }

    public function testEditar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/examen/editar');
    }

    public function testEliminar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/examen/eliminar');
    }

}
