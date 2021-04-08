<?php

namespace App\Entity\Ecomm;

use App\Entity\Admin\cardMember;
use App\Repository\Ecomm\typeProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=typeProductRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class typeProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\ManyToMany(targetEntity=cardMember::class, mappedBy="Product")
     */
    private $cardMembers;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="type")
     */
    private $products;

    public function __construct()
    {
        $this->cardMembers = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreateAt(): self
    {
        $this->createAt = new \DateTime();

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setUpdateAt(): self
    {
        $this->updateAt = new \DateTime();

        return $this;
    }

    /**
     * @return Collection|cardMember[]
     */
    public function getCardMembers(): Collection
    {
        return $this->cardMembers;
    }

    public function addCardMember(cardMember $cardMember): self
    {
        if (!$this->cardMembers->contains($cardMember)) {
            $this->cardMembers[] = $cardMember;
            $cardMember->addProduct($this);
        }

        return $this;
    }

    public function removeCardMember(cardMember $cardMember): self
    {
        if ($this->cardMembers->removeElement($cardMember)) {
            $cardMember->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setType($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getType() === $this) {
                $product->setType(null);
            }
        }

        return $this;
    }

}
