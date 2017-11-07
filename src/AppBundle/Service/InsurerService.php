<?php
namespace AppBundle\Service;

use AppBundle\Entity\Client;
use AppBundle\Entity\Insurer;

class InsurerService
{
    public function calculateValue(Client $client, Insurer $insurer)
    {
        $initialPrice = $insurer->getInitialPrice();

        $percentageByBrand = 0;
        switch ($client->getBrand()->getId()) {
            case 1:
                break;
            default:
        }

        $percentage = $insurer->getPercentage();
        $age = $client->getAge();

        $percentageByAge = 0;
        if ($age >= 18 && $age <= 24) {
            $percentageByAge = +0.14;
        } else if ($age >= 25 && $age <= 32) {
            $percentageByAge = +0.18;
        } else if ($age >= 33 && $age <= 40) {
            $percentageByAge = -0.08;
        } else if ($age >= 41 && $age <= 48) {
            $percentageByAge = +0.03;
        } else if ($age >= 49 && $age <= 60) {
            $percentageByAge = +0.11;
        } else if ($age <= 60) {
            $percentageByAge = +0.15;
        }

        return $initialPrice + ($initialPrice * $percentage) + ($initialPrice * $percentageByAge);
    }
}