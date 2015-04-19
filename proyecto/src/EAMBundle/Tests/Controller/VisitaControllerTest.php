<?php

namespace EAMBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VisitaControllerTest extends WebTestCase
{
    public function testNueva()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/visita/nueva/');
    }

}
