<?php
/**
 * Created by PhpStorm.
 * User: colin
 * Date: 03/05/2018
 * Time: 14:28
 */

namespace AppBundle\Service;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DBALException;
use AppBundle\Entity\IndentDetails;

class IndentDetailsService
{
    private $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(IndentDetails::class);
    }
    //$indent, $quantite
    public function add($indentDetails){
        try{
            //$quantite, $indent
            $indent = $this->entityManager->getRepository('AppBundle:Indent')->findOneBy(['id'=>2]);
            $indentDetails->setIndent($indent);
            $this->entityManager->persist($indentDetails);
            $this->entityManager->flush();

        } catch (DBALException $e){

        }
    }

}