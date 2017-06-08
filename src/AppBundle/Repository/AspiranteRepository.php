<?php

namespace AppBundle\Repository;

/**
 * AspiranteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AspiranteRepository extends \Doctrine\ORM\EntityRepository
{

    public function findAllBySemestre($semestre, $programa)
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT a FROM AppBundle:Aspirante a
                    JOIN a.semestre s
                    WHERE s.semestre = :semestre
                    AND a.programa = :programa
                    ORDER BY a.paterno ASC"
            )
            ->setParameter('semestre', $semestre)
            ->setParameter('programa', $programa)
            ->getResult();
    }
}