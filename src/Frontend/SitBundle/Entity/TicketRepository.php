<?php

namespace Frontend\SitBundle\Entity;
use Frontend\SitBundle\Entity\Unidad;
use Doctrine\ORM\EntityRepository;

class TicketRepository extends EntityRepository
{
    //busca un ticket en específicopara verificar si esta asignado a un usuario
    public function buscaticketusuario($idticket)
    {
    	$em = $this->getEntityManager();
        $dql = "select t from SitBundle:Ticket t join t.user u where t.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idticket);
        $query->setMaxResults(1);
        return $query->getResult();

    }

    //buscar tickets asignados
    public function ticketsasignados($idusuario)
    {
        $em = $this->getEntityManager();
        $dql = "select t from SitBundle:Ticket t join t.user u where u.id= :id and t.estatus=2";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idusuario);
        return $query->getResult();
    }


    //busca los tickets de la unidad especificada
    public function tickets()
    {
        $em = $this->getEntityManager();
        $dql = "select t from SitBundle:Ticket t order by t.estatus ASC";
        $query = $em->createQuery($dql);
        return  $query->getResult();

    }

}
