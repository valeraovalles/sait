<?php

namespace Frontend\DistribucionBundle\Entity;
use Frontend\DistribucionBundle\Entity\Operador;
use Doctrine\ORM\EntityRepository;

class OperadorRepository extends EntityRepository
{
     public function buscarEstado($id)
    {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('SELECT u FROM UsuarioBundle:User u WHERE
        u.username = :username');
        $consulta->setParameter('username', $username);
        return $consulta->getOneOrNullResult();
    }

     public function OperadorPorIdTipooperador($idpais, $idtipooperador)
    {

    	$em = $this->getEntityManager();
        $dql   = "
        SELECT o FROM DistribucionBundle:Operador o JOIN o.pais p JOIN o.tipooperador t
        where p.id= :idpais and t.id= :idtipooperador
        order by o.nombre ASC
        ";
        $query = $em->createQuery($dql);
        $query->setParameter('idpais', $idpais);
        $query->setParameter('idtipooperador', $idtipooperador);
        die;
     	return  $query->getResult(); 

    }

     public function OperadorPorIdTipooperadorOperador($idpais, $idtipooperador, $idoperador)
    {
        $em = $this->getEntityManager();
        $dql   = "
        SELECT o FROM DistribucionBundle:Operador o JOIN o.pais p JOIN o.tipooperador t 
        where p.id= :idpais and t.id= :idtipooperador and o.id= :idoperador
        order by o.nombre ASC
        ";
        $query = $em->createQuery($dql);
        $query->setParameter('idpais', $idpais);
        $query->setParameter('idtipooperador', $idtipooperador);
        $query->setParameter('idoperador', $idoperador);
        $operadores = $query->getResult();
     	return  $query->getResult(); 
    }

     public function RepresentanteOperador($idoperador)
    {
        $em = $this->getEntityManager();
        $dql   = "
        SELECT r FROM DistribucionBundle:Representante r JOIN r.operador o 
        where r.operador= :idoperador order by r.nombres ASC
        ";
        $query = $em->createQuery($dql);
        $query->setParameter('idoperador', $idoperador);
        $operadores = $query->getResult();
     	return $query->getResult(); 
    }
}
