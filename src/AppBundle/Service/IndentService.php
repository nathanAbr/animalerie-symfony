<?php
/**
 * Created by PhpStorm.
 * User: colin
 * Date: 02/05/2018
 * Time: 13:15
 */

namespace AppBundle\Service;


use AppBundle\Entity\Indent;
use AppBundle\Repository\IndentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

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

            $panier = new Indent();
            $toto =  $this->entityManager
                      ->getRepository('AppBundle:Indent')
                      ->existPanier($id);//
            var_dump($toto);
die();
            if($panier->existPanier($id) != null)
            { return $panier;
                echo ("Mon panier ".$panier);
            }
            else{
                $indent = new Indent();
                $indent->setUser($id->getId());
                $indent->setDate(new \DateTime('now'));

                $this->entityManager->persist($indent);
                $this->entityManager->flush();
                echo "Création d'un nouveau panier";
            }
    }


}