<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 02/05/18
 * Time: 09:10
 */

namespace AppBundle\Services;


use AppBundle\Entity\Pet;
use AppBundle\Repository\PetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

class PetService
{
    private $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Pet::class);
    }

    public function getPetsByKindParent($id = null){
        return $this->repository->findPetsByKindParent($id);
    }

    public function getPetsByKind(){
        return $this->repository->findAll();
    }

    public function getFirstKindOfPet(){
        return $this->repository->findFirstKindOfPet();
    }

    public function addPet($pet){
        try{
            $this->entityManager->persist($pet);
            $this->entityManager->flush();
        } catch (DBALException $e){
            return $e->getMessage();
        }
    }

    public function getPetDetails($id){
        return $this->repository->find($id);
    }
}