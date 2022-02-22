<?php
namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use phpDocumentor\Reflection\Types\Nullable;


#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    #[ORM\Column(type: 'text')]
    private $shortDescription;

    /**
     * @ORM\Column(type="string")
     */
    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    #[ORM\Column(type: 'integer')]
    private $availableQuantity;

    /**
     * @ORM\Column(type="string")
     */
    #[ORM\Column(type: 'float')]
    private $price;

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string {
        return $this->shortDescription;
    }

    /**
     * @param mixed $shortDescription
     */
    public function setShortDescription($shortDescription): self {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAvailableQuantity(): ?int {
        return $this->availableQuantity;
    }

    /**
     * @param mixed $availableQuantity
     */
    public function setAvailableQuantity($availableQuantity): self {
        $this->availableQuantity = $availableQuantity;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): self {
        $this->price = $price;
        return $this;
    }

}