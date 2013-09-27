<?php

namespace Administracion\UsuarioBundle\Entity;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
     public function buscarUsuario($username)
    {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('SELECT u FROM UsuarioBundle:User u WHERE
        u.username = :username');
        $consulta->setParameter('username', $username);
        return $consulta->getOneOrNullResult();
    }

    public function datosusuario($id){
        $em = $this->getEntityManager();
        $dql = "select p from UsuarioBundle:Perfil p where p.user= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id', $id);
        $datos=$query->getOneOrNullResult();
        return $datos;
    }
}
