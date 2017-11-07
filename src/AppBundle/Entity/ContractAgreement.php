<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="contract_agreement")
 */
class ContractAgreement
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="Insurer")
     * @ORM\JoinColumn(name="insurer_id", referencedColumnName="id")
     */
    private $insurer;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="float", length=50)
     */
    private $price;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     * @return self
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsurer()
    {
        return $this->insurer;
    }

    /**
     * @param mixed $insurer
     * @return self
     */
    public function setInsurer($insurer)
    {
        $this->insurer = $insurer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
}