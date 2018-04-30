<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObjectType
 *
 * @ORM\Table(name="object_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObjectTypeRepository")
 */
class ObjectType
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
     * @var Object[]
     *
     * @ORM\OneToMany(targetEntity="Object", mappedBy="objectType")
     */
    private $objects;

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
     * @return ObjectType
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
     * Constructor
     */
    public function __construct()
    {
        $this->object = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add object
     *
     * @param \AppBundle\Entity\Object $object
     *
     * @return ObjectType
     */
    public function addObject(\AppBundle\Entity\Object $object)
    {
        $this->object[] = $object;

        return $this;
    }

    /**
     * Remove object
     *
     * @param \AppBundle\Entity\Object $object
     */
    public function removeObject(\AppBundle\Entity\Object $object)
    {
        $this->object->removeElement($object);
    }

    /**
     * Get object
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Get objects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjects()
    {
        return $this->objects;
    }
}
