<?php

namespace App\Repository;

use App\Entity\UrlLinks;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method UrlLinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method UrlLinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method UrlLinks[]    findAll()
 * @method UrlLinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrlLinksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UrlLinks::class);
    }
}