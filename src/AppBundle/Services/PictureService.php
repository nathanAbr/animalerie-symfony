<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 02/05/18
 * Time: 09:11
 */

namespace AppBundle\Services;


use AppBundle\Entity\Picture;
use Doctrine\ORM\EntityManagerInterface;

class PictureService
{
    private $entityManager;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Picture::class);
    }
}