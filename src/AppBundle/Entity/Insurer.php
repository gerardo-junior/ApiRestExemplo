<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="insurer")
 */
class Insurer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer", length=20, options={"default" : 1500})
     */
    private $initialPrice;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="json_array")
     */
    private $rule;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitialPrice()
    {
        return $this->initialPrice;
    }

    /**
     * @param mixed $initialPrice
     * @return self
     */
    public function setInitialPrice($initialPrice)
    {
        $this->initialPrice = $initialPrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * @param mixed $rule
     * @return self
     */
    public function setRule($rule)
    {
        $this->rule = $rule;
        return $this;
    }
}