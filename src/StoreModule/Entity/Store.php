<?php

namespace StoreModule\Entity;

use JsonSerializable;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="stores")
 */
class Store implements JsonSerializable
{

    /**
     * The store Id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    private $id;

    /**
     * The store name
     *
     * @ORM\Column(type="string", nullable=false, unique=true)
     *
     * @var string
     */
    private $name;

    /**
     * The store slug
     *
     * @ORM\Column(type="string", nullable=false, unique=true)
     *
     * @var string
     */
    private $slug;

    /**
     * The store description
     *
     * @ORM\Column(type="string", nullable=false)
     *
     * @var string
     */
    private $description;

    /**
     * The store updated date
     *
     * @ORM\Column(type="datetime", nullable=false)
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * Get the store Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the store Id
     *
     * @param $id
     * @return $this
     */
    public function setId(?int $id): Store
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the store name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the store name
     *
     * @param $name
     * @return $this
     */
    public function setName(?string $name): Store
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     * @return $this
     */
    public function setSlug(?string $slug): Store
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get the store description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the store description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(?string $description): Store
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the updated at
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * Set the updated at
     *
     * @param \DateTime|null $updated_at
     *
     * @return $this
     */
    public function setUpdatedAt(?\DateTime $updated_at): Store
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'slug' => $this->getSlug(),
            'description' => $this->getDescription(),
            'updated_at' => $this->getUpdatedAt()->format(\DATE_ISO8601),
        ];
    }
}