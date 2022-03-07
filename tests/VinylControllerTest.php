<?php

namespace App\Test\Controller;

use App\Repository\UserRepository;
use App\Repository\VinylRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VinylControllerTest extends WebTestCase
{

    public function testVinyl(UserRepository $userRepository, VinylRepository $vinylRepository)
    {
        $routes = ['/vinyl/', '/vinyl/new', '/vinyl/{id}', '/vinyl/{id}/edit'];
        self::bootKernel();
        $container = static::getContainer();
        $nbVinyl = $container->get(VinylRepository::class)->count([]);
        $userAdmin = $userRepository->findBy(['email =>admin@admin']);

        $client = static::createClient();
       // $client->loginUser($userAdmin);
        $client->request('GET', 'vinyl');
        //echo $client->getResponse()->getContent();
        //echo "Status code".$client->getResponse()->getStatusCode();
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "La page de la requete ne fonctionne pas");
    }
}
