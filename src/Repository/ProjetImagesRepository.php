<?php

namespace App\Repository;

use App\Entity\ProjetImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProjetImages>
 *
 * @method ProjetImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjetImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjetImages[]    findAll()
 * @method ProjetImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjetImages::class);
    }

    //    /**
    //     * @return ProjetImages[] Returns an array of ProjetImages objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ProjetImages
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
