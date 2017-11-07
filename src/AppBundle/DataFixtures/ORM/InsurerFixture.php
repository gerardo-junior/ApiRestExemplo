<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Insurer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class InsurerFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ruleByAgeDefault = array(array('age' => '18-24',
                                        'percentage' => 0.14),
                                  array('age' => '25-32',
                                        'percentage' => 0.18),
                                  array('age' => '33-40',
                                        'percentage' => -0.08),
                                  array('age' => '41-48',
                                        'percentage' => 0.03),
                                  array('age' => '49-60',
                                        'percentage' => 0.11),
                                  array('age' => '60-*',
                                        'percentage' => 0.15));

        $insurers = array(array('name' => 'SulAmérica',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [], 'percentage' => -0.05),
                                                                  array('brands' => [], 'percentage' => 0.1),
                                                                  array('brands' => [], 'percentage' => 0.24),
                                                                  array('brands' => [], 'percentage' => 0.08)))),
                          array('name' => 'Porto Seguro',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [], 'percentage' => -0.05),
                                                                  array('brands' => [], 'percentage' => -0.07),
                                                                  array('brands' => [], 'percentage' => 0.14),
                                                                  array('brands' => [], 'percentage' => 0.01)))),
                          array('name' => 'Tókio Marine',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [], 'percentage' => 0.4),
                                                                  array('brands' => [], 'percentage' => 0.42),
                                                                  array('brands' => [], 'percentage' => 0)))),
                          array('name' => 'Bradesco Seguros',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [], 'percentage' => 0.05),
                                                                  array('brands' => [], 'percentage' => 0.02),
                                                                  array('brands' => [], 'percentage' => 0.14),
                                                                  array('brands' => [], 'percentage' => -0.18),
                                                                  array('brands' => [], 'percentage' => -0.13)))),
                          array('name' => 'Liberty Seguros',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [], 'percentage' => 0.09),
                                                                  array('brands' => [], 'percentage' => -0.02)))),
                          array('name' => 'Maphre Seguros',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [], 'percentage' => 0.01),
                                                                  array('brands' => [], 'percentage' => 0.02),
                                                                  array('brands' => [], 'percentage' => 0.08),
                                                                  array('brands' => [], 'percentage' => 0.04),
                                                                  array('brands' => [], 'percentage' => 0.05),
                                                                  array('brands' => [], 'percentage' => 0.02),
                                                                  array('brands' => [], 'percentage' => 0.07),
                                                                  array('brands' => [], 'percentage' => 0.08),
                                                                  array('brands' => [], 'percentage' => 0.15),
                                                                  array('brands' => [], 'percentage' => 0.10)))));
        foreach ($insurers as $insurerArray) {
            $insurer = new Insurer();
            $insurer->setName($insurerArray['name']);
            $insurer->setRule($insurerArray['rules']);
            $insurer->setInitialPrice(1500);
            $manager->persist($insurer);
        }

        $manager->flush();
    }
}