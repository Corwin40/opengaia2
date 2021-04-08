<?php

namespace App\Repository\Ecomm;

use App\Entity\Ecomm\typeProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method typeProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method typeProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method typeProduct[]    findAll()
 * @method typeProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class typeProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, typeProduct::class);
    }

    // /**
    //  * @return typeProduct[] Returns an array of typeProduct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?typeProduct
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
