<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 02/05/18
 * Time: 09:10
 */

namespace AppBundle\Services;


use AppBundle\Entity\Pet;
use Doctrine\ORM\EntityManagerInterface;

class PetService
{
    private $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Pet::class);
    }
}