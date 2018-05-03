<?php

namespace AppBundle\Service;

use AppBundle\Entity\Indent;
use Doctrine\ORM\EntityManagerInterface;


class IndentService

{
    private $entityManager;
    private $repository;


    public function __construct(EntityManagerInterface $entityManager)

    {

        $this->entityManager = $entityManager;

        $this->repository = $this->entityManager->getRepository(Indent::class);

    }


    public function getIndent($user){

        $panier = $this->entityManager
            ->getRepository('AppBundle:Indent')
            ->existPanier($user->getId());

        if ($panier != null) {
            return $panier[0];
        } else {

            $indent = new Indent();

            $indent->setUser($user->getId());

            $indent->setDate(new \DateTime('now'));


            $this->entityManager->persist($indent);

            $this->entityManager->flush();

            echo "Création d'un nouveau panier";

            return $indent;

        }

    }


}