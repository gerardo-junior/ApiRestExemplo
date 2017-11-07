<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SellerFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $insurers = array('Fiat',
            'SulAmérica',
            'Porto Seguro',
            'Tókio Marine',
            'Bradesco Seguros',
            'Liberty Seguros',
            'Maphre Seguros');

        foreach ($insurers as $insurerArray) {
            $insurer = new Brand();
            $insurer->setName($insurerArray['name']);
            $manager->persist($insurer);
        }

        $manager->flush();
    }
}