<?php

namespace App\Repository;

use App\Entity\ImageLink;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method ImageLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageLink[]    findAll()
 * @method ImageLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageLink::class);
    }

    /**
     * @return array
     */
    public function findAllWithoutDatePublished()
    {
        return $this
            ->createQueryBuilder('url')
            ->select('url.id')
            ->addSelect('url.title')
            ->addSelect('url.author')
            ->addSelect('url.url')
            ->addSelect('url.provider')
            ->addSelect('url.addDate')
            ->addSelect('url.width')
            ->addSelect('url.height')
            ->getQuery()
            ->getArrayResult();
    }
}