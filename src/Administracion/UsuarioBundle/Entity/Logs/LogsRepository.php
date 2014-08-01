<?php
namespace Administracion\UsuarioBundle\Entity\Logs;

use Doctrine\ORM\EntityRepository;
use Administracion\UsuarioBundle\Entity\Logs\Logs;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * Description of logsRepository
 *
 * @author ecastro
 */
class logsRepository extends EntityRepository{
    
    public function findByMarcaId($marca_id){
        $query = $this->getEntityManager()->createQuery("
            SELECT modelo
            FROM CorresponsaliaBundle:Tecnologia\Modelo modelo
            LEFT JOIN modelo.marca marca
            WHERE marca.id = :marca_id
        ")->setParameter('marca_id', $marca_id);

        return $query->getArrayResult();
    }
    
    public function logsRecord($em, $peticion, $entity) {
        $logs = new Logs();
        $logs->setUtc(\date('U'));
        $logs->setUsuario($entity);
        $logs->setFecha(date_create_from_format('Y-m-d', \date("Y-m-d")));
        $logs->setHora(new \DateTime(\date("G:i:s")));
        $logs->setIp($peticion->getClientIp());
        $logs->setNavegador($peticion->server->get('HTTP_USER_AGENT'));
        $logs->setUrl($peticion->getUri());
        $em->persist($logs);
        $em->flush();
        return true;
    }
    
    public function findRecordMin(){
        $query = $this->getEntityManager()->createQuery("
            SELECT count(distinct Logs.ip) FROM UsuarioBundle:Logs\Logs Logs
        ");

        return $query->getResult();
    }
    
//    SELECT COUNT(ip) FROM (SELECT DISTINCT(ip) FROM logs_analitics WHERE navegador LIKE '%Linux%') AS foo
    public function findSO($so, $em){
                     
        $query = $em->createQuery(
            'SELECT COUNT(DISTINCT Logs.ip)
               FROM UsuarioBundle:Logs\Logs Logs
              WHERE Logs.navegador LIKE :so'
        )->setParameter('so', '%'.$so.'%');
         
        return $query->getResult();
    }
        
}
