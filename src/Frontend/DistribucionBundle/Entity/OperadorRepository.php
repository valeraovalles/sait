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

    //DEVUELVE TODOS LOS OPERADORES Y REPRESENTANTES
    public function Operadores($idpais)
    {
        $em = $this->getEntityManager();
        $dql   = "
        SELECT r FROM DistribucionBundle:Representante r JOIN r.operador o JOIN o.tipooperador t JOIN o.pais p
        where o.pais= :idpais order by o.nombre ASC
        ";
        $query = $em->createQuery($dql);
        $query->setParameter('idpais', $idpais);
        return  $query->getResult(); 
    }


     public function OperadorPorIdto($idpais, $idtipooperador)
    {
        $em = $this->getEntityManager();
        $dql   = "
        SELECT r FROM DistribucionBundle:Representante r JOIN r.operador o JOIN o.tipooperador t JOIN o.pais p
        where o.pais= :idpais and o.tipooperador= :idtipooperador order by o.nombre ASC
        ";
        $query = $em->createQuery($dql);
        $query->setParameter('idpais', $idpais);
        $query->setParameter('idtipooperador', $idtipooperador);
        return  $query->getResult(); 
    }

     public function OperadorPorIdo($idpais, $idoperador)
    {
        $em = $this->getEntityManager();
        $dql   = "
        SELECT r FROM DistribucionBundle:Representante r JOIN r.operador o JOIN o.tipooperador t JOIN o.pais p
        where o.pais= :idpais and o.operador= :idoperador order by o.nombre ASC
        ";
        $query = $em->createQuery($dql);
        $query->setParameter('idpais', $idpais);
        $query->setParameter('idoperador', $idoperador);
        return  $query->getResult(); 
    }


     public function OperadorPorIdtoPorIdo($idpais, $idtipooperador, $idoperador)
    {

        $em = $this->getEntityManager();
        $dql   = "
        SELECT r FROM DistribucionBundle:Representante r JOIN r.operador o JOIN o.tipooperador t JOIN o.pais p
        where o.pais= :idpais and o.tipooperador= :idtipooperador and o.id= :idoperador order by o.nombre ASC
        ";
        $query = $em->createQuery($dql);
        $query->setParameter('idpais', $idpais);
        $query->setParameter('idtipooperador', $idtipooperador);
        $query->setParameter('idoperador', $idoperador);
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
