<?php

namespace AppBundle\Repository;

/**
 * CurrencyRateRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CurrencyRateRepository extends \Doctrine\ORM\EntityRepository
{

    public function getLastRateByCurrency($currency)
    {
        $qb = $this->createQueryBuilder('cr');
        $qb->select('cr.rate');
        $qb->where('cr.currency = :currency');
        $qb->add('orderBy', 'cr.updatedAt DESC');
        $qb->setMaxResults(1);

        $qb->setParameter('currency', $currency);

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function getLastRateByCurrencyCode($currency)
    {
        $qb = $this->createQueryBuilder('cr');
        $qb->select('cr.rate');
        $qb->join('cr.currency','cur');
        $qb->where('cur.code = :currency');
        $qb->add('orderBy', 'cr.updatedAt DESC');
        $qb->setMaxResults(1);

        $qb->setParameter('currency', $currency);

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function getLastRateByAssetId($assetId)
    {
        $qb = $this->createQueryBuilder('cr');
        $qb->select('cr.rate');
        $qb->join('cr.currency','c');
        $qb->where('c.assetId = :assetId');
        $qb->add('orderBy', 'cr.updatedAt DESC');
        $qb->setMaxResults(1);

        $qb->setParameter('assetId', $assetId);

        return $qb->getQuery()->getSingleScalarResult();
    }
}
