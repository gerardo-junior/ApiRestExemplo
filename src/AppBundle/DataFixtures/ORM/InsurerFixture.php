<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Insurer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class InsurerFixture extends Fixture
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
            $insurer = new Insurer();
            $insurer->setName($insurerArray['name']);
            $manager->persist($insurer);
        }

        $manager->flush();
    }
}