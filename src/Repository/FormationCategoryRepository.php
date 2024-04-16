<?php

namespace App\Repository;

use App\Entity\FormationCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormationCategory>
 *
 * @method FormationCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormationCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormationCategory[]    findAll()
 * @method FormationCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormationCategory::class);
    }

    //    /**
    //     * @return FormationCategory[] Returns an array of FormationCategory objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?FormationCategory
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
