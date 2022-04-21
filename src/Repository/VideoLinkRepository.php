<?php

namespace App\Repository;

use App\Entity\VideoLink;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method VideoLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoLink[]    findAll()
 * @method VideoLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoLink::class);
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
            ->addSelect('url.time')
            ->getQuery()
            ->getArrayResult();
    }
}