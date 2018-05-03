<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 02/05/18
 * Time: 09:10
 */

namespace AppBundle\Services;


use AppBundle\Entity\Object;
use Doctrine\ORM\EntityManagerInterface;

class ObjectService
{
    private $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Object::class);
    }

}