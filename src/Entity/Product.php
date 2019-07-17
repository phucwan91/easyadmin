<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="json_array")
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country): self
    {

        $this->country = $country;

        return $this;
    }

    public function getCountryList()
    {
        return json_encode($this->country);
        // return implode(' ', $this->country);
    }
}
