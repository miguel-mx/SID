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

    public function findAllBySemestre($semestre, $programa)
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT a FROM AppBundle:Alumno a
                    JOIN a.programas p
                    JOIN p.semestres s
                    WHERE s.semestre = :semestre
                    AND p.programa = :programa
                    ORDER BY a.paterno ASC"
            )
            ->setParameter('semestre', $semestre)
            ->setParameter('programa', $programa)
        ->getResult();
    }

    public function findAllByExamenCandidatura($semestre_actual)
    {
        // Calcula el semestre de ingreso
        // Semestre actual - 4 semestres
        $expr = explode("-", $semestre_actual);

        $ingreso_num = (int) $expr[0] - 2;
        $sem_ingreso = (string) $ingreso_num . '-' . $expr[1];

        return $this->getEntityManager()
            ->createQuery(
                "SELECT a FROM AppBundle:Alumno a
                    JOIN a.programas p
                    WHERE p.ingreso = :sem_ingreso
                    AND p.programa = :programa
                    ORDER BY a.paterno ASC"
            )
            ->setParameter('sem_ingreso', $sem_ingreso)
            ->setParameter('programa', 'Doctorado')
            ->getResult();
    }

}
