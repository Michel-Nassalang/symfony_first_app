<?php

namespace App\Repository;

use App\Entity\EtatCaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtatCaisse>
 *
 * @method EtatCaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatCaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatCaisse[]    findAll()
 * @method EtatCaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatCaisse::class);
    }

    public function save(EtatCaisse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EtatCaisse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EtatCaisse[] Returns an array of EtatCaisse objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EtatCaisse
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
