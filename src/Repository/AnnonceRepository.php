<?php

namespace App\Repository;

use App\Entity\Annonce;
use App\Entity\Departement;
use App\Entity\Statut;
use App\Entity\TypeAnimal;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonce::class);

    }

    public function findDefault(){
        $qb = $this->createQueryBuilder('p');
        $qb->join("p.departement", "d");
        $qb->join("p.statut", "s");
        $qb->join('p.typeAnimal', "t");
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function findByFiltre(Departement $departement, Statut $statut, TypeAnimal $typeAnimal)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->join("p.departement", "d");
        $qb->join("p.statut", "s");
        $qb->join('p.typeAnimal', "t");

        if ($departement) {
            $qb->setParameter('departement', $departement)
                ->andWhere("p.departement = :departement");
        }

        if ($statut) {
            $qb->setParameter('statut', $statut)
                ->andWhere("p.statut = :statut");
        }

        if ($typeAnimal) {
            $qb->setParameter('typeAnimal', $typeAnimal)
                ->andWhere("p.typeAnimal = :typeAnimal");
        }


        $query = $qb->getQuery();
        return $query->getResult();
    }

    // /**
    //  * @return Annonce[] Returns an array of Annonce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Annonce
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
