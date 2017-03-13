<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AlumnoRepository
 *
 */
class AlumnoRepository extends EntityRepository
{
    public function findAllOrderedByPaterno()
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT a FROM AppBundle:Alumno a ORDER BY a.paterno ASC"
            )
            ->getResult();
    }

    public function findAllBySemestre()
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT a FROM AppBundle:Alumno a
                    JOIN a.programas p
                    JOIN p.semestres s
                    WHERE s.semestre = '2017-2'
                    ORDER BY a.paterno ASC"
            )
//            ->setParameter('semestre', $semestre)
        ->getResult();
    }

}
