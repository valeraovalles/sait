<?php

namespace Frontend\DistribucionBundle\Entity;
use Doctrine\ORM\EntityRepository;

class RepresentanteRepository extends EntityRepository
{
    public function RepresentanteOperador($idoperador)
    {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('SELECT r FROM DistribucionBundle:Representante r WHERE
        r.operador = :idoperador order by r.id ASC');
        $consulta->setParameter('idoperador', $idoperador);
        return $consulta->getResult();



    }
}
