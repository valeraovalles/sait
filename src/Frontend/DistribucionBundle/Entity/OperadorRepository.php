<?php

namespace Frontend\DistribucionBundle\Entity;
use Doctrine\ORM\EntityRepository;

class OperadorRepository extends EntityRepository
{
     public function buscarEstado($id)
    {
        $em = $this->getManager();
        $consulta = $em->createQuery('SELECT u FROM UsuarioBundle:User u WHERE
        u.username = :username');
        $consulta->setParameter('username', $username);
        return $consulta->getOneOrNullResult();
    }
}
