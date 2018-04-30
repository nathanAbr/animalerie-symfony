<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indent
 *
 * @ORM\Table(name="indent")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IndentRepository")
 */
class Indent
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="indents")
     */
    private $user;


    /**
     * @ORM\OneToMany(targetEntity="IndentDetails", mappedBy="indent")
     */
    private $indentDetails;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Indent
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->indentDetails = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Indent
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add indentDetail
     *
     * @param \AppBundle\Entity\IndentDetails $indentDetail
     *
     * @return Indent
     */
    public function addIndentDetail(\AppBundle\Entity\IndentDetails $indentDetail)
    {
        $this->indentDetails[] = $indentDetail;

        return $this;
    }

    /**
     * Remove indentDetail
     *
     * @param \AppBundle\Entity\IndentDetails $indentDetail
     */
    public function removeIndentDetail(\AppBundle\Entity\IndentDetails $indentDetail)
    {
        $this->indentDetails->removeElement($indentDetail);
    }

    /**
     * Get indentDetails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIndentDetails()
    {
        return $this->indentDetails;
    }
}
