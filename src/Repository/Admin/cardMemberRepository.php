<?php

namespace App\Repository\Admin;

use App\Entity\Admin\cardMember;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method cardMember|null find($id, $lockMode = null, $lockVersion = null)
 * @method cardMember|null findOneBy(array $criteria, array $orderBy = null)
 * @method cardMember[]    findAll()
 * @method cardMember[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class cardMemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, cardMember::class);
    }

    // /**
    //  * @return cardMember[] Returns an array of cardMember objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?cardMember
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
