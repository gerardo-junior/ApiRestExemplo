<?php
namespace AppBundle\Service;

use AppBundle\Entity\Client;
use AppBundle\Entity\Insurer;

class InsurerService
{
    private $doctrine;
    private $em;
    private $validator;

    public function __construct($doctrine, $validator)
    {
        $this->doctrine = $doctrine;
        $this->em = $this->doctrine->getManager();
        $this->validator = $validator;
    }

    public function calculateValue(Client $client, Insurer $insurer)
    {
        $rules = $insurer->getRules();

        $brand = $client->getBrand();
        $percentageByBrand = 0;
        foreach ($rules['ruleByBrand'] as $rule) {
            if (in_array($brand->getId(), $rule['brands'])) {
                $percentageByBrand = $rule['percentage'];
                break;
            }
        }

        $age = $client->getAge();
        $percentageByAge = 0;
        foreach ($rules['ruleByAge'] as $rule) {
            $ruleAge = explode('-', $rule['age']);
            if (($ruleAge[0] == '*' && $age <= $ruleAge[0]) || ($ruleAge[1] == '*' && $age >= $ruleAge[0]) || ($ruleAge[0] == $age) || ($ruleAge[1] == $age) || ($age > $ruleAge[0] && $age < $ruleAge[1])) {
                $percentageByAge = $rule['percentage'];
                break;
            }
        }

        return $insurer->getInitialPrice() + ($insurer->getInitialPrice() * $percentageByBrand) + ($insurer->getInitialPrice() * $percentageByAge);
    }
}