<?php

namespace App\Repository;

use App\Entity\TarifAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TarifAdmin>
 *
 * @method TarifAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifAdmin[]    findAll()
 * @method TarifAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifAdminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifAdmin::class);
    }

//    /**
//     * @return TarifAdmin[] Returns an array of TarifAdmin objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TarifAdmin
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
