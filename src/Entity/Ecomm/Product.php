<?php

namespace App\Entity\Ecomm;

use App\Entity\Admin\Member;
use App\Repository\Ecomm\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=Member::class, inversedBy="products")
     */
    private $producer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\ManyToOne(targetEntity=typeProduct::class, inversedBy="products")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=FamProduct::class, inversedBy="products")
     */
    private $family;

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getProducer(): ?Member
    {
        return $this->producer;
    }

    public function setProducer(?Member $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
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

    public function getType(): ?typeProduct
    {
        return $this->type;
    }

    public function setType(?typeProduct $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getFamily(): ?FamProduct
    {
        return $this->family;
    }

    public function setFamily(?FamProduct $family): self
    {
        $this->family = $family;

        return $this;
    }
}
