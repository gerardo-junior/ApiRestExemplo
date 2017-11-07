<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BrandFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $brands = array('Fiat',
                        'Peugeot',
                        'Chevrolet',
                        'Troller',
                        'Toyota',
                        'Renault',
                        'Kia',
                        'Volkwagen',
                        'Porsche',
                        'BMW');

        foreach ($brands as $brandArray) {
            $brand = new Brand();
            $brand->setName($brandArray['name']);
            $manager->persist($brand);
        }

        $manager->flush();
    }
}