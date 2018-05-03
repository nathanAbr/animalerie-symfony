<?php

namespace AppBundle\Repository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use AppBundle\Entity\Indent;
use Doctrine\ORM\EntityRepository;

class IndentRepository extends EntityRepository
{
    public function existPanier($userId)
    {
        $indent = "Indent";

        $sql = "SELECT i.* "

            . "FROM " . $indent . " AS i "

            . "WHERE i.indentNumber is NULL  "

            . "AND i.user_id= :userId";

        $rsm = new ResultSetMappingBuilder($this->getEntityManager());

        $rsm->addEntityResult(Indent::class, "i");


        // On mappe le nom de chaque colonne en base de données sur les attributs de nos entités

        foreach ($this->getClassMetadata()->fieldMappings as $obj) {

            $rsm->addFieldResult("i", $obj["columnName"], $obj["fieldName"]);

        }


        $stmt = $this->getEntityManager()->createNativeQuery($sql, $rsm);

        $stmt->setParameter(":userId", $userId);

        $stmt->execute();

        // ON RETOURNE UN  TABLEAU d'OBJETS

        return $stmt->getResult();
    }
}
