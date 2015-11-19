<?php

namespace Vinv\SigproBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UnitControllerTest extends WebTestCase
{
    public function testUnitdetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/unitDetail');
    }

}
