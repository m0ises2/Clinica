<?php

namespace EAMBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EmpleadoControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testNuevo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/home/nuevo');
    }

}
