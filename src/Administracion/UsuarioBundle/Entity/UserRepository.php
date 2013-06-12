<?php

namespace Administracion\UsuarioBundle\Entity;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
     public function buscarUsuario($username)
    {
        $em = $this->getManager();
        $consulta = $em->createQuery('SELECT u FROM UsuarioBundle:User u WHERE
        u.username = :username');
        $consulta->setParameter('username', $username);
        return $consulta->getOneOrNullResult();
    }
}
