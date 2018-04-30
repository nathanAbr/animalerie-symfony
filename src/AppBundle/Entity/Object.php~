<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 *
 * @ORM\Table(name="object")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObjectRepository")
 */
class Object extends Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var ObjectType
     *
     * @ORM\ManyToOne(targetEntity="ObjectType", inversedBy="objects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $objectType;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Object
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set objectType
     *
     * @param \AppBundle\Entity\ObjectType $objectType
     *
     * @return Object
     */
    public function setObjectType(\AppBundle\Entity\ObjectType $objectType)
    {
        $this->objectType = $objectType;

        return $this;
    }

    /**
     * Get objectType
     *
     * @return \AppBundle\Entity\ObjectType
     */
    public function getObjectType()
    {
        return $this->objectType;
    }
}
