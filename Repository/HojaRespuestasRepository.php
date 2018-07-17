<?php


namespace Itsur\AeiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * GrupoEvalubleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HojaRespuestasRepository extends EntityRepository
{

    public function findByPeriodoAndFicha($periodo, $ficha)
    {
       $query = $this->getEntityManager()
        ->createQuery('
            SELECT ho FROM ItsurAeiBundle:HojaRespuestas ho
            JOIN ho.aspirante as asp
            JOIN ho.periodo as pe
            WHERE
                     pe.id = :periodo
              AND asp.ficha = :ficha'
        )
        ->setParameter('periodo', $periodo)
        ->setParameter('ficha', $ficha);
        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }

    public function averageCalificacionByPeriodo($periodo)
    {
       $query = $this->getEntityManager()
        ->createQuery('
            SELECT  AVG(ho.calificacion) FROM ItsurAeiBundle:HojaRespuestas ho
            JOIN ho.aspirante as asp
            JOIN ho.periodo as pe
            WHERE
            pe.id = :periodo'
        )
        ->setParameter('periodo', $periodo);
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
           return null;
        }

    }

    public function desviationCalificacionByPeriodo($periodo)
    {
       $query = $this->getEntityManager()
        ->createQuery('
            SELECT  STD(ho.calificacion) FROM ItsurAeiBundle:HojaRespuestas ho
            JOIN ho.aspirante as asp
            JOIN ho.periodo as pe
            WHERE
            pe.id = :periodo'
        )
        ->setParameter('periodo', $periodo);
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
           return null;
        }

    }

    public function averageCalificacionDiagnosticoByPeriodo($periodo)
    {
       $query = $this->getEntityManager()
        ->createQuery('
            SELECT  AVG(ho.calificacionDiagnostico) FROM ItsurAeiBundle:HojaRespuestas ho
            JOIN ho.aspirante as asp
            JOIN ho.periodo as pe
            WHERE
            pe.id = :periodo'
        )
        ->setParameter('periodo', $periodo);
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
           return null;
        }

    }

    public function averageCalificacionSeleccionByPeriodo($periodo)
    {
       $query = $this->getEntityManager()
        ->createQuery('
            SELECT  AVG(ho.calificacionSeleccion) FROM ItsurAeiBundle:HojaRespuestas ho
            JOIN ho.aspirante as asp
            JOIN ho.periodo as pe
            WHERE
            pe.id = :periodo'
        )
        ->setParameter('periodo', $periodo);
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
           return null;
        }

    }
}
?>