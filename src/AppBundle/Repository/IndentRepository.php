<?php

namespace AppBundle\Repository;

use AppBundle\AppBundle;
use AppBundle\Entity\Indent;
use AppBundle\Entity\User;

class IndentRepository extends \Doctrine\ORM\EntityRepository
{
    public function  existPanier($userId){

        $em = $this->getEntityManager();
        $queryBuilder =  $em->createQueryBuilder();
        $queryBuilder->select('indent')
                        ->from ('AppBundle:Indent','indent')
                        ->where('indent.user_id=:userId')
                        ->andWhere('indent.indentNumber IS NULL')
                        ->setParameter('userId',$userId);
        return $queryBuilder->getQuery()->getResult();

        /*
        $con = Doctrine_Manager::getInstance()->connection();
        $st = $con->execute("SELECT id FROM indent WHERE user_id = $id AND indentNumber IS NULL ");
        return $result = $st->fetchAll();*/

    }
}
