<?php

namespace Frontend\SitBundle\Entity;
use Frontend\SitBundle\Entity\Unidad;
use Doctrine\ORM\EntityRepository;

class UnidadRepository extends EntityRepository
{

    //busca la unidad a la que pertenece un usuario
    public function unidadusuario($idusuario)
    {
        $em = $this->getEntityManager();
        $dql = "select u from SitBundle:Unidad u join u.user us where us.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idusuario);
        return  $query->getResult();

    }

    //busca los tickets de la unidad especificada
    public function ticketsunidad($idunidad)
    {
        $em = $this->getEntityManager();
        $dql = "select t from SitBundle:Ticket t where t.unidad= :idunidad order by t.estatus ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('idunidad',$idunidad);
        return  $query->getResult();

    }

    //busca los usuarios de una unidad a excepción de uno si tiene asignado el ticket
    public function usuariosunidad($idunidad)
    {
        $em = $this->getEntityManager();
        $dql = "select u from SitBundle:Unidad u join u.user us where u.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idunidad);

        return  $query->getResult();

    }

  
}
