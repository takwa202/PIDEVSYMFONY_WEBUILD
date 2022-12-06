<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 *
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }


    public function findByPriceRange($minValue,$maxValue)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.prix >= :minVal')
            ->setParameter('minVal', $minValue)
            ->andWhere('a.prix <= :maxVal')
            ->setParameter('maxVal', $maxValue)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

    public function save(Produit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Produit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   // public function OrderByCategoriesQB(){
     //   return $this->createQueryBuilder('p')
       //     ->orderBy('p.categories','ASC')
         //   ->getQuery()->getResult();

        //$em=$this->getEntityManager();
        //$query=$em->createQuery('
        //select p from App\Entity\Produit p order by p.categories ASC');
        //return $query->getResult();
   // }


    public function findProduitsBySujet($sujet,$status,$order){
        $em = $this->getEntityManager();
        if($order=='DESC') {
            $query = $em->createQuery(
                'SELECT r FROM App\Entity\Produit r   where r.nomProd like :suj  and r.discription like :status order by r.categories DESC '
            );
            $query->setParameter('suj', $sujet . '%');
            $query->setParameter('status', $status . '%');
        }
        else{
            $query = $em->createQuery(
                'SELECT r FROM App\Entity\Produit r   where r.nomProd like :suj  and r.discription like :status order by r.categories ASC '
            );
            $query->setParameter('suj', $sujet . '%');
            $query->setParameter('status', $status . '%');
        }
        return $query->getResult();
    }

//    /**
//     * @return Produit[] Returns an array of Produit objects
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

//    public function findOneBySomeField($value): ?Produit
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
