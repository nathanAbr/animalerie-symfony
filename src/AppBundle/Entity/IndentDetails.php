<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndentDetails
 *
 * @ORM\Table(name="indent_details")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IndentDetailsRepository")
 */
class IndentDetails
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
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;


    /**
     * @ORM\ManyToOne(targetEntity="Indent", inversedBy="indentsdetails")
     */
    private $indent;

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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return IndentDetails
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set indent
     *
     * @param \AppBundle\Entity\Indent $indent
     *
     * @return IndentDetails
     */
    public function setIndent(\AppBundle\Entity\Indent $indent = null)
    {
        $this->indent = $indent;

        return $this;
    }

    /**
     * Get indent
     *
     * @return \AppBundle\Entity\Indent
     */
    public function getIndent()
    {
        return $this->indent;
    }
}
