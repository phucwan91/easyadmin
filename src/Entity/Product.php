<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Image;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Image", mappedBy="product", cascade={"persist", "remove"}, fetch="EAGER")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        // dump($images);
        // die;
        $this->images->clear();

        foreach ($images as $image) {
           // $this->images->add($image);

           $image->setProduct($this);
        }

        return $this;
    }

    public function addImage($image)
    {
        $this->images->add($image);

        return $this;
    }
}
