<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payTo;

    /**
     * @ORM\Column(type="integer")
     */
    private $orderRank;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $emailList = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $phoneList = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;

    /**
     * @ORM\OneToMany(targetEntity=CompanyResponsability::class, mappedBy="company")
     */
    private $companyResponsabilities;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="company", orphanRemoval=true)
     */
    private $products;

    public function __construct()
    {
        $this->companyResponsabilities = new ArrayCollection();
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

    public function getPayTo(): ?string
    {
        return $this->payTo;
    }

    public function setPayTo(?string $payTo): self
    {
        $this->payTo = $payTo;

        return $this;
    }

    public function getOrderRank(): ?int
    {
        return $this->orderRank;
    }

    public function setOrderRank(int $orderRank): self
    {
        $this->orderRank = $orderRank;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getEmailList(): ?array
    {
        return $this->emailList;
    }

    public function setEmailList(?array $emailList): self
    {
        $this->emailList = $emailList;

        return $this;
    }

    public function getPhoneList(): ?array
    {
        return $this->phoneList;
    }

    public function setPhoneList(?array $phoneList): self
    {
        $this->phoneList = $phoneList;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return Collection|CompanyResponsability[]
     */
    public function getCompanyResponsabilities(): Collection
    {
        return $this->companyResponsabilities;
    }

    public function addCompanyResponsability(CompanyResponsability $companyResponsability): self
    {
        if (!$this->companyResponsabilities->contains($companyResponsability)) {
            $this->companyResponsabilities[] = $companyResponsability;
            $companyResponsability->setCompany($this);
        }

        return $this;
    }

    public function removeCompanyResponsability(CompanyResponsability $companyResponsability): self
    {
        if ($this->companyResponsabilities->removeElement($companyResponsability)) {
            // set the owning side to null (unless already changed)
            if ($companyResponsability->getCompany() === $this) {
                $companyResponsability->setCompany(null);
            }
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
            $product->setCompany($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCompany() === $this) {
                $product->setCompany(null);
            }
        }

        return $this;
    }
}
