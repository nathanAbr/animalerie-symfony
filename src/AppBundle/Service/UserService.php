<?php
namespace AppBundle\Service;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DBALException;

class UserService
{
    private $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(User::class);
    }

    public function add($user){
        try{
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (DBALException $e){

        }
    }

}