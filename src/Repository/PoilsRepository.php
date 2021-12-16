<?php

namespace App\Repository;

use App\Entity\Poils;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Poils|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poils|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poils[]    findAll()
 * @method Poils[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoilsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poils::class);
    }

    // /**
    //  * @return Poils[] Returns an array of Poils objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Poils
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
