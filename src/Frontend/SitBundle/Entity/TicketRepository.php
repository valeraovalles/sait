<?php

namespace Frontend\SitBundle\Entity;
use Frontend\SitBundle\Entity\Unidad;
use Doctrine\ORM\EntityRepository;

class TicketRepository extends EntityRepository
{
    //busca un ticket en específico
    public function buscaticketusuario($idticket)
    {
    	$em = $this->getEntityManager();
        $dql = "select t from SitBundle:Ticket t join t.user u where t.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idticket);
        $query->setMaxResults(1);
        return $query->getResult();

    }

}
