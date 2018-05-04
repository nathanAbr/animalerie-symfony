<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pet
 *
 * @ORM\Table(name="pet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PetRepository")
 */
class Pet extends Product
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
     * @ORM\Column(name="label", type="string", length=255, unique=true)
     */
    private $label;

    /**
     * @var Pet[]
     *
     * @ORM\OneToMany(targetEntity="Pet", mappedBy="parent")
     */
    private $children;

    /**
     * @var Pet
     *
     * @ORM\ManyToOne(targetEntity="Pet", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set label
     *
     * @param string $label
     *
     * @return Pet
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Add parent
     *
     * @param \AppBundle\Entity\Pet $parent
     *
     * @return Pet
     */
    public function addParent(\AppBundle\Entity\Pet $parent)
    {
        $this->parent[] = $parent;

        return $this;
    }

    /**
     * Remove parent
     *
     * @param \AppBundle\Entity\Pet $parent
     */
    public function removeParent(\AppBundle\Entity\Pet $parent)
    {
        $this->parent->removeElement($parent);
    }

    /**
     * Get parent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set children
     *
     * @param \AppBundle\Entity\Pet $children
     *
     * @return Pet
     */
    public function setChildren(\AppBundle\Entity\Pet $children = null)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * Get children
     *
     * @return \AppBundle\Entity\Pet
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add child
     *
     * @param \AppBundle\Entity\Pet $child
     *
     * @return Pet
     */
    public function addChild(\AppBundle\Entity\Pet $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \AppBundle\Entity\Pet $child
     */
    public function removeChild(\AppBundle\Entity\Pet $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Set parent
     *
     * @param \AppBundle\Entity\Pet $parent
     *
     * @return Pet
     */
    public function setParent(\AppBundle\Entity\Pet $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }
}
