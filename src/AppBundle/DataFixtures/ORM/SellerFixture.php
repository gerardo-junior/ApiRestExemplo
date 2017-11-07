<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Seller;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SellerFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sellers = array(array('name' => 'Bruna Aveline',
                               'email' => 'bruno@bannet.com.br'),
                         array('name' => 'Vicente Pinheiro',
                               'email' => 'vicente@bannet.com.br'),
                         array('name' => 'Sara',
                               'email' => 'sara@bannet.com.br'),
                         array('name' => 'Ana Karine',
                               'email' => 'ana@bannet.com.br'));

        foreach ($sellers as $sellerArray) {
            $seller = new Seller();
            $seller->setName($sellerArray['name']);
            $seller->setEmail($sellerArray['email']);
            $manager->persist($seller);
        }

        $manager->flush();
    }
}