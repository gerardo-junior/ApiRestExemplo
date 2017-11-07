<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Insurer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class InsurerFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $brandRepository = $manager->getRepository('AppBundle:Brand');

        $fiat = $brandRepository->findOneBy(array('name' => 'Fiat'))->getId();
        $peugeot = $brandRepository->findOneBy(array('name' => 'Peugeot'))->getId();
        $chevrolet = $brandRepository->findOneBy(array('name' => 'Chevrolet'))->getId();
        $troller = $brandRepository->findOneBy(array('name' => 'Troller'))->getId();
        $toyota =  $brandRepository->findOneBy(array('name' => 'Toyota'))->getId();
        $renault =  $brandRepository->findOneBy(array('name' => 'Renault'))->getId();
        $kia =  $brandRepository->findOneBy(array('name' => 'Kia'))->getId();
        $volkwagen =  $brandRepository->findOneBy(array('name' => 'Volkwagen'))->getId();
        $porsche =  $brandRepository->findOneBy(array('name' => 'Porsche'))->getId();
        $bmw =  $brandRepository->findOneBy(array('name' => 'BMW'))->getId();

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
                                                 'ruleByBrand' => array(array('brands' => [$fiat, $peugeot, $chevrolet], 'percentage' => -0.05),
                                                                        array('brands' => [$troller, $toyota], 'percentage' => 0.1),
                                                                        array('brands' => [$renault, $kia, $volkwagen], 'percentage' => 0.24),
                                                                        array('brands' => [$porsche, $bmw], 'percentage' => 0.08)))),
                          array('name' => 'Porto Seguro',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [$fiat, $renault, $kia], 'percentage' => -0.05),
                                                                        array('brands' => [$peugeot, $bmw, $troller], 'percentage' => -0.07),
                                                                        array('brands' => [$toyota, $chevrolet], 'percentage' => 0.14),
                                                                        array('brands' => [$volkwagen, $porsche], 'percentage' => 0.01)))),
                          array('name' => 'Tókio Marine',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [$fiat, $porsche, $toyota], 'percentage' => 0.4),
                                                                        array('brands' => [$peugeot, $troller, $renault, $kia], 'percentage' => 0.42),
                                                                        array('brands' => [$bmw, $chevrolet, $volkwagen], 'percentage' => 0)))),
                          array('name' => 'Bradesco Seguros',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [$fiat, $kia], 'percentage' => 0.05),
                                                                        array('brands' => [$peugeot, $renault], 'percentage' => 0.02),
                                                                        array('brands' => [$bmw, $chevrolet], 'percentage' => 0.14),
                                                                        array('brands' => [$troller, $porsche], 'percentage' => -0.18),
                                                                        array('brands' => [$toyota, $volkwagen], 'percentage' => -0.13)))),
                          array('name' => 'Liberty Seguros',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [$fiat, $peugeot, $bmw, $troller, $toyota], 'percentage' => 0.09),
                                                                        array('brands' => [$chevrolet, $renault, $kia, $volkwagen, $porsche], 'percentage' => -0.02)))),
                          array('name' => 'Maphre Seguros',
                                'rules' => array('ruleByAge' => $ruleByAgeDefault,
                                                 'ruleByBrand' => array(array('brands' => [$fiat], 'percentage' => 0.01),
                                                                        array('brands' => [$peugeot], 'percentage' => 0.02),
                                                                        array('brands' => [$bmw], 'percentage' => 0.08),
                                                                        array('brands' => [$troller], 'percentage' => 0.04),
                                                                        array('brands' => [$toyota], 'percentage' => 0.05),
                                                                        array('brands' => [$chevrolet], 'percentage' => 0.02),
                                                                        array('brands' => [$renault], 'percentage' => 0.07),
                                                                        array('brands' => [$kia], 'percentage' => 0.08),
                                                                        array('brands' => [$volkwagen], 'percentage' => 0.15),
                                                                        array('brands' => [$porsche], 'percentage' => 0.10)))));
        foreach ($insurers as $insurerArray) {
            $insurer = new Insurer();
            $insurer->setName($insurerArray['name']);
            $insurer->setRules($insurerArray['rules']);
            $insurer->setInitialPrice(1500);
            $manager->persist($insurer);
        }

        $manager->flush();
    }
}