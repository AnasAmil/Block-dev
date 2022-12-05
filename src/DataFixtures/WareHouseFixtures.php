<?php

namespace App\DataFixtures;

use App\Entity\Warehouse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WareHouseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $wareHouse = new Warehouse();
        $wareHouse->setWarehouseName('depot sidi bernouci');
        $wareHouse->setLocation('Sidi bernouci, amal 3');
        $wareHouse->setPhoneNumber('0675893451');
        $wareHouse->setMaxCells(2000);
        $wareHouse->setWareHouseImage('https://images.pexels.com/photos/4483610/pexels-photo-4483610.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
        $manager->persist(($wareHouse));
        $manager->flush();
    }
}
