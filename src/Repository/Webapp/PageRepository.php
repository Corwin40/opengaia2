<?php

namespace App\Repository\Webapp;

use App\Entity\Webapp\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Page|null find($id, $lockMode = null, $lockVersion = null)
 * @method Page|null findOneBy(array $criteria, array $orderBy = null)
 * @method Page[]    findAll()
 * @method Page[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    /**
     * Retourne la première occurence de page
     */
    public function firstPage()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.isMenu = :isMenu')
            ->setParameter('isMenu', 1)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * Liste les pages qui s'afficheront dans le bloc menu.
     */
    public function listMenu()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.isMenu = :isMenu')
            ->setParameter('isMenu', 1)
            ->orderBy('p.position', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Page[] Returns an array of Page objects
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
    public function findOneBySomeField($value): ?Page
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
