<?php

namespace EAMBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AyudaControllerTest extends WebTestCase
{
    public function testMostrar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Ayuda');
    }

}
