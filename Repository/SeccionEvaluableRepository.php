<?php


namespace Itsur\AeiBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * GrupoEvalubleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SeccionEvaluableRepository extends EntityRepository
{

    public function findByPeriodoAndFichaAndAreaAndOrder(
    $periodo, $ficha, $area, $orden)
    {
       $query = $this->getEntityManager()
        ->createQuery('
            SELECT se FROM ItsurAeiBundle:SeccionEvaluable se
            JOIN se.area as ar
            JOIN ar.hoja as ho
            JOIN ho.aspirante as asp
            JOIN ho.periodo as pe
            WHERE
                     pe.id = :periodo
              AND asp.ficha = :ficha
              AND ar.orden = :areaorden
              AND se.orden = :seccionorden'
        )
        ->setParameter('periodo', $periodo)
        ->setParameter('ficha', $ficha)
        ->setParameter('areaorden', $area)
        ->setParameter('seccionorden', $orden)
        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }
}
?>