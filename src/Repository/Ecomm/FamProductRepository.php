<?php

namespace App\Repository\Ecomm;

use App\Entity\Ecomm\FamProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FamProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamProduct[]    findAll()
 * @method FamProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamProduct::class);
    }

    // /**
    //  * @return FamProduct[] Returns an array of FamProduct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FamProduct
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
